<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Produto;

use App\Categoria;

use App\Tamanho;

use App\Marca;

use App\Cidade;

use App\Informacoesempresa;

use Cookie;

use Gloudemans\Shoppingcart\Facades\Cart;

class AppController extends Controller
{
    //
    public function feminino()
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->where('generos_idgeneros', 2)->orWhere('generos_idgeneros', 3)->groupBy('variante_tamanho')->where("cidades_idcidades", "=", $idcidade)->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function masculino()
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->where('generos_idgeneros', 1)->orWhere('generos_idgeneros', 3)->groupBy('variante_tamanho')->where("cidades_idcidades", "=", $idcidade)->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function infantil()
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::where("cidades_idcidades", "=", $idcidade)->orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->where('generos_idgeneros', 4)->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function shopping()
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::where("cidades_idcidades", "=", $idcidade)->orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function conta()
    {
        return view('home');
    }

    public function suporte()
    {
        
        $informacoesempresa = Informacoesempresa::find(1);

        return view('suporte')->with('informacoesempresa', $informacoesempresa);
    }

    public function search(Request $request)
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::search($request->search)->where('cidades_idcidades', $idcidade)->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function buscaCidade(Request $request){

        $cidades = Cidade::search($request->cidade)->take(5)->get();

        return response()->json($cidades);
    }

    public function cookieCidade(Request $request){
        Cookie::queue('cookieCidade', $request->idcidades, 6000);
        return response()->json($request->idcidades);
    }

     public function politica(){
        return view('politica');
     }

     public function depositos(){
        $idcidade = Cookie::get('cookieCidade');
        $cidade = Cidade::find($idcidade);
        return view('depositos')->with('cidade', $cidade);
     }

     public function updateDeposito(){
        Cookie::queue(Cookie::forget('cookieCidade'));
        Cart::destroy();
        return redirect('/');
     }
    
     public function getCidade(Request $request){
        $idcidade = Cookie::get('cookieCidade');
        $cidade = Cidade::find($idcidade);
        return response()->json($cidade);
    }
}
