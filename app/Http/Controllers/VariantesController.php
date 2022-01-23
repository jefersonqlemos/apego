<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

use App\Tamanho;

use App\Produto;

use App\Foto;

use App\Marca;

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
        $fotos = Foto::where('produtos_idprodutos', $variante)->get();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        $marcas = Marca::all();
        return view('produtos/createvariante')->with(compact('categorias', 'fotos', 'tamanhos', 'produto', 'marcas'));
    }

    public function storeVarianteTamanho(Request $request)
    {
        $marca = Marca::find($request->marca);

        $produto = new Produto;
        $produto->nome = $request->nome;
        $produto->marca = $marca->marca;
        $produto->marcas_idmarcas = $marca->idmarcas;
        $produto->tamanhos_idtamanhos = $request->tamanho;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->brevedescricao = $request->brevedescricao;
        $produto->descricaodetalhada = $request->descricaodetalhada;
        $produto->generos_idgeneros = $request->genero;
        $produto->categorias_idcategorias = $request->categoria;
        $produto->foto = $request->fotoproduto;
        $produto->variante_tamanho = $request->variante_tamanho;
        $produto->save();

        return redirect('produtos');
    }

}
