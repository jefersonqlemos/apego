<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Illuminate\Support\Facades\Storage;

use App\Informacoesempresa;

use App\Informacoeslayout;

use App\Formasdepagamento;

use App\Pagseguro;

class SobreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //
    public function editarSobre()
    {

        /*$pagamentos = Storage::disk('public')->get('pagamentos.json');
        $pagamentos = json_decode($pagamentos);
        $pagamentos = decrypt($pagamentos->data);
        $pagamentos = json_decode($pagamentos);*/
        
        $informacoesempresa = Informacoesempresa::find(1);
        $informacoeslayout = Informacoeslayout::find(1);
        $formasdepagamento = Formasdepagamento::find(1);
        $pagseguro = Pagseguro::find(1);

        return view('admin/editarsobre')->with(compact('informacoesempresa', 'informacoeslayout', 'formasdepagamento', 'pagseguro'));
    }

    public function updateSobre(Request $request)
    {

        $informacoesEmpresa = Informacoesempresa::find(1);
        $informacoesEmpresa->sobreaempresa = $request->sobre;
        $informacoesEmpresa->endereco = $request->endereco;
        $informacoesEmpresa->telefone = $request->telefone;
        $informacoesEmpresa->email = $request->email;
        $informacoesEmpresa->save();

        $informacoesLayout = Informacoeslayout::find(1);
        $informacoesLayout->frasehome = $request->frasehome;
        $informacoesLayout->linkfacebook = $request->linkfacebook;
        $informacoesLayout->linktwitter = $request->linktwitter;
        $informacoesLayout->linkyoutube = $request->linkyoutube;
        $informacoesLayout->linkinstagram = $request->linkinstagram;
        $informacoesLayout->perfilinstagram = $request->perfilinstagram;
        $informacoesLayout->fraserodape = $request->fraserodape;
        $informacoesLayout->save();

        $formasDePagamento = Formasdepagamento::find(1);
        $formasDePagamento->pagamentonaentrega = $request->pagamentonaentrega;
        $formasDePagamento->cartaodecredito = $request->cartaodecredito;
        $formasDePagamento->boleto = $request->boleto;
        $formasDePagamento->debitoonline = $request->debitoonline;
        $formasDePagamento->save(); 

        $PagSeguro = Pagseguro::find(1);
        $PagSeguro->email = $request->emailpagseguro;
        $PagSeguro->token = encrypt($request->token);
        $PagSeguro->save();

        /*$data = [
            "pagamentonaentrega" => $request->pagamentonaentrega,
            "cartaodecredito" => $request->cartaodecredito,
            "boleto" => $request->boleto,
            "debitoonline" => $request->debitoonline
        ];

        $data = json_encode($data);
        
        $data = [
            "data" =>  encrypt($data)
        ];

        Storage::disk('public')->put('pagamentos.json', json_encode($data));*/

        return redirect('admin');

    }

}
