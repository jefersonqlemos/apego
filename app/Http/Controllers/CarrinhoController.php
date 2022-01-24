<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Produto;

use App\Tamanho;

use App\Marca;

use Cookie;

class CarrinhoController extends Controller
{
    //
    public function index()
    {
        $carrinho = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();
        return view('carrinho')->with(compact('carrinho', 'total', 'subtotal'));
    }

    public function adicionar($id, Request $request)
    {

        $idcidade = Cookie::get('cookieCidade');
        $produto = Produto::find($id);

        if($produto->cidades_idcidades == $idcidade){

            $aa = Cart::search(function ($cart, $rowId) use($id){
                return $cart->id == $id;
            }); 
            
            if($aa->count() == 0){
                $produto = Produto::find($id);
                $tamanho = Tamanho::find($produto->tamanhos_idtamanhos);
                $preco=str_replace(',','.', $produto->preco);
                Cart::add($id, $produto->nome." ".$produto->marca, $request->qty, $preco, ['foto' => $produto->foto, 'max' => $produto->quantidade, 'tamanho' => $tamanho->tamanho]);
            }else{
                foreach($aa as $a){
                    //Cart::remove($a->rowId);
                    Cart::update($a->rowId, $request->qty);
                }
                /*($produto = Produto::find($id);
                $preco=str_replace(',','.', $produto->preco);
                Cart::add($id, $produto->nome, $request->qty, $preco, ['foto' => $produto->foto, 'max' => $produto->quantidade]);*/
            }
            
            return redirect('carrinho');
        }else{
            return redirect()->back();
        }
    }

    public function adicaoRapida($id)
    {
        $idcidade = Cookie::get('cookieCidade');
        $produto = Produto::find($id);

        if($produto->cidades_idcidades == $idcidade){
            $aa = Cart::search(function ($cart, $rowId) use($id){
                return $cart->id == $id;
            }); 
            
            if($aa->count() == 0){
                $produto = Produto::find($id);
                $tamanho = Tamanho::find($produto->tamanhos_idtamanhos);
                $preco=str_replace(',','.', $produto->preco);
                Cart::add($id, $produto->nome." ".$produto->marca, 1, $preco, ['foto' => $produto->foto, 'max' => $produto->quantidade, 'tamanho' => $tamanho->tamanho]);
            }
            
            return redirect('carrinho');
        }else{
            return redirect()->back();
        }

        
    }

    public function atualizarCarrinho(Request $request)
    {
        if($request->qty!=null){
            $quantidades=$request->qty;
            $rowId=$request->rowId;
            foreach($quantidades as $index => $qty){
                Cart::update($rowId[$index], $qty);
            }
        }
        return redirect('carrinho');
    }

    public function remover($id)
    {
        Cart::remove($id);
        return redirect('carrinho');
    }
}
