<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pedido;

use App\Produto;

use App\Comprados;

use App\Statu;

use App\Dadosusuario;

class PedidoController extends Controller
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
        $pedidos = Pedido::join('status', 'pedidos.status_idstatus', '=', 'status.idstatus')->orderBy('idpedidos', 'desc')->simplePaginate(15);
        //dd($produtos);
        return view('pedidos/listapedido')->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $produtos = Produto::join('comprados', 'produtos.idprodutos', '=', 'comprados.produtos_idprodutos')
        ->join('tamanhos', 'produtos.tamanhos_idtamanhos', '=', 'tamanhos.idtamanhos')
        ->where('comprados.pedidos_idpedidos', $id)->get();

        $pedido = Pedido::find($id);
        $status = Statu::find($pedido->status_idstatus);
        $dadosusuario = Dadosusuario::find($pedido->users_id);

        return view('/pedidos/show')->with(compact('produtos', 'pedido', 'status', 'dadosusuario'));

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
        if($request->idstatus==104){
            
            $pedido = Pedido::find($id);
            $pedido->status_idstatus = $request->idstatus;
            $pedido->save();

            return redirect('pedidos/'.$id)->with('message', 'Status Atualizado para Pedido Cancelado');

        }else if($request->idstatus==101){

            $pedido = Pedido::find($id);
            $pedido->status_idstatus = $request->idstatus;
            $pedido->save();

            return redirect('pedidos/'.$id)->with('message', 'Status Atualizado Para Pedido Saiu para Entrega');

        }else if($request->idstatus==102){

            $pedido = Pedido::find($id);
            $pedido->status_idstatus = $request->idstatus;
            $pedido->save();

            return redirect('pedidos/'.$id)->with('message', 'Status Atualizado Para Não foi Possível Concluir a Entrega, Uma Nova Tentativa Será Feita');

        }else if($request->idstatus==103){

            $pedido = Pedido::find($id);
            $pedido->status_idstatus = $request->idstatus;
            $pedido->save();

            return redirect('pedidos/'.$id)->with('message', 'Status Atualizado Para Produto Entregue');

        }else{
            return redirect('pedidos/'.$id)->with('message', 'Ocorreu em erro não foi possivel atualizar');
        }

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
