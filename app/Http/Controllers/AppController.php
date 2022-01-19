<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Produto;

use App\Categoria;

use App\Tamanho;

use App\Informacoesempresa;

use Cookie;

class AppController extends Controller
{
    //
    public function feminino()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('generos_idgeneros', 2)->orWhere('generos_idgeneros', 3)->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function masculino()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('generos_idgeneros', 1)->orWhere('generos_idgeneros', 3)->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function infantil()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('generos_idgeneros', 4)->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function shopping()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
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
        $produtos = Produto::search($request->search)->paginate(9);////////////////////////////////////////////////////////////////
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function cookieCidade(Request $request){
        Cookie::queue('cookieCidade', "Videira", 6000);
        return response()->json(['success'=>'Got Simple Ajax Request.']);
     }

     public function politica(){
        return view('politica');
     }

     public function depositos(){
        return view('depositos');
     }
    
}
