<!DOCTYPE html>
<html>

@extends('admin.layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    @if (session('message'))  
        <script>
            alert("{{ session('message') }}");
        </script>      
    @endif

    <div class="container">
        <div class="row">

            <br>

            <form style="display: hidden" action="/pedidos" method="get" id="form">
                <button type="submit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-arrow-left"></span> Voltar
                </button>
            </form>

            <br><br><br><br>

            <h4>INFORMAÇÕES DO PEDIDO</h4>
            <table class="table table-bordered table-dark">  
                    <tbody>
                        <tr>
                            <td>ID do Pedido: <b>{{$pedido->idpedidos}}</b></td>
                            <td>Quantidade de itens: {{$pedido->numeroitens}}</td>
                            <td>ID Tipo Transação: {{$pedido->tipotransacao}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">link se for boleto ou debito online: <a href="{{$pedido->link}}">{{$pedido->link}}</a></td>
                            <td>Numero de Parcelas: {{$pedido->numeroparcelas}}</td>
                        </tr>
                        <tr>
                            <td>Valor Total: {{$pedido->valortotal}}</td>
                            <td>Valor Recebido: {{$pedido->valorrecebido}}</td>
                            <td>Taxa Pagseguro: {{$pedido->taxapagseguro}}</td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">Status: <b>{{$status->status}}</b></td>
                            <td>Data do Pedido: {{$pedido->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h4>DADOS DO CLIENTE</h4>
                <table class="table table-bordered table-dark">
                    <tbody>
                        <tr>
                            <td>Nome do cliente: {{$dadosusuario->nome}}</td>
                            <td>Sobrenome do cliente: {{$dadosusuario->sobrenome}}</td>
                            <td>Cidade: {{$dadosusuario->cidade}}</td>
                        </tr>
                        <tr>
                            <td>Bairro: {{$dadosusuario->bairro}}</td>
                            <td>Rua: {{$dadosusuario->rua}}</td>
                            <td>Numero: {{$dadosusuario->numero}}</td>
                        </tr>
                        <tr>
                            <td>Complemento: {{$dadosusuario->complemento}}</td>
                            <td>Telefone: {{$dadosusuario->telefone}}</td>
                            <td>CPF: {{$dadosusuario->cpf}}</td>
                        </tr>
                        <tr>
                            <td>E-mail: {{$dadosusuario->email}}</td>
                        </tr>
                    </tbody>
                </table>

                <br><br><br>

            <table class="table">

                <tr align=center style="font-size:20px;" height="30px">
                    <td style="vertical-align:middle; color:#fafafa" bgcolor="#262626">ID</td>
                    <td style="vertical-align:middle; color:#fafafa" bgcolor="#262626"></td>
                    <td style="vertical-align:middle; color:#fafafa" bgcolor="gray">Produto</td>
                    <td style="vertical-align:middle; color:#fafafa" bgcolor="#262626">Quantidade</td>
                    <td style="vertical-align:middle; color:#fafafa" bgcolor="gray">Tamanho</td>
                    <td style="vertical-align:middle; color:#fafafa" bgcolor="#262626">Valor</td>   
                </tr>

                @foreach($produtos as $produto)

                    <tr align=center height="30px" >
                        <td style="vertical-align:middle;" >
                            <h4>{{ $produto->idprodutos }}<h4>
                        </td>
                        <td style="vertical-align:middle" bgcolor="gray">
                            <img src="{{$produto->foto}}" height="100" width="100"/><br>          
                        </td>
                        <td style="vertical-align:middle;" >
                            <h3><a target="_blank" href="{{url('produtos').'/'.$produto->idprodutos}}">{{ $produto->nome }} {{ $produto->marca }}</a><h3>
                        </td>
                        <td style="vertical-align:middle;" >
                            <h4>{{ $produto->quantidade }}<h4>
                        </td>
                        <td style="vertical-align:middle;" >
                            <h4>{{ $produto->tamanho }}<h4>
                        </td>
                        <td style="vertical-align:middle; color:darkred" >
                            <h4><b>R$ {{ $produto->preco }}</b><h4>
                        </td>
                    </tr>
                @endforeach                

            </table>

            <br><br><br>
            <form>
                <input style="align:center;" type="button" value="Imprimir Pedido" onClick="window.print()"/>
            </form>
            <br><br><br>

            @if($status->idstatus == 3 || $status->idstatus == 100 || $status->idstatus == 8 || $status->idstatus == 102)

                <form action="{{url('pedidos').'/'.$pedido->idpedidos}}" method="post"> 
                    @csrf
                    @method('put')
                    <span style="float:left">Se a venda foi cancelada clique:
                        <input type="submit" value="Pedido Cancelado"></input>
                    </span>
                    <input type="hidden" name="idstatus" value="104">
                </form>

                <form action="{{url('pedidos').'/'.$pedido->idpedidos}}" method="post"> 
                    @csrf
                    @method('put')
                    <span style="float:right">Se o pedido saiu para entrega e deseja atualizar status clique: 
                        <input type="submit" value="Pedido Saiu Para Entrega"></input>
                    </span>
                    <input type="hidden" name="idstatus" value="101">
                </form>
            
            @elseif($status->idstatus == 101)
                <form action="{{url('pedidos').'/'.$pedido->idpedidos}}" method="post"> 
                    @csrf
                    @method('put')
                    <span style="float:left">Se a venda foi cancelada clique: 
                        <input type="submit" value="Pedido Cancelado"></input>
                    </span>
                    <input type="hidden" name="idstatus" value="104">
                </form>

                <form action="{{url('pedidos').'/'.$pedido->idpedidos}}" method="post"> 
                    @csrf
                    @method('put')
                    <span style="float:right">Se não foi possivel realizar a entrega clique: 
                        <input type="submit" value="Não foi Possível Concluir a Entrega, Uma Nova Tentativa Será Feita"></input>
                    </span>
                    <input type="hidden" name="idstatus" value="102">
                </form>

                </br>
                </br>

                <form action="{{url('pedidos').'/'.$pedido->idpedidos}}" method="post"> 
                    @csrf
                    @method('put')
                    <span style="float:right">Se o pedido foi entregue ao cliente clique: 
                        <input type="submit" value="Pedido Entregue"></input>
                    </span>
                    <input type="hidden" name="idstatus" value="103">
                </form>
            @endif

            
        </div>
    </div>

    <br><br><br><br><br><br><br>
</body>

@endsection

</html>