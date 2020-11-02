<!DOCTYPE html>
<html lang="zxx">

@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <style>
        .container{
            margin-top: 7%;
            margin-bottom: 15%;
        }
        .icon{
            margin: auto;
            margin-top: 5%;
            margin-bottom: 10%;
        }
        .link{
            margin-top: 7%;
            margin-bottom: 2%;
        }
        .status{
            margin: auto;
        }
        button{
            float:right;
        }
        
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="status" style="font-size: 20px;">
                <span><b>Status:</b> {{$status->status}}</span>
            </div>
        </div>
        <div class="row">
            <div class="icon" style="font-size: 24px;">
                <i class="fad fa-check fa-5x"></i>
                <span>Pedido Realizado com Sucesso, Número ID: <b>{{$pedido->idpedidos}}</b></span>
            </div>
        </div>
        
        @if($pedido->tipotransacao==1)
            <button onclick="window.location='/home'" class="site-btn">Ir Para Minha Conta</button>
        @elseif($pedido->tipotransacao==2)
            <div class="row">
                <div class="link" >
                    <span><a href="{{$pedido->link}}" download>CLIQUE AQUI PARA IMPRIMIR SEU BOLETO</a></span>
                </div>
            </div>
            <button onclick="window.location='/home'" class="site-btn">Ir Para Minha Conta</button>
        @elseif($pedido->tipotransacao==3)
            <button onclick="window.location='{{$pedido->link}}'" class="site-btn">Ir Para Pagina do Banco</button>
        @elseif($pedido->tipotransacao==100)
            <button onclick="window.location='/home'" class="site-btn">Ir Para Minha Conta</button>
        @endif

    </div>
    
    

</body>

@endsection

</html>