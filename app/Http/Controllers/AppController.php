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

class AppController extends Controller
{
    //
    public function feminino()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('generos_idgeneros', 2)->orWhere('generos_idgeneros', 3)->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function masculino()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('generos_idgeneros', 1)->orWhere('generos_idgeneros', 3)->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function infantil()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('generos_idgeneros', 4)->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function shopping()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function conta()
    {
        return view('home');
    }

    public function sobre()
    {
        
        $informacoesempresa = Informacoesempresa::find(1);

        return view('sobre')->with('informacoesempresa', $informacoesempresa);
    }

    public function search(Request $request)
    {
        $produtos = Produto::search($request->search)->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function buscaCidade(Request $request){

        $cidades = Cidade::search($request->cidade)->get();

        return response()->json($cidades);
    }

    public function cookieCidade(Request $request){
        Cookie::queue('cookieCidade', $request->idcidades, 6000);
        return response()->json(['success'=>$request->idcidades]);
     }

     public function politica(){
        return view('politica');
     }

     public function depositos(){
        return view('depositos');
     }
    
}
