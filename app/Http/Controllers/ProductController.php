<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\ProductRequest;
use App\User;
use Modules\Admin\Models\Category;
use Modules\Admin\Models\Product; 
use Modules\Admin\Models\ShippingBillingAddress;
use Modules\Admin\Models\Transaction;
use Input;
use Validator;
use Auth;
use Paginate;
use Grids;
use HTML;
use Form;
use Hash;
use View;
use URL;
use Lang;
use Session;
use Route;
use Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Dispatcher; 
use App\Helpers\Helper;
use Response;
use Cart; 
use PDF;
use Modules\Admin\Models\Settings;
use Omnipay\Omnipay;
use Omnipay\Common\CreditCard; 
use Omnipay\PayPal;
use Fahim\PaypalIPN\PaypalIPNListener; 
/**
 * Class AdminController
 */
class ProductController extends Controller {
    /**
     * @var  Repository
     */

    /**
     * Displays all admin.
     *
     * @return \Illuminate\View\View
    
     */

    private $user_id;

    public function __construct(Request $request, Settings $setting) {

        View::share('category_name', $request->segment(1));
        View::share('total_item',Cart::content()->count());
        View::share('sub_total',Cart::subtotal());  

       
         if (Auth::user()!=null) { 
             View::share('userData',Auth::user()->id);
            $this->user_id = Auth::user()->id; //$request->session()->get('current_user')->id;

        }else{
            $this->user_id = "";
             View::share('userData','');
        }

         if ($request->session()->has('tab')) { 
          View::share('tab',$request->session()->get('tab'));
       
        }else{
            View::share('tab',"0");
       
        }

        $hot_products   = Product::orderBy('views','desc')->limit(3)->get();
        $special_deals  = Product::orderBy('discount','desc')->limit(3)->get(); 
        View::share('hot_products',$hot_products);
        View::share('special_deals',$special_deals);  

        $website_title      = $setting::where('field_key','website_title')->first();
        $website_email      = $setting::where('field_key','website_email')->first();
        $website_url        = $setting::where('field_key','website_url')->first();
        $contact_number     = $setting::where('field_key','contact_number')->first();
        $company_address    = $setting::where('field_key','company_address')->first();

        $banner             = $setting::where('field_key','LIKE','%banner_image%')->get();


         View::share('website_title',$website_title);
         View::share('website_email',$website_email);
         View::share('website_url',$website_url);
         View::share('contact_number',$contact_number);
         View::share('company_address',$company_address);
         View::share('banner',$banner); 
        
         $boxes = Category::where('parent_id',0)->get();
        $gifts = Category::where('parent_id','!=',0)->get();

        View::share('boxTypes',$boxes); 
        View::share('giftType',$gifts); 

        $box_id = $request->get('id');

        $boxDetail = Category::where('id',$box_id )->first();
        View::share('boxDetail',$boxDetail); 

          
      //  dd(Route::currentRouteName());
        //dd(Cart::subtotal());
    }

    protected $categories;

    /*
     * Dashboard
     * */

    public function index(Request $request,$id) 
    {  
        $cart = Cart::content();  
        $pid = [];
        foreach ($cart as $key => $value) {
            $pid[] = $value->id;
        }

        $product_photo =   Product::whereIn('id',$pid)->get(['photo','id'])->toArray();
         
        return view('cart', compact('cart','product_photo'));
    }

