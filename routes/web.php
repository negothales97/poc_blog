<?php

use Illuminate\Support\Facades\Route;

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
// Url inicial
Route::get('/', function () {
    return view('welcome');
});

// Utilizando função anônima
Route::get('foo', function () {
    return 'Hello World';
});

// Utilizando controller
Route::get('/user', 'UserController@index');
// Route::post('/user', 'UserController@index');
// Route::get('/user/create', 'UserController@create');

// Métodos de rotas
    // Principais
    // Route::get($uri, $callback);
    // Route::post($uri, $callback);

    // Complementares
    // Route::put($uri, $callback);
    // Route::delete($uri, $callback);
    // Route::patch($uri, $callback);
    // Route::options($uri, $callback);

// Conjunto de métodos
Route::match(['get', 'post'], '/match', function () {
    //
});

// Qualquer método
Route::any('/any', function () {
    //
});

// Retornar view
Route::view('/welcome', 'post.index');

// Utilizando parâmetros
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});
Route::get('controller/{id?}', 'UserController@controller');
// Utilizando parâmetros opcionais
Route::get('user/{name?}', function ($name = "") {
    return 'User '.$name;
});

// Nomear uma rota com função anônima e controller
Route::get('user/{id}/profile', function ($id) {
})->name('profile');

Route::get('user/{id}/profile', 'UserController@index')->name('profile');

Route::group([
    'prefix' => 'grupo',
    'as'=> 'grupo.',
    'namespace' => 'Admin',
    'middleware' => 'auth'
    ], function () {
        Route::get('', function () {
        });
        Route::get('/{id}', function ($id) {
        });
    });

Route::group(['prefix' => 'post'], function () {
    Route::get('/', 'PostController@index');
});
