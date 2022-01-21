<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

use App\Categoria;

use App\Tamanho;

use App\Marca;

class CategoriaController extends Controller
{
    //

    public function categoriaFeminino($id)
    {
        $produtos = Produto::where('generos_idgeneros', 2)->orWhere('generos_idgeneros', 3)->where('categorias_idcategorias', $id)->where('quantidade', '>', 0)->orderBy('idprodutos', 'desc')->groupBy('variante_tamanho')->join('marcas', 'produtos.marcas_idmarcas', '=', 'marcas.idmarcas')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function categoriaMasculino($id)
    {
        $produtos = Produto::where('generos_idgeneros', 1)->orWhere('generos_idgeneros', 3)->where('categorias_idcategorias', $id)->where('quantidade', '>', 0)->orderBy('idprodutos', 'desc')->groupBy('variante_tamanho')->join('marcas', 'produtos.marcas_idmarcas', '=', 'marcas.idmarcas')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function categoriaInfantil($id)
    {
        $produtos = Produto::where('generos_idgeneros', 4)->where('categorias_idcategorias', $id)->orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->groupBy('variante_tamanho')->join('marcas', 'produtos.marcas_idmarcas', '=', 'marcas.idmarcas')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function todasCategorias($id)
    {
        $produtos = Produto::where('categorias_idcategorias', $id)->orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->groupBy('variante_tamanho')->join('marcas', 'produtos.marcas_idmarcas', '=', 'marcas.idmarcas')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

}
