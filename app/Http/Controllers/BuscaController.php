<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

use App\Categoria;

use App\Tamanho;

use App\Marca;

use Cookie;

class BuscaController extends Controller
{
    //

    public function buscaPorTamanho($id)
    {
        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::where("cidades_idcidades", "=", $idcidade)
                    ->where('quantidade', '>', 0)
                    ->where('tamanhos_idtamanhos', $id)
                    ->orderBy('idprodutos', 'desc')
                    ->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function buscaPorPreco($vmenor, $vmaior)
    {
        $vmenor = substr($vmenor, 1);
        $vmaior = substr($vmaior, 1);

        $idcidade = Cookie::get('cookieCidade');
        $produtos = Produto::where("cidades_idcidades", "=", $idcidade)
                        ->whereRaw("CAST(REPLACE(preco,',','.') AS DECIMAL(10,2)) >  ?", $vmenor)
                        ->whereRaw("CAST(REPLACE(preco,',','.') AS DECIMAL(10,2)) <  ?", $vmaior)
                        ->orderBy('idprodutos', 'desc')
                        ->groupBy('variante_tamanho')->paginate(9);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));
    }

    public function buscaPorMarca(Request $request)
    {
        $idcidade = Cookie::get('cookieCidade');
        if($request->checkbox!=null){
            $produtos = Produto::where("cidades_idcidades", "=", $idcidade)
                        ->where('quantidade', '>', 0)
                        ->whereIn('marcas_idmarcas', $request->checkbox)
                        ->orderBy('idprodutos', 'desc')
                        ->groupBy('variante_tamanho')->paginate(9);
        }else{
            $produtos = Produto::where("cidades_idcidades", "=", $idcidade)
                        ->where('quantidade', '>', 0)
                        ->whereIn('marcas_idmarcas', [0])
                        ->orderBy('idprodutos', 'desc')
                        ->groupBy('variante_tamanho')->paginate(9);
        }
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        return view('shop')->with(compact('produtos', 'tamanhos', 'categorias', 'marcas'));

    }
}
