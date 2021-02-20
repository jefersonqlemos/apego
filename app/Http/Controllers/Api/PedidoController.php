<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Pedido;

use App\Produto;

use App\Comprados;

use App\Statu;

use App\Dadosusuario;

class PedidoController extends Controller
{
    //
    public function index()
    {
        //
        $pedidos = Pedido::join('dadosusuarios', 'pedidos.users_id', '=', 'dadosusuarios.iddadosusuarios')->join('status', 'pedidos.status_idstatus', '=', 'status.idstatus')->orderBy('idpedidos', 'desc')->paginate(10);
        //dd($produtos);
        return response()->json($pedidos, 200);
    }

    public function searchPedidos(Request $request)
    {
        $pedidos = Pedido::join('dadosusuarios', 'pedidos.users_id', '=', 'dadosusuarios.iddadosusuarios')->join('status', 'pedidos.status_idstatus', '=', 'status.idstatus')->where('idpedidos', $request->search)->paginate(1);
        //$orders->searchable();
        //dd($produtos);
        return response()->json($pedidos, 200);
    }
}
