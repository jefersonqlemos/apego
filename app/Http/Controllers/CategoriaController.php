<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

use App\Categoria;

use App\Tamanho;

use App\Marca;

use Cookie;

class CategoriaController extends Controller
{
    //

    public function categoriaFeminino($id)
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->where('generos_idgeneros', 2)->orWhere('generos_idgeneros', 3)->where('categorias_idcategorias', $id)->groupBy('variante_tamanho')->where("cidades_idcidades", "=", $idcidade)->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function categoriaMasculino($id)
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->where('generos_idgeneros', 1)->orWhere('generos_idgeneros', 3)->where('categorias_idcategorias', $id)->groupBy('variante_tamanho')->where("cidades_idcidades", "=", $idcidade)->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function categoriaInfantil($id)
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::where("cidades_idcidades", "=", $idcidade)->where('generos_idgeneros', 4)->where('categorias_idcategorias', $id)->orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function todasCategorias($id)
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::where("cidades_idcidades", "=", $idcidade)->where('categorias_idcategorias', $id)->orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

}
