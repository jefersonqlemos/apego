<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pagseguro;

use App\Pedido;

class NotificacaoPagSeguroController extends Controller
{
    //
    public function notificacao(Request $request) {
        //echo $request->notificationCode;
        //echo $request->notificationType;
        $PagSeguro = Pagseguro::find(1);
    
				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = $PagSeguro->email; //aqui colocar o email cadastrado no pagseguro

		$data = http_build_query($data);
		$url = 'https://ws.pagseguro.uol.com.br/v3/transactions/notifications/';

		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $url. $request->notificationCode. "?email=" . $emailPagseguro. "&token=". decrypt($PagSeguro->token));
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);

        $code = $xml->code;
        $status = $xml->status;

        Pedido::where('code', $code)->update(['status_idstatus' => $status]);

        //dd($idSessao);
        //return response()->json($xml);
		//echo $idSessao;
		exit;
    }
}
