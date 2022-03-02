<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Marca;

class MarcaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //
    
    public function adicionarMarca()
    {
        return view('admin.adicionarmarca');
    }
    
    public function storeMarca(Request $request)
    {
        $marca = new Marca;
        $marca->marca = $request->marca;
        $marca->save();

        return redirect('admin');
    }
}
