<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class SobreController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //
    public function editarSobre()
    {

        $sobre = Storage::disk('public')->get('sobre.json');
        $sobre = json_decode($sobre);
        $sobre = decrypt($sobre->data);
        $sobre = json_decode($sobre);

        $links = Storage::disk('public')->get('links.json');
        $links = json_decode($links);
        $links = decrypt($links->data);
        $links = json_decode($links);

        $importante = Storage::disk('public')->get('importante.json');
        $importante = json_decode($importante);
        $importante = decrypt($importante->data);
        $importante = json_decode($importante);

        $pagamentos = Storage::disk('public')->get('pagamentos.json');
        $pagamentos = json_decode($pagamentos);
        $pagamentos = decrypt($pagamentos->data);
        $pagamentos = json_decode($pagamentos);

        return view('admin/editarsobre')->with(compact('sobre', 'links', 'importante', 'pagamentos'));
    }

    public function updateSobre(Request $request)
    {

        $data = [
            "sobre" => $request->sobre,
            "endereco" => $request->endereco,
            "telefone" => $request->telefone,
            "email" => $request->email
        ];

        $data = json_encode($data);

        $data = [
            "data" =>  encrypt($data)
        ];

        Storage::disk('public')->put('sobre.json', json_encode($data));

        $data = [
            "linkfacebook" => $request->linkfacebook,
            "linktwitter" => $request->linktwitter,
            "linkyoutube" => $request->linkyoutube,
            "linkinstagram" => $request->linkinstagram
        ];

        $data = json_encode($data);
        
        $data = [
            "data" =>  encrypt($data)
        ];

        Storage::disk('public')->put('links.json', json_encode($data));

        $data = [
            "email_pagseguro" => $request->emailpagseguro,
            "token" => $request->token
        ];

        $data = json_encode($data);
        
        $data = [
            "data" =>  encrypt($data)
        ];

        Storage::disk('public')->put('importante.json', json_encode($data));

        $data = [
            "pagamentonaentrega" => $request->pagamentonaentrega,
            "cartaodecredito" => $request->cartaodecredito,
            "boleto" => $request->boleto,
            "debitoonline" => $request->debitoonline
        ];

        $data = json_encode($data);
        
        $data = [
            "data" =>  encrypt($data)
        ];

        Storage::disk('public')->put('pagamentos.json', json_encode($data));

        return redirect('admin');

    }

}
