<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Produto;

use App\Categoria;

use App\Tamanho;

use App\Marca;

class ProdutoController extends Controller
{
    //
    public function shop(){
        $produtos = Produto::orderBy('idprodutos', 'desc')
                ->where('quantidade', '>', 0)
                ->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();

        return compact('produtos', 'tamanhos', 'categorias', 'marcas');
    }
}
