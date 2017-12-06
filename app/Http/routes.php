<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('home',[
          'as' => 'home',
          'uses'  => 'HomeController@index'
        ]);


Route::get('/refer',[
          'as' => 'refer',
          'uses'  => 'ReferController@index'
        ]);
Route::get('/plan',[
          'as' => 'plan',
          'uses'  => 'PlanController@index'
        ]);
Route::get('/gift/{name}',[
          'as' => 'plan',
          'uses'  => 'PlanController@index'
        ]);
Route::get('/box/{name}',[
          'as' => 'boxPage',
          'uses'  => 'BoxController@index'
        ]);

Route::get('gift/{name}',[
          'as' => 'gift',
          'uses'  => 'BoxController@gift'
        ]);


Route::match(['get','post'],'makePayment',[
          'as' => 'makePayment',
          'uses'  => 'ProductController@makePayment'
        ]);






Route::match(['post','get'],'cat','HomeController@index');



Route::get('product-details/{id}',[
          'as' => 'productDetails',
          'uses'  => 'HomeController@productDetail'
        ]); 

Route::get('product-category',[
          'as' => 'productcategory',
          'uses'  => 'HomeController@productCategory'
        ]); 

Route::get('product-category/{category}/{name}/{id}',[
          'as' => 'productcategoryByname', 
          'uses'  => 'HomeController@productCategory'
        ]); 

Route::get('checkout',[
          'as' => 'checkout',
          'uses'  => 'HomeController@checkout'
        ]); 

 
Route::get('category',[
          'as' => 'category-front',
          'uses'  => 'HomeController@category'
        ]); 
 Route::get('order',[
          'as' => 'order',
          'uses'  => 'ProductController@order'
        ]); 
  Route::get('faq',[
          'as' => 'faq',
          'uses'  => 'HomeController@faq'
        ]); 
  
   Route::get('contact',[
          'as' => 'contact',
          'uses'  => 'HomeController@contact'
        ]);

   Route::get('track-orders',[
          'as' => 'trackOrder',
          'uses'  => 'HomeController@trackOrder'
        ]); 
   Route::get('terms-conditions',[
          'as' => 'trackOrder',
          'uses'  => 'HomeController@tNc'
        ]); 
 





Route::group(['middleware' => ['web']], function(){



  Route::get('/',[
          'as' => '/',
          'uses'  => 'ProductController@showProduct'
        ]); 
   
  Route::get('/cart', [ 
        'as' => '',
       'uses' =>   'ProductController@index'
       ]);

Route::get('checkout',[
          'as' => 'checkout',
          'uses'  => 'ProductController@checkout'
        ]); 


  Route::get('/updateCart', [ 
        'as' => '',
       'uses' =>   'ProductController@updateCart'
       ]);

  Route::get('/product', [  
        'as' => '',
       'uses' =>   'ProductController@showProduct'
       ]);

  Route::get('/clear-cart',[  
        'as' => '',
       'uses' =>  'ProductController@clearCart'
       ]);

  Route::get('/getProduct',[  
        'as' => '',
       'uses' =>  'ProductController@getProduct'
       ]);

  Route::get('/addToCart/{id}', [ 
        'as' => '',
       'uses' =>   'ProductController@addToCart'
       ]);

   Route::get('/buyNow/{id}', [ 
        'as' => '',
       'uses' =>   'ProductController@buyNow'
       ]);


  Route::get('/removeItem/{id}',[ 
        'as' => '',
       'uses' =>  'ProductController@removeItem'
       ]);
  Route::get('auth/logout', function(){
  	Auth::logout();
  	return Redirect::to('/');
  });

  Route::get('register',[
          'as' => 'register',
          'uses'  => 'UserController@register'
        ]);    

  Route::post('register',[
          'as' => 'register',
          'uses'  => 'UserController@signup'
        ]);   

  Route::post('signup',[
          'as' => 'signup',
          'uses'  => 'UserController@signup'
        ]); 

  Route::get('login',[
          'as' => 'login',
          'uses'  => 'UserController@showLoginForm'
        ]); 


Route::get('myaccount/login',[
          'as' => 'showLoginForm',
          'uses'  => 'UserController@showLoginForm'
        ]); 

Route::post('billing',[
          'as' => 'billing',
          'uses'  => 'ProductController@billing'
        ]);

Route::post('shipping',[
          'as' => 'shipping',
          'uses'  => 'ProductController@shipping'
        ]);

Route::post('shippingMethod',[
          'as' => 'shippingMethod',
          'uses'  => 'ProductController@shippingMethod'
        ]);

Route::post('placeOrder',[
          'as' => 'placeOrder',
          'uses'  => 'ProductController@placeOrder'
        ]);


Route::get('sucess',[
          'as' => 'sucess',
          'uses'  => 'ProductController@thankYou'
        ]); 


Route::get('signout', function(App\User $user , Illuminate\Http\Request $request) { 
    
    $request->session()->forget('current_user');
    $request->session()->flush();  

    return redirect()->intended('/'); 

});
   




Route::get('myaccount',[
          'as' => 'myaccount',
          'uses'  => 'ProductController@myaccount'
        ]); 

 
        
Route::get('myaccount/signup',[
          'as' => 'myaccount-signup',
          'uses'  => 'ProductController@showSignupForm'
        ]); 

Route::post('myaccount/signup',[
          'as' => 'userSignup',
          'uses'  => 'UserController@userSignup'
        ]); 
        
Route::get('signup',[
          'as' => 'myaccount-signup',
          'uses'  => 'ProductController@showSignupForm'
        ]); 
             


Route::post('login',function(App\User $user , Illuminate\Http\Request $request){ 

      $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];  
       
          if (Auth::attempt($credentials)) {
             $request->session()->put('current_user',Auth::user());
             
                return redirect()->intended('/'); 
          }else{  
              return redirect()
                          ->back()
                          ->withInput()  
                          ->withErrors(['message'=>'Invalid email or password. Try again!']);
              } 
      }); 
             



Route::post('Ajaxlogin',function(App\User $user , Illuminate\Http\Request $request){ 
       
      $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')];  
       
          if (Auth::attempt($credentials)) {
             $request->session()->put('current_user',Auth::user());
             $request->session()->put('tab',1);
           
              return Redirect::to(url()->previous());
               // return  json_encode(['msg'=>'success','code'=>200,'data'=>Auth::user()]); 
          }else{  
               return  json_encode(['msg'=>'Invalid email or password','code'=>500,'data'=>$request->all()]); 
              } 
      }); 
             

 });

Route::get('password/reset','AuthController@forgetPassword');  

Route::post('password/email','AuthController@forgetPasswordLink');

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));
