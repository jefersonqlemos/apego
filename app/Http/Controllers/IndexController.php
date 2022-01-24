<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

use App\Foto;

use App\Genero;

use App\Tamanho;

use App\Email;

use App\Suporte;

use App\Marca;

use App\Informacoeslayout;

use Cookie;

use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    
    //
    public function index()
    {
        //
        $idcidade = Cookie::get('cookieCidade');
        dd($idcidade);

        $query = "CAST(preco AS DECIMAL(10,2)) ASC";

        $produtos = Produto::where("cidades_idcidades", "=", $idcidade)->where("quantidade", ">", 0)->orderBy('idprodutos', 'desc')->groupBy('variante_tamanho')->take(8)->get();
        $ultimosavaliados = Produto::where("avaliacao", "!=", null)->orderBy('idprodutos', 'desc')->groupBy('variante_tamanho')->take(3)->get();
        $ultimosvendidos = Produto::where("quantidade", 0)->orderBy('idprodutos', 'desc')->groupBy('variante_tamanho')->take(3)->get();
        $maisbaratos = Produto::where("quantidade", ">", 0)->orderByRaw($query)->groupBy('variante_tamanho')->take(3)->get();
        $numeroitemsmasculino = Produto::where("generos_idgeneros", 1)->orWhere('generos_idgeneros', 3)->count();
        $numeroitemscalcados = Produto::where("categorias_idcategorias", 9)->count();
        $numeroitemsinfantil = Produto::where("generos_idgeneros", 4)->count();
        $numeroitemsacessorios = Produto::where("categorias_idcategorias", 19)->count();
        $informacoeslayout = Informacoeslayout::find(1);

        return view('index')->with(compact('produtos', 'ultimosavaliados', 'numeroitemsmasculino', 
        'numeroitemscalcados', 'numeroitemsinfantil', 'numeroitemsacessorios', 'ultimosvendidos', 'maisbaratos', 'informacoeslayout'));

    }

    public function verProduto($id){
        $produto = Produto::find($id);
        $variantes = Produto::where("variante_tamanho", $produto->variante_tamanho)->join('tamanhos', 'produtos.tamanhos_idtamanhos', '=', 'tamanhos.idtamanhos')->get();
        $genero = Genero::find($produto->generos_idgeneros);
        $tamanho = Tamanho::find($produto->tamanhos_idtamanhos);
        $fotos = Foto::where('produtos_idprodutos', $produto->variante_tamanho)->get();
        return view('produtodetalhes')->with(compact('produto', 'genero', 'fotos', 'tamanho', 'variantes'));
    }

    public function emailNotificacao(Request $request){

        $email = new Email;
        $email->email = $request->email;
        $email->save();

        return redirect()->back()->with('message', 'Agora Você Será Notificado Semanalmente dos Produtos mais Recentes');
    }

    public function mensagemSuporte(Request $request){

        $suporte = new Suporte;
        $suporte->nome = $request->nome;
        $suporte->email = $request->email;
        $suporte->mensagem = $request->mensagem;
        $suporte->status = 0;
        $suporte->save();

        return redirect()->back()->with('message', 'Sua Mensagem foi Enviada ao Suporte, Responderemos em Seu E-mail');
    }

    public function teste(){
        
        //$response = Http::timeout(4)->get('http://apego.store/api/listapedidos')['idpedidos'];

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
        echo $result;
        curl_close( $ch );

        dd($result);
    }

}
