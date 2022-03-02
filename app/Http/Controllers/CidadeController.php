<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cidade;

class CidadeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //
    public function adicionarCidade()
    {
        return view('admin.adicionarcidade');
    }
    
    public function storeCidade(Request $request)
    {
        $cidade = new Cidade;
        $cidade->cidade = $request->cidade;
        $cidade->endereco = $request->endereco;
        $cidade->save();

        return redirect('admin');
    }
}
