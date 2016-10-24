<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/user', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        dd($user);
    });
});

Route::resource('/about','AboutController@index');

Route::any('/wechat', 'WechatController@serve');

Route::get('contact','AboutController@contact');

Route::post('/register','UserController@store');

Route::resource('posts','PostController');

Route::get('/articles','ArticlesController@index');

Route::get('/articles/{id}','ArticlesController@show');

Route::get('/redistast','redistastController@index');

Route::get('/login',function(){});

Route::get('/captcha',function(){

    $captcha = new \Laravist\GeeCaptcha\GeeCaptcha(env('CAPTCHA_ID'), env('PRIVATE_KEY'));
    echo $captcha->GTServerIsNormal();

});



