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

Route::get('/', 'AppController@welcome');
Route::get('/about', 'AppController@about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); // name: l'url aura le nom home //

Route::resource('booking', 'BookingController')->middleware('auth'); // l'utilisateur ne peut etre dirigé sauf s'il est authentifié et page admin ne sera visible que pour l'admin//

Route::get('order/index', 'AppController@order')->middleware('auth');

Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
})->middleware('auth','admin');

Route::resource('admin/meals', 'admin\MealController')->middleware('auth');

/*
Regrouper middleware / url / namespaces:

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('booking', 'BookingController');
    Route::group([
        'middleware' => 'admin',
        'prefix' => 'admin',
        'namespace' => 'Admin'
        'namespace' => 'Admin',
        'name' => 'admin.'
    ], function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        });
        })->name('admin.dashboard');
        Route::resource('meals', 'MealController');
    });
});

*/