<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/home', function () {
//     return view('welcome');
// });
Route::get('home',[
          'as' => 'home',
          'uses'  => 'HomeController@index'
        ]);
Route::get('/login',[
          'as' => 'login',
          'uses'  => 'LoginController@userLogin'
        ]);
Route::get('/refer',[
          'as' => 'refer',
          'uses'  => 'ReferController@index'
        ]);
Route::get('/plan',[
          'as' => 'plan',
          'uses'  => 'PlanController@index'
        ]);
Route::get('/detail-page',[
          'as' => 'detailPage',
          'uses'  => 'DetailPageController@index'
        ]);
Route::get('/checkout',[
          'as' => 'checkout',
          'uses'  => 'CheckoutController@index'
        ]);
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
//use Redirect;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With, auth-token');
header('Access-Control-Allow-Credentials: true');

Route::get('/', function () {
 
     return redirect('admin');
});

 