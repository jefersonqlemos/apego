<!DOCTYPE html>
<html>
    
@extends('admin.layouts.app')

@section('content')
<head>
<title>Apego</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        }

        .switch input { 
        opacity: 0;
        width: 0;
        height: 0;
        }

        .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2196F3;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
    </style>

</head> 

<body>
        <div class="container">
            <br>
            
            <h1>Dados da Empresa</h1>

            <br>
            <form action="{{url('/updatesobre')}}" method="post">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input name="endereco" type="text" class="form-control" id="endereco" value="{{$informacoesempresa->endereco}}">
                </div>
                
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input name="telefone" type="text" class="form-control" id="telefone" value="{{$informacoesempresa->telefone}}">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{$informacoesempresa->email}}">
                </div>

                <div class="form-group">
                    <label for="linkfacebook">Link Facebook</label>
                    <input name="linkfacebook" type="text" class="form-control" id="linkfacebook" value="{{$informacoeslayout->linkfacebook}}">
                </div>
                
                <div class="form-group">
                    <label for="linktwitter">Link Twitter</label>
                    <input name="linktwitter" type="text" class="form-control" id="linktwitter" value="{{$informacoeslayout->linktwitter}}">
                </div>

                <div class="form-group">
                    <label for="linkyoutube">Link YouTube</label>
                    <input name="linkyoutube" type="text" class="form-control" id="linkyoutube" value="{{$informacoeslayout->linkyoutube}}">
                </div>

                <div class="form-group">
                    <label for="linkinstagram">Link Instagram</label>
                    <input name="linkinstagram" type="text" class="form-control" id="linkinstagram" value="{{$informacoeslayout->linkinstagram}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea2">Frase Da Pagina Inicial</label>
                    <textarea name="frasehome" class="form-control" id="exampleFormControlTextarea2" rows="5">{{$informacoeslayout->frasehome}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Sobre a Empresa</label>
                    <textarea name="sobre" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$informacoesempresa->sobreaempresa}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea3">Frase Rodapé</label>
                    <textarea name="fraserodape" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$informacoesempresa->fraserodape}}</textarea>
                </div>

                <div class="form-group">
                    <label for="emailpagseguro">Email no Pagseguro</label>
                    <input name="emailpagseguro" type="text" class="form-control" id="emailpagseguro" value="{{$pagseguro->email}}">
                </div>

                <div class="form-group">
                    <label for="token">Token do Pagseguro</label>
                    <input name="token" type="text" class="form-control" id="token" value="{{decrypt($pagseguro->token)}}">
                </div>

                <br>
                <h4>Quais Formas de Pagamento Ativar</h4>
                <br>
                
                <input type="hidden" value="0" name="pagamentonaentrega">
                <label class="switch">
                    @if($formasdepagamento->pagamentonaentrega>0)
                        <input name="pagamentonaentrega" type="checkbox" value="1" checked>
                    @else
                        <input name="pagamentonaentrega" type="checkbox" value="1">
                    @endif
                    <span class="slider round"></span>
                </label>
                
                Pagamento na Entrega
                <br>
                
                <input type="hidden" value="0" name="cartaodecredito">
                <label class="switch">
                    @if($formasdepagamento->cartaodecredito>0)
                        <input name="cartaodecredito" type="checkbox" value="1" checked>
                    @else
                        <input name="cartaodecredito" type="checkbox" value="1">
                    @endif
                    <span class="slider round"></span>
                </label>
                Cartão de Crédito
                <br>

                <input type="hidden" value="0" name="boleto">              
                <label class="switch">
                    @if($formasdepagamento->boleto>0)
                        <input name="boleto" type="checkbox" value="1" checked>
                    @else
                        <input name="boleto" type="checkbox" value="1">
                    @endif
                    <span class="slider round"></span>
                </label>
                Boleto
                <br>

                <input type="hidden" value="0" name="debitoonline">   
                <label class="switch">
                    @if($formasdepagamento->debitoonline>0)
                        <input name="debitoonline" type="checkbox" value="1" checked>
                    @else
                        <input name="debitoonline" type="checkbox" value="1">
                    @endif
                    <span class="slider round"></span>
                </label> 
                Debito Online
                <br>
                <br>
                <br>

                <button type="submit" class="btn btn-primary">Salvar Dados</button>
                @csrf
            </form>
            <br>
            <br>
        </div>
    </body>

    @endsection

</html> 