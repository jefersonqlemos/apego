<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Dadosusuario;

use App\Pedido;

use App\Produto;

use App\Comprado;

use App\Statu;

class RealizarPedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function conferirdados()
    {
        if(Cart::content()->count() == 0){
            return redirect()->back();
        }else{
            $id = Auth::id();
            $dadosusuario = Dadosusuario::find($id);
            return view('realizarpedido/conferirdados')->with('dadosusuario', $dadosusuario);
        }
    }

    public function concluirDados(Request $request){
        $id = Auth::id();
        $dadosusuario = Dadosusuario::find($id);
        $dadosusuario->telefone = $request->telefone;
        $dadosusuario->bairro = $request->bairro;
        $dadosusuario->rua = $request->endereco;
        $dadosusuario->numero = $request->numero;
        $dadosusuario->complemento = $request->complemento;
        $dadosusuario->save();

        return redirect('pagamento');
    }

    public function pagamento(){

        if(Cart::content()->count() == 0){
            return redirect()->back();
        }else{
            
            $total = Cart::total();
            $subtotal = Cart::subtotal();
    
            return view('realizarpedido/pagamento')->with(compact( 'total', 'subtotal'));
        }
        
    }

    public function pagamentoNaEntrega(){

        if(Cart::content()->count()>0){

            $produtos = Cart::content();
            
            foreach($produtos as $produto){

                $item = Produto::find($produto->id);
                    if($item->quantidade==0){
                        $message = 'Que pena o produto '.$item->nome.' de R$ '.$item->preco.' foi vendido agora mesmo, infelizmente não esta mais em nosso estoque';
                        return redirect('carrinho')->with('message', $message);
                    }

            }

            $pedido = new Pedido;
            $pedido->numeroitens = Cart::content()->count();
            $pedido->tipotransacao = 100;
            $pedido->valortotal = Cart::total();
            $pedido->valorrecebido = Cart::total();
            $pedido->taxapagseguro = 0;
            $pedido->date = date("Y-m-d h:m:s");
            $pedido->status_idstatus = 100;
            $pedido->numeroparcelas = 1;
            $pedido->code = 0;
            $pedido->users_id = Auth::id();
            $pedido->save();

            foreach($produtos as $produto){

                $comprados = new Comprado;

                $item = Produto::find($produto->id);
                $item->quantidade = $item->quantidade-$produto->qty;
                $item->save();
                    
                $comprados->produtos_idprodutos = $produto->id;
                $comprados->quantidade = $produto->qty;
                $comprados->pedidos_idpedidos = $pedido->idpedidos;

                $comprados->save();

            }
            
            //dd($pedido);

            Cart::destroy();
            
            $status = Statu::find($pedido->status_idstatus);

            return view('realizarpedido/conclusaopedido')->with(compact('pedido', 'status'));
        
        }else{
            return redirect('/');
        }

    }

}
