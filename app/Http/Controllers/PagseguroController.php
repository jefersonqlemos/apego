<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\Storage;

use App\Dadosusuario;

use App\Produto;

use App\Pedido;

use App\Comprado;

use App\Statu;

use App\Tamanho;

use App\Pagseguro;

class PagseguroController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function iniciaPagamentoAction() { //gera o código de sessão obrigatório para gerar identificador (hash)

		//$id = (string) $this->params ()->fromRoute( 'confirma', null );

		/*$importante = Storage::disk('public')->get('importante.json');
		$importante = json_decode($importante);
		$importante = decrypt($importante->data);
		$importante = json_decode($importante);*/

		$PagSeguro = Pagseguro::find(1);

		$data['token'] = decrypt($PagSeguro->token); //aqui dentro das aspas colocar o token do pagseguro que deve ser gerado em integrações

				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = $PagSeguro->email; //aqui colocar o email cadastrado no pagseguro

		$data = http_build_query($data);
		$url = 'https://ws.pagseguro.uol.com.br/v2/sessions';

		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);

        //dd($idSessao);
        return response()->json($xml);
		//echo $idSessao;
		exit;
		//return $codigoRedirecionamento;

    }
    
    public function efetuaPagamentoCartao(Request $request) {

		$PagSeguro = Pagseguro::find(1);

        //$_SERVER['REMOTE_ADDR']
        $emailPagseguro = $PagSeguro->email; //aqui colocar o email cadastrado no pagseguro
    	$tokenPagseguro = decrypt($PagSeguro->token); //aqui dentro das aspas colocar o token do pagseguro que deve ser gerado em integrações

        $dadosusuario = Dadosusuario::find(Auth::id());

        //tratamento para retirada de parenteses e traço dos telefones, e extração do codearea
        $telefone = $dadosusuario->telefone;
        $telefone = str_replace('(', '', $telefone);
        $telefone = str_replace(')', '', $telefone);
        $telefone = str_replace('-', '', $telefone); 
        $codeArea = substr($telefone, 0, 2);
        $telefone = substr($telefone, 2);

        $telefonetitular = $request->telefone;
        $telefonetitular = str_replace('(', '', $telefonetitular);
        $telefonetitular = str_replace(')', '', $telefonetitular);
        $telefonetitular = str_replace('-', '', $telefonetitular); 
        $telefonetitular = str_replace(' ', '', $telefonetitular); 
        $codeAreaTitular = substr($telefonetitular, 0, 2);
        $telefonetitular = substr($telefonetitular, 2);

        //busca email do usuario
        $email = Auth::user()->email;

        //tratamento retirada de pontos e traço cpf
        $cpf = $dadosusuario->cpf;
        $cpf = str_replace('.', '', $cpf);
        $cpf = str_replace('-', '', $cpf);

        $cpftitular = $request->cadCPF;
        $cpftitular = str_replace('.', '', $cpftitular);
        $cpftitular = str_replace('-', '', $cpftitular);


        $data['email'] = $emailPagseguro;
		$data['token'] = $tokenPagseguro; //token sandbox
		$data['paymentMode'] = 'default';
		$data['senderHash'] = $request->hashPagSeguro; //gerado via javascript
		$data['creditCardToken'] = $request->tokenPagamentoCartao; //gerado via javascript
		$data['paymentMethod'] = 'creditCard';
		$data['receiverEmail'] = $emailPagseguro;
		$data['senderName'] = $dadosusuario->nome." ".$dadosusuario->sobrenome; //nome do usuário deve conter nome e sobrenome
		$data['senderAreaCode'] = $codeArea;
		$data['senderPhone'] = $telefone;
		$data['senderEmail'] = $email;//'c52604891380076987330@sandbox.pagseguro.com.br';
		$data['senderCPF'] = $cpf;
        

        $produtos = Cart::content();//busca produtos do carrinho

        $i = 0;

        //busca informações dos produtos na base de dados, contidos no carrinho
        foreach($produtos as $produto){

            $i++;
            
			$item = Produto::find($produto->id);
			$tamanho = Tamanho::find($item->tamanhos_idtamanhos);
			
			if($item->quantidade==0){
				$message = 'Que pena o produto '.$item->nome.' '.$item->marca.' de R$ '.$item->preco.' foi vendido todos agora mesmo, infelizmente não tem mais em nosso estoque';
				return redirect('carrinho')->with('message', $message);
			}

            //troca virgula por ponto
            $preco = str_replace(',', '.', $item->preco);

            $data['itemId'.$i] = "".$item->idprodutos;
            $data['itemQuantity'.$i] = $produto->qty.""; //pega do carrinho quantidade
            $data['itemDescription'.$i] = $item->nome.' '.$item->marca.' '.$tamanho->tamanho;
            $data['itemAmount'.$i] = $preco;

        }

        //limitado até 3x, parcelamento é o numero de parcelas
		 
		$parcelamento = explode('|', $request->parcelamento);
		$qtyparcela = $parcelamento[0];
		$precoparcela	= $parcelamento[1];

		$data['installmentQuantity'] = $qtyparcela;
        $data['noInterestInstallmentQuantity'] = '3';
        $data['installmentValue'] = $precoparcela; //valor da parcela, duas aspas para tornar string
        $data['maxInstallmentNoInterest'] = '3';
		$data['creditCardHolderName'] = $request->nome." ".$request->sobrenome; //nome do titular
		$data['creditCardHolderCPF'] = $cpftitular;
		$data['creditCardHolderBirthDate'] = date("d/m/Y", strtotime($request->datadenascimento));
		$data['creditCardHolderAreaCode'] = $codeAreaTitular;
        $data['creditCardHolderPhone'] = $telefonetitular;
        $data['billingAddressComplement'] = $dadosusuario->complemento;
        $data['billingAddressStreet'] = $dadosusuario->rua;
		$data['billingAddressNumber'] = $dadosusuario->numero;
		$data['billingAddressDistrict'] = $dadosusuario->bairro;
		$data['billingAddressPostalCode'] = '89560170'; //cep com usuarios só de Videira
		$data['billingAddressCity'] = 'Videira';
		$data['billingAddressState'] = 'SC';
		$data['billingAddressCountry'] = 'BRA';
        $data['currency'] = 'BRL';
        
        

        $data['reference'] = "".Auth::id(); //referencia qualquer do produto
		$data['shippingAddressRequired'] = 'false';

        //dd($data); //para visualização xml

		$data = http_build_query($data);
		$url = 'https://ws.pagseguro.uol.com.br/v2/transactions'; //URL de teste


		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);

		$code = $xml->code;

		//dd($xml);
		
		if($code!=null){

			$id = Auth::id();
            $dadosusuario = Dadosusuario::find($id);
			
			$pedido = new Pedido;
			$pedido->numeroitens = intval($xml->itemCount);
			$pedido->tipotransacao = 1;
			$pedido->valortotal = $xml->grossAmount;
			$pedido->valorrecebido = $xml->netAmount;
			$pedido->taxapagseguro = $xml->feeAmount;
			$pedido->date = $xml->date;
			$pedido->status_idstatus = intval($xml->status);
			$pedido->numeroparcelas = intval($xml->installmentCount);
			$pedido->code = $code;
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
			return redirect('pagamento')->with('message', 
			'Ouve um erro na transação tente novamente, no caso de insucesso contate o suporte');
		}

    }
    
    public function efetuaPagamentoBoleto(Request $request) {

		$PagSeguro = Pagseguro::find(1);

        //$_SERVER['REMOTE_ADDR']
        $emailPagseguro = $PagSeguro->email; //aqui colocar o email cadastrado no pagseguro
    	$tokenPagseguro = decrypt($PagSeguro->token); //aqui dentro das aspas colocar o token do pagseguro que deve ser gerado em integrações	
		
		$dadosusuario = Dadosusuario::find(Auth::id());

		$telefone = $dadosusuario->telefone;
        $telefone = str_replace('(', '', $telefone);
        $telefone = str_replace(')', '', $telefone);
        $telefone = str_replace('-', '', $telefone); 
        $codeArea = substr($telefone, 0, 2);
		$telefone = substr($telefone, 2);
		
		$email = Auth::user()->email;

		$cpf = $dadosusuario->cpf;
        $cpf = str_replace('.', '', $cpf);
		$cpf = str_replace('-', '', $cpf);
		
		$produtos = Cart::content();//busca produtos do carrinho

        $i = 0;

        //busca informações dos produtos na base de dados, contidos no carrinho
        foreach($produtos as $produto){

			$i++;
			
			$item = Produto::find($produto->id);
			$tamanho = Tamanho::find($item->tamanhos_idtamanhos);
			
			if($item->quantidade==0){
				$message = 'Que pena o produto '.$item->nome.' '.$item->marca.' de R$ '.$item->preco.' foi vendido todos agora mesmo, infelizmente não tem mais em nosso estoque';
				return redirect('carrinho')->with('message', $message);
			}

            //troca virgula por ponto
            $preco = str_replace(',', '.', $item->preco);

            $data['itemId'.$i] = "".$item->idprodutos;
            $data['itemQuantity'.$i] = $produto->qty.""; //pega do carrinho quantidade
            $data['itemDescription'.$i] = $item->nome.' '.$item->marca.' '.$tamanho->tamanho;
            $data['itemAmount'.$i] = $preco;

        }

		$data['email'] = $emailPagseguro;
		$data['token'] = $tokenPagseguro; //token sandbox test
		$data['paymentMode'] = 'default';
		$data['senderHash'] = $request->hashPagSeguro;
		$data['paymentMethod'] = 'boleto';
		$data['receiverEmail'] = $emailPagseguro;
		$data['senderName'] = $dadosusuario->nome." ".$dadosusuario->sobrenome;
		$data['senderAreaCode'] = $codeArea;
		$data['senderPhone'] = $telefone;
		$data['senderEmail'] = $email;//'c52604891380076987330@sandbox.pagseguro.com.br';
		$data['senderCPF'] = $cpf;
		$data['currency'] = 'BRL';
		
		$data['reference'] = "".Auth::id();
		$data['shippingAddressRequired'] = 'false';

		$data = http_build_query($data);
		$url = 'https://ws.pagseguro.uol.com.br/v2/transactions'; //URL de teste

		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);

		//dd($xml);

		$code = $xml->code;

		if($code!=null){

			$id = Auth::id();
            $dadosusuario = Dadosusuario::find($id);
			
			$pedido = new Pedido;
			$pedido->numeroitens = intval($xml->itemCount);
			$pedido->tipotransacao = 2;
			$pedido->valortotal = $xml->grossAmount;
			$pedido->valorrecebido = $xml->netAmount;
			$pedido->taxapagseguro = $xml->feeAmount;
			$pedido->date = $xml->date;
			$pedido->status_idstatus = intval($xml->status);
			$pedido->numeroparcelas = intval($xml->installmentCount);
			$pedido->code = $code;
			$pedido->link = $xml->paymentLink;
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
			return redirect('pagamento')->with('message', 
			'Ouve um erro na transação tente novamente, no caso de insucesso contate o suporte');
		}

	}

	public function efetuaPagamentoDebito(Request $request) {

		$PagSeguro = Pagseguro::find(1);

        //$_SERVER['REMOTE_ADDR']
        $emailPagseguro = $PagSeguro->email; //aqui colocar o email cadastrado no pagseguro
    	$tokenPagseguro = decrypt($PagSeguro->token); //aqui dentro das aspas colocar o token do pagseguro que deve ser gerado em integrações		
		
		$dadosusuario = Dadosusuario::find(Auth::id());

		$telefone = $dadosusuario->telefone;
        $telefone = str_replace('(', '', $telefone);
        $telefone = str_replace(')', '', $telefone);
        $telefone = str_replace('-', '', $telefone); 
        $codeArea = substr($telefone, 0, 2);
		$telefone = substr($telefone, 2);
		
		$email = Auth::user()->email;

		$cpf = $dadosusuario->cpf;
        $cpf = str_replace('.', '', $cpf);
		$cpf = str_replace('-', '', $cpf);
		
		$produtos = Cart::content();//busca produtos do carrinho

        $i = 0;

        //busca informações dos produtos na base de dados, contidos no carrinho
        foreach($produtos as $produto){

            $i++;
            
			$item = Produto::find($produto->id);
			$tamanho = Tamanho::find($item->tamanhos_idtamanhos);
			
			if($item->quantidade==0){
				$message = 'Que pena o produto '.$item->nome.' '.$item->marca.' de R$ '.$item->preco.' foi vendido todos agora mesmo, infelizmente não tem mais em nosso estoque';
				return redirect('carrinho')->with('message', $message);
			}

            //troca virgula por ponto
            $preco = str_replace(',', '.', $item->preco);

            $data['itemId'.$i] = "".$item->idprodutos;
            $data['itemQuantity'.$i] = $produto->qty.""; //pega do carrinho quantidade
            $data['itemDescription'.$i] = $item->nome.' '.$item->marca.' '.$tamanho->tamanho;
            $data['itemAmount'.$i] = $preco;

        }

		$data['email'] = $emailPagseguro;
		$data['token'] = $tokenPagseguro;

		$data['paymentMode'] = 'default';
		$data['senderHash'] = $request->hashPagSeguro;
		$data['paymentMethod'] = 'eft';
		$data['bankName'] = $request->banco;
		$data['receiverEmail'] = $emailPagseguro;
		$data['senderName'] = $dadosusuario->nome." ".$dadosusuario->sobrenome;
		$data['senderAreaCode'] = $codeArea;
		$data['senderPhone'] = $telefone;
		$data['senderEmail'] = $email;//'c52604891380076987330@sandbox.pagseguro.com.br';
		$data['senderCPF'] = $cpf;
		$data['currency'] = 'BRL';

		$data['reference'] = "".Auth::id();
		$data['shippingAddressRequired'] = 'false';

		$data = http_build_query($data);
		$url = 'https://ws.pagseguro.uol.com.br/v2/transactions'; //URL de teste

		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1');

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);

		$code = $xml->code;

		if($code!=null){

			$id = Auth::id();
            $dadosusuario = Dadosusuario::find($id);
			
			$pedido = new Pedido;
			$pedido->numeroitens = intval($xml->itemCount);
			$pedido->tipotransacao = 3;
			$pedido->valortotal = $xml->grossAmount;
			$pedido->valorrecebido = $xml->netAmount;
			$pedido->taxapagseguro = $xml->feeAmount;
			$pedido->date = $xml->date;
			$pedido->status_idstatus = intval($xml->status);
			$pedido->numeroparcelas = intval($xml->installmentCount);
			$pedido->code = $code;
			$pedido->link = $xml->paymentLink;
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
			return redirect('pagamento')->with('message', 
			'Ouve um erro na transação tente novamente, no caso de insucesso contate o suporte');
		}

	}

}
