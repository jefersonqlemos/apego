<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Produto;

use App\Categoria;

use App\Tamanho;

class AppController extends Controller
{
    //
    public function feminino()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('generos_idgeneros', 2)->where('quantidade', '>', 0)->paginate(12);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function masculino()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('generos_idgeneros', 1)->where('quantidade', '>', 0)->paginate(12);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function shopping()
    {
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->paginate(12);
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

        $sobre = Storage::disk('public')->get('sobre.json');
        $sobre = json_decode($sobre);
        $sobre = decrypt($sobre->data);
        $sobre = json_decode($sobre);

        return view('sobre')->with('sobre', $sobre);
    }

    public function search(Request $request)
    {
        $produtos = Produto::search($request->search)->paginate(12);
        //$orders->searchable();
        //dd($produtos);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }
}
