<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

use App\Foto;

use App\Genero;

use App\Tamanho;

class IndexController extends Controller
{
    
    //
    public function index()
    {
        //
        $query = "CAST(preco AS DECIMAL(10,2)) ASC";

        $produtos = Produto::where("quantidade", ">", 0)->orderBy('idprodutos', 'desc')->take(8)->get();
        $ultimosavaliados = Produto::where("avaliacao", "!=", null)->orderBy('idprodutos', 'desc')->take(3)->get();
        $ultimosvendidos = Produto::where("quantidade", 0)->orderBy('idprodutos', 'desc')->take(3)->get();
        $maisbaratos = Produto::where("quantidade", ">", 0)->orderByRaw($query)->take(3)->get();
        $numeroitemsmasculino = Produto::where("generos_idgeneros", 1)->count();
        $numeroitemspulseiras = Produto::where("categorias_idcategorias", 17)->count();
        $numeroitemscolares = Produto::where("categorias_idcategorias", 16)->count();
        $numeroitemsacessorios = Produto::where("categorias_idcategorias", 19)->count();

        //dd($numeroitemsmasculino);
        return view('index')->with(compact('produtos', 'ultimosavaliados', 'numeroitemsmasculino', 
        'numeroitemspulseiras', 'numeroitemscolares', 'numeroitemsacessorios', 'ultimosvendidos', 'maisbaratos'));

    }

    public function verProduto($id){

        $produto = Produto::find($id);
        $genero = Genero::find($produto->generos_idgeneros);
        $tamanho = Tamanho::find($produto->tamanhos_idtamanhos);
        $fotos = Foto::where('produtos_idprodutos', $id)->get();
        return view('produtodetalhes')->with(compact('produto', 'genero', 'fotos', 'tamanho'));
    }
}
