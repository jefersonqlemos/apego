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

use App\Cidade;

use Cookie;

//use Illuminate\Support\Facades\Storage;

use App\Formasdepagamento;

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

        $cidade = Cidade::where('cidade', $request->cidade)->first();

        $idcidade = Cookie::get('cookieCidade');

        if($cidade!=null){

            $id = Auth::id();
            $dadosusuario = Dadosusuario::find($id);
            $dadosusuario->telefone = $request->telefone;
            $dadosusuario->cidade = $cidade->cidade;
            $dadosusuario->cidades_idcidades = $cidade->idcidades;
            $dadosusuario->bairro = $request->bairro;
            $dadosusuario->rua = $request->endereco;
            $dadosusuario->numero = $request->numero;
            $dadosusuario->complemento = $request->complemento;
            $dadosusuario->save();

            if($request->idcidade == $idcidade){
                return redirect('pagamento');
            }else{
                return redirect()->back()->with('message', 'A compra não pode ser concluida pois a cidade de entrega não é a mesma que a cidade da compra');
            }

        }else{
            return redirect()->back()->with('message', 'A cidade digitada esta incorreta ou não está contida em nossos registros');
        }

        
    }

    public function pagamento(){

        $idcidade = Cookie::get('cookieCidade');
        $id = Auth::id();
        $dadosusuario = Dadosusuario::find($id);

        if(Cart::content()->count() == 0 || $dadosusuario->cidades_idcidades != $idcidade){
            return redirect()->back();
        }else{
            
            $total = Cart::total();
            $subtotal = Cart::subtotal();

            /*$pagamentos = Storage::disk('public')->get('pagamentos.json');
            $pagamentos = json_decode($pagamentos);
            $pagamentos = decrypt($pagamentos->data);
            $pagamentos = json_decode($pagamentos);*/

            $formasdepagamento = Formasdepagamento::find(1);
    
            return view('realizarpedido/pagamento')->with(compact( 'total', 'subtotal', 'formasdepagamento'));
        }
        
    }

    public function pagamentoNaEntrega(){

        if(Cart::content()->count()>0){

            $produtos = Cart::content();
            
            foreach($produtos as $produto){

                $item = Produto::find($produto->id);
                    if($item->quantidade==0){
                        $message = 'Que pena o produto '.$item->nome.' '.$item->marca.' de R$ '.$item->preco.' foi vendido agora mesmo, infelizmente não esta mais em nosso estoque';
                        return redirect('carrinho')->with('message', $message);
                    }

            }

            $id = Auth::id();
            $dadosusuario = Dadosusuario::find($id);

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
            $pedido->users_id = $id;
            $pedido->cidades_idcidades = $dadosusuario->cidades_idcidades;
            $pedido->cidade = $dadosusuario->cidade;
            $pedido->bairro = $dadosusuario->bairro;
            $pedido->rua = $dadosusuario->rua;
            $pedido->complemento = $dadosusuario->complemento;
            $pedido->numero = $dadosusuario->numero;
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

            $url = 'https://fcm.googleapis.com/fcm/send';

            $fields = array(
                    'to' => 'ecDnbDIqT8uo8Jqj3cQG6X:APA91bEsnAMiyAMSL5VX6nu8peIalC6ud35gZUgFtYJyqSf2_ij44q5m-kuLzlen2i1y5FQi3lZK3as4c0Q7jY2u7BV7zK8VPu17KcItTtqoEfz31GGLafUPp4O3flfSrt0-kjQk0vAt',
                    /*'data' => array(
                            "message" => 'ola mundo',
                            'title' => 'title'
                    )*/
                    "notification" => array(
                        "title" => "Apego",
                        "sound" => "default",
                        "body"=> "Foi realizado um novo pedido pelo Site..."
                    )
            );
            $fields = json_encode($fields);

            $headers = array(
                    'Authorization:key='."AAAAAe618xw:APA91bFMEVKyD0qin9sstApnBQ8v20sFeGgeDSjMwlnso1uHmMiw-0OaKc00DTn-b6JC1DuWBpCLTS8TKFYkb4i0ImJPDguhz2uTzzFVfXGN9rCkXzc9vB9hubbD5IGTAMV4lY_wI9bT",
                    'Content-Type:application/json'
            );

            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $url );
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields );

            $result = curl_exec($ch);
            curl_close( $ch );

            return view('realizarpedido/conclusaopedido')->with(compact('pedido', 'status'));
        
        }else{
            return redirect('/');
        }

    }

}
