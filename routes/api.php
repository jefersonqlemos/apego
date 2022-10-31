<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'authadmin'
], function () {
    Route::post('login', 'Admin\Auth\AuthController@login')->name('login');
    Route::post('register', 'Admin\Auth\AuthController@register');
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'Admin\Auth\AuthController@logout');
        Route::get('user', 'Admin\Auth\AuthController@user');
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//esse colocar dentro do group dentro da function junto com logout e user
Route::get('/listapedidos', 'Api\PedidoController@index');
Route::get('/searchpedidos', 'Api\PedidoController@searchPedidos');

Route::post('/notificacaopagseguro', 'NotificacaoPagSeguroController@notificacao');

Route::get('/listaprodutos', 'Api\ProdutoController@shop');
