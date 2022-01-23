<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Produto;

use App\Foto;

use App\Categoria;

use App\Tamanho;

use App\Marca;

class ProdutoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produtos = Produto::orderBy('idprodutos', 'desc')->join('tamanhos', 'produtos.tamanhos_idtamanhos', '=', 'tamanhos.idtamanhos')->simplePaginate(15);
        //dd($produtos);
        return view('produtos/listaproduto')->with('produtos', $produtos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        $marcas = Marca::all();
        return view('produtos/create')->with(compact('categorias', 'tamanhos', 'marcas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        
        //dd($produto->idprodutos);
        
        $files = $request->file('files');

        if($request->hasFile('files'))
        {
            $isFirst = true;

            foreach ($files as $file) {
                $foto = new Foto();
                $fototemp = $file->store('/public/upload');
                $fototemp = Storage::url($fototemp);
                if($isFirst){
                    $produto->foto = $fototemp;
                    $produto->save();
                    $produto->variante_tamanho = $produto->idprodutos;
                    $produto->save();
                    $isFirst = false;
                }
                
                $foto->fotos = $fototemp;
                $foto->produtos_idprodutos = $produto->idprodutos;
                $foto->save();
            }
        }else{
            $produto->save();
        }

        return redirect('produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $produto = Produto::find($id);
        $tamanho = Tamanho::find($produto->tamanhos_idtamanhos);
        $fotos = Foto::where('produtos_idprodutos', $id)->get();
        //dd($fotos);
        return view('produtos/show')->with(compact('produto', 'fotos', 'tamanho'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produto = Produto::find($id);
        $fotos = Foto::where('produtos_idprodutos', $id)->get();
        $categorias = Categoria::all();
        $tamanhos = Tamanho::all();
        $marcas = Marca::all();
        //dd($fotos);
        return view('produtos/edit')->with(compact('produto', 'fotos', 'categorias', 'tamanhos', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $marca = Marca::find($request->marca);

        $produto = Produto::find($id);
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
        $produto->save();

        return redirect('produtos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
