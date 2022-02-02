<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\Dadosusuario;

use App\Pedido;

use App\Comprado;

use App\Produto;

use App\Cidade;

use App\Statu;

use App\Avaliacao;

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
    ->where('comprados.pedidos_idpedidos', $id)->join('tamanhos', 'produtos.tamanhos_idtamanhos', '=', 'tamanhos.idtamanhos')->get();
        
        $idusers = Auth::id();
        $pedido = Pedido::find($id);
        $status = Statu::find($pedido->status_idstatus);
        
        return view('listapedido')->with(compact('produtos', 'pedido', 'status'));
    }

    public function avaliacao(Request $request, $id)
    {
        $iduser = Auth::id();

        $avaliacao = new Avaliacao;
        $avaliacao->users_idusers = $iduser;
        $avaliacao->produtos_idprodutos = $id;
        $avaliacao->avaliacao = $request->rating;
        $avaliacao->save();

        $comprado = Comprado::find($request->idcomprados);
        $comprado->avaliacao_cliente = $request->rating;
        $comprado->save(); 

        $produto = Produto::find($id);

        if($produto->avaliacao != null){
            $produto->avaliacao_total = $produto->avaliacao_total + $request->rating;
            $numeros_avaliacao = Avaliacao::where("produtos_idprodutos", $id)->count();
            $avaliacao = $produto->avaliacao_total/$numeros_avaliacao;
            $avaliacao = round($avaliacao);
            $produto->avaliacao = $avaliacao;
        }else{
            $produto->avaliacao = $request->rating;
            $produto->avaliacao_total = $request->rating;
        }

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
        $cidade = Cidade::where('cidade', $request->cidade)->first();

        if($cidade!=null){
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
            $dadosusuario->cidade = $cidade->cidade;
            $dadosusuario->cidades_idcidades = $cidade->idcidades;
            $dadosusuario->save();

            return redirect()->back()->with('message', 'Os dados foram atualizados com sucesso');
        }else{
            return redirect()->back()->with('message', 'A cidade digitada esta incorreta ou não está contida em nossos registros');
        }

        
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

            $id = Auth::id();
            $dadosusuario = Dadosusuario::find($id);
            $dadosusuario->email = $request['email'];
            $dadosusuario->save();

            return back()->with('message','Email Atualizado com Sucesso');
        }else{

            return back()->with('message','Senha incorreta, tente novamente');
        }
    }

}
