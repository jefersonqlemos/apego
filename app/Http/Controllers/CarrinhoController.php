<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;

use App\Produto;

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

    public function adicionar($id)
    {
        
        $aa = Cart::search(function ($cart, $rowId) use($id){
            return $cart->id == $id;
        });
        
        if($aa->count() == 0){
            $produto = Produto::find($id);
            $preco=str_replace(',','.', $produto->preco);
            Cart::add($id, $produto->nome, $produto->quantidade, $preco, ['foto' => $produto->foto]);
        }
        
        return redirect('carrinho');
    }

    public function remover($id)
    {
        Cart::remove($id);
        return redirect('carrinho');
    }
}
