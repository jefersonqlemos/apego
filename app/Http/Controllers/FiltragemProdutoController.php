<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class FiltragemProdutoController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function filtragemProdutoVendido()
    {
        //
        $produtos = Produto::where('quantidade', '<', 1)->orderBy('idprodutos', 'desc')->simplePaginate(15);
        //dd($produtos);
        return view('produtos/listaproduto')->with('produtos', $produtos);

    }

    public function filtragemProdutoEmEstoque()
    {
        //
        $produtos = Produto::where('quantidade', '>', 0)->orderBy('idprodutos', 'desc')->simplePaginate(15);
        //dd($produtos);
        return view('produtos/listaproduto')->with('produtos', $produtos);
    }

}
