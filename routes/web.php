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
Route::post('adicionaraocarrinho/{id}', 'CarrinhoController@adicionar');
Route::post('atualizarcarrinho/', 'CarrinhoController@atualizarCarrinho');
Route::get('adicaorapida/{id}', 'CarrinhoController@adicaoRapida');
Route::get('remover/{id}', 'CarrinhoController@remover');

//Route::get('/produto', 'CarrinhoController@indexCarrinho');

Route::get('listasuporte', 'SuporteController@listaSuporte');
Route::get('mensagemsuporte/{id}', 'SuporteController@mensagemSuporte');
Route::post('resposta/{id}', 'SuporteController@resposta');

//Route::resource('produtos', 'ProdutoController');
Route::resource('produtos', 'ProdutoController');
Route::resource('pedidos', 'PedidoController');
Route::resource('fotos', 'FotoController');
Route::get('cadastrarvariantetamanho/{variante}', 'VariantesController@cadastrarVarianteTamanho');
Route::post('storevariantetamanho', 'VariantesController@storeVarianteTamanho');

Route::get('produtosvendidos', 'FiltragemProdutoController@filtragemProdutoVendido');
Route::get('produtosemestoque', 'FiltragemProdutoController@filtragemProdutoEmEstoque');


Route::get('editarsobre', 'SobreController@editarSobre');
Route::post('updatesobre', 'SobreController@updateSobre');


Route::get('feminino', 'AppController@feminino');
Route::get('masculino', 'AppController@masculino');
Route::get('infantil', 'AppController@infantil');
Route::get('shopping', 'AppController@shopping');
Route::get('sobre', 'AppController@sobre');
Route::get('politica', 'AppController@politica');
Route::get('depositos', 'AppController@depositos');
Route::get('conta', 'AppController@conta');
Route::post('cookiecidade', 'AppController@cookieCidade');


Route::get('categoriafeminino/{id}', 'CategoriaController@categoriaFeminino')->name('categoriafeminino');
Route::get('categoriamasculino/{id}', 'CategoriaController@categoriaMasculino');
Route::get('categoriainfantil/{id}', 'CategoriaController@categoriaInfantil');
Route::get('todascategorias/{id}', 'CategoriaController@todasCategorias');

Route::get('buscaportamanho/{id}', 'BuscaController@buscaPorTamanho');
Route::get('buscaporpreco/{vmenor}/{vmaior}', 'BuscaController@buscaPorPreco');
Route::get('buscapormarca', 'BuscaController@buscaPorMarca');

Route::get('verproduto/{id}', 'IndexController@verProduto');

Route::get('search', 'AppController@search');

Route::post('emailnotificacao', 'IndexController@emailNotificacao');
Route::post('mensagemsuporte', 'IndexController@mensagemSuporte');

Auth::routes();

Route::get('meuspedidos', 'HomeController@meusPedidos')->middleware('verified');
Route::get('comprados/{id}', 'HomeController@comprados')->middleware('verified');
Route::get('editarconta', 'HomeController@editarConta')->middleware('verified');
Route::get('home', 'HomeController@index')->name('home')->middleware('verified');
Route::post('atualizardadosusuario', 'HomeController@updateUsuario')->middleware('verified');
Route::post('trocaremail', 'HomeController@trocarEmail')->middleware('verified');
Route::post('avaliacao/{id}', 'HomeController@avaliacao')->middleware('verified');

Route::get('/authenticate/index/iniciapagamento', 'PagseguroController@iniciaPagamentoAction')->middleware('verified');
Route::post('/authenticate/index/efetuapagamentocartao', 'PagseguroController@efetuaPagamentoCartao')->middleware('verified');
Route::post('/authenticate/index/efetuapagamentoboleto', 'PagseguroController@efetuaPagamentoBoleto')->middleware('verified');
Route::post('/authenticate/index/efetuapagamentodebito', 'PagseguroController@efetuaPagamentoDebito')->middleware('verified');

Auth::routes(['verify' => true]);

Route::get('conferirdados', 'RealizarPedidoController@conferirdados')->middleware('verified');
Route::post('concluirdados', 'RealizarPedidoController@concluirDados')->middleware('verified');
Route::get('pagamento', 'RealizarPedidoController@pagamento')->middleware('verified');
Route::post('pagamentonaentrega', 'RealizarPedidoController@pagamentoNaEntrega')->middleware('verified');

Route::get('teste', 'IndexController@teste');