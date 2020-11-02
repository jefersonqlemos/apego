<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Dadosusuario;

use App\Pedido;

use App\Comprado;

use App\Produto;

use App\Statu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $email = Auth::user()->email;
        return view('home')->with('email', $email);
    }

    public function meusPedidos()
    {
        $id = Auth::id();
        $data = Pedido::orderBy('idpedidos', 'desc')->where('users_id', $id)->get();
        return response()->json($data);
    }

    public function comprados($id)
    {
        $produtos = Produto::join('comprados', 'produtos.idprodutos', '=', 'comprados.produtos_idprodutos')
    ->where('comprados.pedidos_idpedidos', $id)->get();
        $pedido = Pedido::find($id);
        $status = Statu::find($pedido->status_idstatus);
        
        return view('listapedido')->with(compact('produtos', 'pedido', 'status'));
    }

    public function avaliacao(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->avaliacao = $request->rating;
        $produto->save();
        return redirect('comprados/'.$request->idpedidos);
    }

    public function editarConta()
    {
        $id = Auth::id();
        $data = Dadosusuario::find($id);
        return response()->json($data);
    }

    public function updateUsuario(Request $request)
    {
        $id = Auth::id();
        $dadosusuario = Dadosusuario::find($id);
        $dadosusuario->nome = $request->nome;
        $dadosusuario->sobrenome = $request->sobrenome;
        $dadosusuario->cpf = $request->cpf;
        $dadosusuario->datadenascimento = $request->datadenascimento;
        $dadosusuario->telefone = $request->telefone;
        $dadosusuario->bairro = $request->bairro;
        $dadosusuario->rua = $request->endereco;
        $dadosusuario->numero = $request->numero;
        $dadosusuario->complemento = $request->complemento;
        $dadosusuario->save();

        return redirect()->back()->with('message', 'Os Dados foram Atualizados');
    }

    public function trocarEmail(Request $request){
        //validation rules

        $request->validate([
            'email'=>'required|email|string|max:255'
        ]);

        if (Hash::check($request->senha, Auth::user()->password)) {
            $user = Auth::user();
            $user->email = $request['email'];
            $user->save();

            return back()->with('message','Email Atualizado com Sucesso');
        }else{

            return back()->with('message','Senha incorreta, tente novamente');
        }
    }

}
