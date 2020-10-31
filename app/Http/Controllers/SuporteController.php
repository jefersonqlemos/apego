<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Suporte;

use App\Mail\RespostaSuporte;

use Illuminate\Support\Facades\Mail;

class SuporteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function listaSuporte()
    {
        //
        $suportes = Suporte::orderBy('idsuportes', 'desc')->simplePaginate(10);
        return view('admin/listasuporte')->with('suportes', $suportes);
    }

    public function mensagemSuporte($id)
    {
        //
        $suporte = Suporte::find($id);
        return view('admin/mensagemsuporte')->with('suporte', $suporte);
    }

    public function resposta(Request $request, $id)
    {
        //

        //dd($id);
        $suporte = Suporte::find($id);
        $suporte->status = 1;
        $suporte->resposta = $request->resposta;
        $suporte->save();

        Mail::to($suporte->email)
            ->send(new RespostaSuporte($suporte));

        return redirect("listasuporte");
        //return view('admin/mensagemsuporte')->with('suporte', $suporte);
    }
}
