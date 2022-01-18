<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categoria;

use App\Tamanho;

use App\Produto;

use App\Foto;

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
        return view('produtos/createvariante')->with(compact('categorias', 'fotos', 'tamanhos', 'produto'));
    }

    public function storeVarianteTamanho($request)
    {
        $produto = new Produto;
        $produto->nome = $request->nome;
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
