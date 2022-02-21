
@extends('admin.layouts.app')

@section('content')

<head>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">    
<style>
    /* Style buttons */
        .btn {
            background-color: DodgerBlue; /* Blue background */
            border: none; /* Remove borders */
            color: white; /* White text */
            padding: 12px 16px; /* Some padding */
            font-size: 16px; /* Set a font size */
            cursor: pointer; /* Mouse pointer on hover */
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* Darker background on mouse-over */
        .btn:hover {
            background-color: RoyalBlue;
        }
        
        .w3-allerta {
            font-family: "Allerta Stencil", Sans-serif;
            margin-bottom: 30px;
        }

        #lblCartCount {
            padding-left: 9px;
            padding-right: 9px;
            -webkit-border-radius: 9px;
            -moz-border-radius: 9px;
            border-radius: 9px;
            font-size: 12px;
            background: #ff0000;
            color: #fff;
            padding: 0 5px;
            vertical-align: top;
            margin-left: -5px; 
        }
    </style>
    </head>
<body>
    <div class="w3-container w3-black w3-center w3-allerta">
    <p class="w3-xxlarge">Apego</p>
    </div>
    <button class="btn" onclick="window.location.href='/produtos'"><i class="fa fa-box"></i> Produtos</button>
    <hr>
    <button class="btn" onclick="window.location.href='/pedidos'"><i class="fa fa-clipboard-list"></i> Pedidos</button>
    <hr>
    
    @if($idadmin == 1)
        <button class="btn" onclick="window.location.href='/editarsobre'"><i class="fa fa-user-edit"></i> Editar Dados da Loja</button>
        <hr>
        <button class="btn" onclick="window.location.href='/listasuporte'"><i style="font-size:24px" class="fa fa-headset"></i><span id='lblCartCount'>{{$count}}</span> Atender Suporte</button>
        <hr>
        <button class="btn" onclick="window.location.href='https://webmail1.hostinger.com.br/'"><i style="font-size:24px" class="fa fa-envelope"></i> Ir ao E-mail da Empresa</button>
        <hr>
    @endif

    <button class="btn" onclick="window.open('/', '_blank')"><i class="fa fa-home"></i> Ir ao Site de Vendas</button>
        

<body>

@endsection