    // checkout
    public function checkout(Request $request) 
    {   
        $cart = Cart::content();  
        $pid = [];
        foreach ($cart as $key => $value) {
            $pid[] = $value->id;
        }
        $product_photo =   Product::whereIn('id',$pid)->get(['photo','id'])->toArray();
        
        $products = Product::with('category')->whereIn('id',$pid)->orderBy('id','asc')->first();
        $categories = Category::nested()->get(); 
       
        $boxName = isset(($products->category)->name)?(($products->category)->name):'';
         
        return view('end-user.checkout',compact('categories','products','category','cart','product_photo','boxName'));  
    }
    // make payment 
    public function makePayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'city' => 'required|max:255',
            'state'=> 'required|max:255',
            'postal_code' => 'required|max:20',
            'country' => 'required|max:255',
            'phone' => 'required|max:15|regex:/([0-9 ])+/',
            'credit_card_number' => 'required|max:16',
            'cvv' => 'required|numeric|min:3',
            'month' => 'required',
            'year' => 'required|digits:4|integer|min:'.(date('Y')),
            'email' => 'required|email',
            'password' => 'required'

        ]); 
        if ($validator->fails()) {
            return Redirect::to('checkout')
                        ->withErrors($validator)
                        ->withInput();
        }
 
        try{

            $gateway = Omnipay::create('PayPal_Pro');
            
            $gateway->setUsername( 'kundan.r-facilitator-3_api1.cisinlabs.com' );
            $gateway->setPassword( '32UN5286G4FDKWK7' );
            $gateway->setSignature( 'AgsyRufAX1NOEGmzAg0vXIX4pkjQAEaRyKcNiHzfR5Ka0I-74umoKXhH' ); 
            $gateway->setTestMode( true );
        
        
            $card = new CreditCard(array(
                'firstName'             => $request->get('first_name'),
                'lastName'              => $request->get('lastName'),
                'number'                => $request->get('credit_card_number'),
                'expiryMonth'           => $request->get('month'),
                'expiryYear'            => $request->get('year'),
                'cvv'                   => $request->get('cvv')
            )); 
            
            $transaction_paypal = $gateway->purchase(array(
                 'currency'         => 'USD',
                 'description'      => 'Toys Box',
                 'card'             =>  $card,
                 'name'             => 'newborn', 
                 'amount'           =>  Cart::subtotal() //$sub_total 
            ));
            
            if(Auth::check()){
                $user       = User::where('id',Auth::user()->id)->first();
                $user_id    = $user->id;
            }else{
                $user = User::where('email',$request->get('email'))->first();
                $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];
                if(!$user){
                    $user               = new User;
                    $user->email        = $request->get('email');
                    $user->password     =  Hash::make($request->get('password'));
                    $user->first_name   = $request->get('first_name');
                    $user->last_name    = $request->get('last_name');
                    $user->save();
                    $user_id            = $user->id;
                    Auth::attempt($credentials);
                    $request->session()->put('current_user',Auth::user());
                    $request->session()->put('tab',1); 
                }else{  
                    if (Auth::attempt($credentials)) {
                        $request->session()->put('current_user',Auth::user());
                        $request->session()->put('tab',1); 
                        $user_id = Auth::user()->id;
                        return Redirect::to('/');

                    }else{  
                        return Redirect::to('checkout')
                            ->withErrors(['loginError'=>'Credentials do not match!'])
                            ->withInput();
                    }
                }
            }
            $response   = $transaction_paypal->send();
            $data       = $response->getData(); 

            $cart = Cart::content();  
            
            $pid = [];
            foreach ($cart as $key => $value) {
               $transaction = new Transaction;
  
               $transaction->product_id     = $value->id;
               $transaction->product_qty    = $value->qty;
               $transaction->total_price  = $value->price;
               $transaction->discount_price  = $value->price;
               $transaction->transaction_id = $user_id.'-'.time();
               $transaction->product_name   = $value->name;
               $transaction->user_id = $user_id;
               $transaction->payment_mode = 'PayPal';
               $transaction->status = "pending";
               $transaction->product_details = json_encode($value);
               $transaction->save();
            }


            $shippingBillingAddress = new ShippingBillingAddress;

            $shippingBillingAddress->name = $request->get('first_name').' '.$request->get('last_name');
            $shippingBillingAddress->name       =   $request->get('first_name');
            $shippingBillingAddress->user_id    =   $user_id;
            $shippingBillingAddress->phone      =   $request->get('phone');
            $shippingBillingAddress->email      =   $request->get('email');
            $shippingBillingAddress->address1   =   $request->get('address');
            $shippingBillingAddress->address2   =   $request->get('apt_unit');
            $shippingBillingAddress->city       =   $request->get('city');
            $shippingBillingAddress->status     =   $request->get('status');
            $shippingBillingAddress->state      =   $request->get('state');
            $shippingBillingAddress->zip_code   =   $request->get('postal_code');
            $shippingBillingAddress->country    =   $request->get('country');
            $shippingBillingAddress->address_type=  1;
            $shippingBillingAddress->payment_mode = "PayPal";
            $shippingBillingAddress->others_detail = json_encode($request->all());
            $shippingBillingAddress->save();


            if(isset($data['ACK']) && $data['ACK']=='Success'){

                $trns = Transaction::find($transaction->id);
                $trns->transaction_detail =  json_encode($data);
                $trns->paypal_transaction_id =  $data['TRANSACTIONID'];
                $trns->status = $data['ACK'];
                $trns->save();

            }else{

                $trns = Transaction::find($transaction->id);
                $trns->transaction_detail =  json_encode($data);
                $trns->paypal_transaction_id =  isset($data['TRANSACTIONID'])?$data['TRANSACTIONID']:'';
                $trns->status = isset($data['ACK'])?$data['ACK']:'';
                $trns->save();

            }

            return Redirect::to('myaccount');
            
        }catch (\Exception $e) { 

            return Redirect::to('checkout')
                        ->withErrors(['error'=>$e->getMessage()])
                        ->withInput();

        }
        
    }



    public function addToCart(Request $request, $id) 
    { 
        
        $bx = explode('/',URL::previous());
        
        $box_id =  $bx[(count($bx)-1)];
        
        $boxName = Category::where('id',$box_id)->first();

        $c = ['1'=>'mini','2'=>'small','3'=>'large'];
        $item =  $request->get('item'); 
         if($item ){
            $qty = substr($item,-1);
         } else{
            $qty = 1;
         } 
        if ($request->isMethod('get')) {
             
            $product = Product::find($id);   

            Cart::add(array('id' => $id, 'name' => $product->product_title, 'qty' => $qty, 'price' => $product->price,'photo'=>''));
        }
        $cart = Cart::content();  
        
        $request->session()->put('key', 'value');

        $box = isset($boxName->name)?$boxName->name:'';
        //return Redirect::to(url()->previous());
        return Redirect::to('checkout?box='.$box);
         
    }

    public function buyNow(Request $request, $id) 
    { 
         $item =  $request->get('item'); 
         if($item ){
            $qty = substr($item,-1);
         } else{
            $qty = 1;
         } 
         $is_item_exist = 0;
        foreach(Cart::content() as $row) {
            if($row->id==$id)
            {
                $is_item_exist++;
                break;
            }
        }
        if($is_item_exist==0){
            if ($request->isMethod('get')) {
                $product_id = $request->get('id');
                $product = Product::find($id);   
                Cart::add(array('productId' => $product->id, 'name' => $product->product_title, 'qty' => $qty, 'price' => $product->price,'photo'=>$product->photo));
            }   
        }
           
        $cart = Cart::content();  
       // $request->session()->put('key', 'value');
         return Redirect::to('checkout');
         
    }

    public function updateCart(Request $request) 
    { 
        if ($request->get('product_id') && ($request->get('increment')) == 1) {
           
            $rowId = Cart::search(function($key, $value) use($request)
                        { 
                            return $key->id == $request->get('product_id'); 
                        }
                    );
            foreach ($rowId as $key => $value) {
                $rowId = $value->rowId; 
            }
              $item = Cart::get($rowId);
              $qty = intval($item->qty)+1;
              Cart::update($rowId,$qty);
            return Redirect::to('checkout');
        }
        elseif ($request->get('product_id') && ($request->get('decrease')) == 1) {  
           $rowId = Cart::search(function($key, $value) use($request)
                        { 
                            return $key->id == $request->get('product_id'); 
                        }
                    );
            $total_qty = 0;
            foreach ($rowId as $key => $value) {
                $rowId = $value->rowId;
                $total_qty = $value->qty-1;
            }
            Cart::update($rowId, intval($total_qty));
            return Redirect::to('checkout');
        }
    }

    public function clearCart(Request $request, Cart $cart)
    {
        $cart = Cart::content(); 
        foreach ($cart as $key => $value) {
             Cart::remove($key);
        }

        return Redirect::to('product');
    }

    public function showProduct(Request $request, Product $product)
    {    
        $products       = Product::with('category')->where(function($q){
            $q->groupBy('product_category');
             $q->orderBy('views','desc');
        })->groupBy('product_category')->get(); 

        $product_new    = Product::with('category')->orderBy('id','desc')->groupBy('product_category')->Paginate(12); 
        $categories     = Category::nested()->get();  
        


 
        return view('end-user.home', compact('special_deals','hot_products','banner_path1', 'banner_path2','categories','products','product_new')); 
    }

    public function getProduct(Request $request, Product $product)
    {
        $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
         $cart = Cart::content(); 
    
         return json_encode(array(
                'status' => 1,
                'message' => 'success',
                'cart'  => count($cart),
                'data'  =>  $products
                )
            ); 
    } 

    public function removeItem($id)
    {
        $rowId = Cart::search(function($key, $value) use($id)
            { 
                return $key->id == $id; 
            }
        );
        foreach ($rowId as $key => $value) {
            $rowId = $value->rowId; 
        }
        $item = Cart::get($rowId); 
        Cart::remove($rowId);
        return Redirect::to('checkout');
    }


    public function order(Request $request)
    { 
        $cart = Cart::content();
        $products = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 

        $billing    = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',1)->first(); 

        $shipping   = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',2)->first(); 


        return view('end-user.order',compact('categories','products','category','cart','billing','shipping'));   
         
    }


    public function billing(ShippingBillingAddress $shipBill, Request $request)
    {
       
        $bill =  ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',1)->first();

        if($bill) 
        {
            $shipBill = ShippingBillingAddress::find($bill->id);
        }
        
        $shipBill->name = $request->get('name');
        $shipBill->email = $request->get('email');
        $shipBill->mobile = $request->get('mobile');
        $shipBill->address1 = $request->get('address1');
        $shipBill->user_id = $this->user_id;
        $shipBill->address_type = 1; 
 
        $shipBill->save();
        $request->session()->put('tab',2);
        $request->session()->put('billing',$shipBill);
        return Redirect::to('order');


    }

    public function shipping(ShippingBillingAddress $shipBill, Request $request)
    {
        $shipping = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',2)->first();

        if($shipping) 
        {
            $shipBill = ShippingBillingAddress::find($shipping->id);
        }
        
        $shipBill->name     = $request->get('name');
        $shipBill->email    = $request->get('email');
        $shipBill->mobile   = $request->get('mobile');
        $shipBill->address1 = $request->get('address1');
        $shipBill->address2 = $request->get('address2');
        $shipBill->zip_code = $request->get('zip_code');
        $shipBill->city     = $request->get('city');
        $shipBill->state    = $request->get('state');
        $shipBill->user_id  = $this->user_id;
        $shipBill->address_type = 2;  
        $shipBill->save();
        $request->session()->put('shipping',$shipBill);
        $request->session()->put('tab',3);
         return Redirect::to('order');
        
    }

    public function shippingMethod(hippingBillingAddress $shipBill, Request $request)
    {
        

        $shipping = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',2)->first();

        if($shipping) 
        {
            $shipBill = ShippingBillingAddress::find($shipping->id);
        }

        $shipping->payment_mode = "COD";
        $shipBill->user_id  = $this->user_id;
        $shipBill->address_type = 2;
        $shipBill->save();
         $request->session()->put('tab',4);
        return Redirect::to('order');
        
    }

    

    public function thankYou(Request $request)
    {
        $user_id    = $this->user_id;
        $cart       = Cart::content();


        if($cart->count()==0)
        {
          // return  Redirect::to('checkout');
        }
        if($user_id=="")
        {
           return  Redirect::to('myaccount');
        }
        $products   = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 

        $billing    = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',1)->first(); 
        $shipping   = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',2)->first(); 

       /* foreach ($cart as $key => $result) {

            $transaction                = new Transaction;
            $transaction->user_id       = $user_id;
            $transaction->product_name  = $result->name;
            $transaction->product_id    = $result->id;
            $transaction->total_price   = $result->price;
            $transaction->discount_price= $result->price;
            $transaction->payment_mode  = "COD";
            $transaction->transaction_id = strtotime("now");
            $transaction->product_details = json_encode(Product::where('id',$result->id)->get()->toArray());
            $transaction->save();
             
        } */
        $cart = Cart::content(); 
       // dd(Cart::subtotal());
       /* if($cart){

            $email_content['receipent_email'] = $billing->email;
            $email_content['subject'] = "Invoice";
            $template = "invoice";
            $template_content = ['cart'=>$cart ,'billing' => $billing , 'shipping' => $shipping,'transaction'=>$transaction];

            $data = $template_content; 
         	
        //  Helper::sendMail($email_content, $template, $template_content);
        } */


        foreach ($cart as $key => $value) {
             Cart::remove($key);
        }

      //   $request->session()->flush();
       // $request->session()->keep(['current_user']); 

        return view('end-user.thanku',compact('categories','products','category','cart','billing','shipping'));

    }
    public function showLoginForm(Request $request)
    {
         $cart       = Cart::content(); 
        $products   = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 
        return view('end-user.login',compact('categories','products','category','cart'));

    }
    public function showSignupForm(Request $request)
    {
        $cart       = Cart::content(); 
        $products   = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 

        return view('end-user.register',compact('categories','products','category','cart'));

    }

    public function myaccount(Request $request)
    {   
       
        if(!Auth::check())
        {      
            return Redirect::to('myaccount/login');
        }
        $cart       = Cart::content();
        $products   = Product::with('category')->orderBy('id','asc')->get();
        $categories = Category::nested()->get(); 

        $billing    = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',1)->first(); 

        $shipping   = ShippingBillingAddress::where('user_id',$this->user_id)->where('address_type',1)->first(); 

        $transactions    = Transaction::where('user_id',$this->user_id)->orderBy('id','desc')->get();

        $user = User::find(Auth::user()->id);  


        return view('end-user.myaccount',compact('user','transactions','categories','products','category','cart','billing','shipping'));

    }


}   

