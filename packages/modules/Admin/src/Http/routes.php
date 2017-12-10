<?php

      Route::get('admin/login','Modules\Admin\Http\Controllers\AuthController@index');
      Route::get('logout','Modules\Admin\Http\Controllers\AuthController@logout');  
      Route::get('admin/signUp','Modules\Admin\Http\Controllers\AuthController@signUp'); 
      Route::post('admin/registration','Modules\Admin\Http\Controllers\AuthController@registration'); 
      

    Route::get('admin/forgot-password','Modules\Admin\Http\Controllers\AuthController@forgetPassword');
    Route::post('password/email','Modules\Admin\Http\Controllers\AuthController@sendResetPasswordLink');
    Route::match(['get','post'],'admin/password/reset','Modules\Admin\Http\Controllers\AuthController@resetPassword'); 
    Route::match(['get','post'],'password/reset','Modules\Admin\Http\Controllers\AuthController@resetPassword'); 


    Route::post('admin/login',function(App\Admin $user){
        $credentials = ['email' => Input::get('email'), 'password' => Input::get('password')]; 
            $auth = auth()->guard('admin');
        
            if ($auth->attempt($credentials)) {
                return Redirect::to('admin');
            }else{ 
                return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['message'=>'Invalid email or password. Try again!']);
                } 
    }); 
 
    Route::post('admin/forgetPassword',function(App\User $user){

        $user = \App\Admin::where('email',Input::get('email'))->first();
        
        
            if ($user!=null) {
                $email = Input::get('email');
                $temp_password = Hash::make($email);
                
              // Send Mail after forget password
               
                $email_content = array(
                                'receipent_email'   => Input::get('email'),
                                'subject'           => 'Your Account Password',
                                'name'              => $user->first_name,
                                'temp_password'     => $temp_password,
                                'encrypt_key'       => Crypt::encrypt($email),
                                'greeting'          => 'Admin'

                            );
               

                 Mail::send('emails.forgot_password_link', array('content' => $email_content), function($message) use($email_content)
                  {
                    $name = 'Admin';
                    $message->from('no-reply@admin.com',$name);   
                    $message->to($email_content['receipent_email'])->subject($email_content['subject']);
                    
                  });
                 return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['message'=>1]);

            }else{ 
                return redirect()
                            ->back()
                            ->withInput()  
                            ->withErrors(['message'=>'Invalid email address.Try again!']);
            } 
    }); 

      
    Route::group(['middleware' => ['admin']], function () { 

        Route::get('admin', 'Modules\Admin\Http\Controllers\AdminController@index');
        
        /*------------User Model and controller---------*/

        Route::bind('user', function($value, $route) {
            return Modules\Admin\Models\User::find($value);
        });

        Route::resource('admin/user', 'Modules\Admin\Http\Controllers\UsersController', [
            'names' => [
                'edit' => 'user.edit',
                'show' => 'user.show',
                'destroy' => 'user.destroy',
                'update' => 'user.update',
                'store' => 'user.store',
                'index' => 'user',
                'create' => 'user.create',
            ]
                ]
        );
        /*---------End---------*/   
  
        /*------------User Category and controller---------*/

            Route::bind('box', function($value, $route) {
                return Modules\Admin\Models\Category::find($value);
            });
     
            Route::resource('admin/box', 'Modules\Admin\Http\Controllers\CategoryController', [
                'names' => [
                    'edit' => 'box.edit',
                    'show' => 'box.show',
                    'destroy' => 'box.destroy',
                    'update' => 'box.update',
                    'store' => 'box.store',
                    'index' => 'box',
                    'create' => 'box.create',
                ]
                    ]
            );
        /*---------End---------*/   


        /*------------User Category and controller---------*/

            Route::bind('gifts', function($value, $route) {
                return Modules\Admin\Models\SubCategory::find($value);
            });
     
            Route::resource('admin/gifts', 'Modules\Admin\Http\Controllers\SubCategoryController', [
                'names' => [
                    'edit' => 'gifts.edit',
                    'show' => 'gifts.show',
                    'destroy' => 'gifts.destroy',
                    'update' => 'gifts.update',
                    'store' => 'gifts.store',
                    'index' => 'gifts',
                    'create' => 'gifts.create',
                ]
                    ]
            );
        /*---------End---------*/    

        Route::bind('product', function($value, $route) {
            return Modules\Admin\Models\Product::find($value);
        });
 
        Route::resource('admin/product', 'Modules\Admin\Http\Controllers\ProductController', [
            'names' => [
                'edit' => 'product.edit',
                'show' => 'product.show',
                'destroy' => 'product.destroy',
                'update' => 'product.update',
                'store' => 'product.store',
                'index' => 'product',
                'create' => 'product.create',
            ]
                ]
        ); 

        Route::bind('transaction', function($value, $route) {
            return Modules\Admin\Models\Transaction::find($value);
        });
 
        Route::resource('admin/transaction', 'Modules\Admin\Http\Controllers\TransactionController', [
            'names' => [
                'edit' 		=> 'transaction.edit',
                'show' 		=> 'transaction.show',
                'destroy' 	=> 'transaction.destroy',
                'update' 	=> 'transaction.update',
                'store' 	=> 'transaction.store',
                'index' 	=> 'transaction',
                'create' 	=> 'transaction.create',
            ]
                ]
        ); 

        Route::bind('setting', function($value, $route) {
            return Modules\Admin\Models\Settings::find($value);
        });
 
        Route::resource('admin/setting', 'Modules\Admin\Http\Controllers\SettingsController', [
            'names' => [
                'edit'      => 'setting.edit',
                'show'      => 'setting.show',
                'destroy'   => 'setting.destroy',
                'update'    => 'setting.update',
                'store'     => 'setting.store',
                'index'     => 'setting',
                'create'    => 'setting.create',
            ]
                ]
        ); 


          Route::bind('page', function($value, $route) {
            return Modules\Admin\Models\Pages::find($value);    
        });
 
        Route::resource('admin/page', 'Modules\Admin\Http\Controllers\PageController', [
            'names' => [
                'edit'      => 'page.edit',
                'show'      => 'page.show',
                'destroy'   => 'page.destroy',
                'update'    => 'page.update',
                'store'     => 'page.store',
                'index'     => 'page',
                'create'    => 'page.create',
            ]
                ]
        ); 


 
        Route::match(['get','post'],'admin/profile', 'Modules\Admin\Http\Controllers\AdminController@profile'); 
            
  });



 
 
     
 
  