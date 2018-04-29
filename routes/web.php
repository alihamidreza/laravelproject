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



Route::get('/', function () {
    return view('welcome');
});
Route::get('/404', function () {
    return view('errors.404');
});

Route::group(['namespace' => 'Auth'] , function (){
    // Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
    $this->post('register', 'RegisterController@register');

    // Password Reset Routes...
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'ResetPasswordController@reset');
});

Route::group(['namespace' => 'Admin' , 'middleware' => ['auth:web' , 'checkAdmin'] , 'prefix' => 'admin'] , function (){
    $this->get('/' , 'PanelController@index');
    $this->resource('Article' , 'ArticleController');
    $this->resource('Course' , 'CourseController');
    $this->resource('Episode' , 'EpisodeController');
    $this->get('/Article/{article}/comments' , 'ArticleController@comments')->name('ArticleComments.show');

    $this->resource('roles' , 'RoleController');
    $this->resource('permissions' , 'PermissionController');


    $this->group(['prefix' => 'users'] , function (){
        $this->get('/' , 'UserController@index');
        $this->resource('level' , 'LevelManageController' , ['parameters' => ['level' => 'user']]);
    });
});
