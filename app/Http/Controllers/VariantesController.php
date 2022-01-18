<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

use App\Tamanho;

use App\Produto;

class VariantesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function cadastrarVarianteTamanho($variante)
    {
        //
        $produto = Produto::find($variante);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('produtos/createvariante')->with(compact('categorias', 'tamanhos', 'produto'));
    }

}
