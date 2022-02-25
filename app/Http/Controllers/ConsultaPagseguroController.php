<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pagseguro;

use App\Pedido;

class ConsultaPagseguroController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function consultaPedidoPagseguro($idpedido){

        $PagSeguro = Pagseguro::find(1);
    
				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = $PagSeguro->email;

		$pedido = Pedido::find($idpedido);

        $referencia = $pedido->referencia;

        decrypt($PagSeguro->token);

        //$data = http_build_query($data);
		$url = 'https://ws.pagseguro.uol.com.br/v2/transactions';

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $url. "?email=". $emailPagseguro. "&token=". decrypt($PagSeguro->token) . "&reference=". $referencia);
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml = simplexml_load_string($xml);

        $pedido->status_idstatus = (string)$xml->transactions->transaction->status;

        $pedido->save();

        return redirect()->back();
        
        //dd((string)$xml->transactions->transaction->status);
        

        //https://ws.pagseguro.uol.com.br/v2/transactions?email=suporte@lojasapego.store&token=d2970a29-d0c3-4e9b-89ad-0d6865b1cb40fac99ced4db99db93f482fcb7308331b8ede-9698-4f2c-aa40-7712a24a6fe7&reference=31
		
	}
}
