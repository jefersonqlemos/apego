<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Categoria;

use App\Tamanho;

use App\Produto;

use App\Foto;

use App\Marca;

use App\Cidade;

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
        $idadmin = Auth::user()->id;

        $produto = Produto::find($variante);
        $fotos = Foto::where('produtos_idprodutos', $variante)->get();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        $marcas = Marca::all();

        if($idadmin == 1){

            $cidades = Cidade::all();
            $cidade = $idadmin;
            return view('produtos/createvariante')->with(compact('categorias', 'fotos', 'tamanhos', 'produto', 'marcas', 'cidades', 'cidade'));

        }else{
            $cidade = $idadmin;
            return view('produtos/create')->with(compact('categorias', 'tamanhos', 'marcas', 'cidade'));
        }

        
        
    }

    public function storeVarianteTamanho(Request $request)
    {

        $idadmin = Auth::user()->id;

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

        if($idadmin==1){
            $produto->cidades_idcidades = $request->cidade;
        }else{
            $produto->cidades_idcidades = $idadmin;
        }

        $produto->save();

        return redirect('produtos');
    }

}
