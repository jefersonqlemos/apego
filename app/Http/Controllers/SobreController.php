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

        $links = Storage::disk('public')->get('links.json');
        $links = json_decode($links);

        return view('admin/editarsobre')->with(compact('sobre', 'links'));
    }

    public function updateSobre(Request $request)
    {

        $data = [
            "sobre" => $request->sobre,
            "endereco" => $request->endereco,
            "telefone" => $request->telefone,
            "email" => $request->email
        ];

        Storage::disk('public')->put('sobre.json', json_encode($data));

        $data = [
            "linkfacebook" => $request->linkfacebook,
            "linktwitter" => $request->linktwitter,
            "linkyoutube" => $request->linkyoutube,
            "linkinstagram" => $request->linkinstagram
        ];

        Storage::disk('public')->put('links.json', json_encode($data));

        return redirect('admin');

    }

}
