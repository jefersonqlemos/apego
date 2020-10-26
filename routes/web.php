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

Route::get('/', 'IndexController@index');

Route::namespace("Admin")->prefix('admin')->group(function(){
	Route::get('/', 'HomeController@index')->name('admin.home');
	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
		Route::post('logout', 'LoginController@logout')->name('admin.logout');
	});
});

Route::get('carrinho', 'CarrinhoController@index');
Route::get('adicionaraocarrinho/{id}', 'CarrinhoController@adicionar');
Route::get('remover/{id}', 'CarrinhoController@remover');

//Route::get('/produto', 'CarrinhoController@indexCarrinho');

//Route::resource('produtos', 'ProdutoController');
Route::resource('produtos', 'ProdutoController');
Route::resource('pedidos', 'PedidoController');
Route::resource('fotos', 'FotoController');

Route::get('produtosvendidos', 'FiltragemProdutoController@filtragemProdutoVendido');
Route::get('produtosemestoque', 'FiltragemProdutoController@filtragemProdutoEmEstoque');


Route::get('editarsobre', 'SobreController@editarSobre');
Route::post('updatesobre', 'SobreController@updateSobre');


Route::get('feminino', 'AppController@feminino');
Route::get('masculino', 'AppController@masculino');
Route::get('shopping', 'AppController@shopping');
Route::get('sobre', 'AppController@sobre');
Route::get('conta', 'AppController@conta');


Route::get('categoriafeminino/{id}', 'CategoriaController@categoriaFeminino')->name('categoriafeminino');
Route::get('categoriamasculino/{id}', 'CategoriaController@categoriaMasculino');
Route::get('todascategorias/{id}', 'CategoriaController@todasCategorias');

Route::get('buscaportamanho/{id}', 'BuscaController@buscaPorTamanho');
Route::get('buscaporpreco/{vmenor}/{vmaior}', 'BuscaController@buscaPorPreco');

Route::get('verproduto/{id}', 'IndexController@verProduto');

Route::get('search', 'AppController@search');

Auth::routes();

Route::get('meuspedidos', 'HomeController@meusPedidos')->middleware('verified');
Route::get('comprados/{id}', 'HomeController@comprados')->middleware('verified');
Route::get('editarconta', 'HomeController@editarConta')->middleware('verified');
Route::get('home', 'HomeController@index')->name('home')->middleware('verified');
Route::post('atualizardadosusuario', 'HomeController@updateUsuario')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('conferirdados', 'RealizarPedidoController@conferirdados');
Route::post('pagamento', 'RealizarPedidoController@pagamento');

Route::post('emailnotificacao', 'IndexController@emailNotificacao');
Route::post('mensagemsuporte', 'IndexController@mensagemSuporte');

Route::get('/pagamento/requisicao/{assinatura_id}'
,'PagseguroController@criaRequisicao')->middleware('auth')->name('requisicao');

Route::post('/pagamento/pagar'
,'PagseguroController@criaPagamento')->middleware('auth')->name('pagar');
