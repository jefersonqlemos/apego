<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

use App\Categoria;

use App\Tamanho;

class BuscaController extends Controller
{
    //

    public function buscaPorTamanho($id)
    {
        $produtos = Produto::where('tamanhos_idtamanhos', $id)->orderBy('idprodutos', 'desc')->where('quantidade', '>', 0)->paginate(12);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }

    public function buscaPorPreco($vmenor, $vmaior)
    {
        $vmenor = substr($vmenor, 1);
        $vmaior = substr($vmaior, 1);

        $produtos = Produto::whereRaw("CAST(REPLACE(preco,',','.') AS DECIMAL(10,2)) >  ?", $vmenor)->whereRaw("CAST(REPLACE(preco,',','.') AS DECIMAL(10,2)) <  ?", $vmaior)->orderBy('idprodutos', 'desc')->paginate(12);
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias'));
    }
}
