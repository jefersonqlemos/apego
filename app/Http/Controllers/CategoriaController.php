<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

use App\Categoria;

use App\Tamanho;

class CategoriaController extends Controller
{
    //

    public function categoriaFeminino($id)
    {
        $produtos = Produto::where('generos_idgeneros', 2)->orWhere('generos_idgeneros', 3)->where('categorias_idcategorias', $id)->where('quantidade', '>', 0)->orderBy('idprodutos', 'desc')->paginate(9);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function categoriaMasculino($id)
    {
        $produtos = Produto::where('generos_idgeneros', 1)->orWhere('generos_idgeneros', 3)->where('categorias_idcategorias', $id)->where('quantidade', '>', 0)->orderBy('idprodutos', 'desc')->paginate(9);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function todasCategorias($id)
    {
        $produtos = Produto::where('categorias_idcategorias', $id)->orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->paginate(9);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

}
