<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Dadosusuario;

use Gloudemans\Shoppingcart\Facades\Cart;

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
}
