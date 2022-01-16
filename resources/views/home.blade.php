<!DOCTYPE html>
<html lang="zxx">

@extends('layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

    <style>

        .listaproduto{
            background-color: darkred; /* red background */
            border: 1px solid #ca1515; /* red border */
            color: white; /* White text */
            padding: 10px 24px; /* Some padding */
            cursor: pointer; /* Pointer/hand icon */
            width: 100%; /* Set a width if needed */
            display: block; /* Make the buttons appear below each other */
        }

        .listaproduto:not(:last-child) {
            border-bottom: none; /* Prevent double borders */
        }

        /* Add a background color on hover */
        .listaproduto:hover {
            background-color: #ca1515;
        }

        .btn span{
            font-size: 20px;
            float:right;
            font-weight: bolder;
        }

        .btn i{
            font-size: 30px;
            float:left;
        }

        /* Darker background on mouse-over */
        .btn:hover {
            color: white;
            background-color: darkred;
        }

        #inicio{
            display: block;
        }

        #dadosconta{
            display: none;
        }

        #meuspedidos{
            display: none;
            margin-bottom: 200px;
        }

        #comprados{
            display: none;
        }
        
         /* Mobile Styles */
         @media only screen and (max-width: 1000px) {

            .btn {
                background-color: #ca1515;
                border: none;
                width: 200%;
                color: white;
                padding: 20px 30px;
                cursor: pointer;
                display: block;
            }

            .mobile-container{
                display: block;
            }
            .desktop-container{
                display: none; 
            }
        }

        /* Desktop Styles */
        @media only screen and (min-width: 1001px) {

            .btn {
                background-color: #ca1515;
                border: none;
                width: 100%;
                color: white;
                padding: 20px 30px;
                cursor: pointer;
                display: block;
            }

            .mobile-container{
                display: none;
            }
            .desktop-container{
                display: block; 
            }    
        }





        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
        position: relative;
        background-color: #fefefe;
        margin: auto;
        padding: 0;
        border: 1px solid #888;
        width: 80%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0} 
        to {top:0; opacity:1}
        }

        @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
        }

        .modal-header {
        padding: 2px 16px;
        background-color: #ca1515;
        color: white;
        }

        .modal-body {padding: 2px 16px;}


    </style>

    <script>

        document.getElementById("liconta").className = "active";

            $(document).ready(function($){

                $('#telefone').mask("(99)99999-9999");
                $('#cpf').mask("999.999.999-99");

                $('#buscapedidosdesktop').click(function(){
                    $("#inicio").hide();
                    $("#dadosconta").hide();
                    $("#meuspedidos").show();
                    $("#comprados").hide();
                    $.ajax({
                        url: "{{URL::to('meuspedidos')}}",
                        type: 'GET',
                        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        
                        success: function(data){
                            $("#meuspedidos").html("<br><div class=\"checkout__form\"><h5>Lista de Pedidos</h5></div>");
                            for(var i=0;i<Object.keys(data).length;i++){
                                //console.log(data[i].idpedidos);
                                $("#meuspedidos").append("<br><form action=\"{{url('comprados')}}/"+data[i].idpedidos+"\" method=\"get\"><button class=\"listaproduto\" type=\"submit\">Pedido ID: <b>"+data[i].idpedidos+"</b>&nbsp &nbsp Data: "+data[i].created_at.substring(0, 10)+"&nbsp &nbsp <i class=\"far fa-hand-pointer\"></i></button></form>");
                            }
                        }
                    });
                });

                $('#buscapedidosmobile').click(function(){
                    $("#inicio").hide();
                    $("#dadosconta").hide();
                    $("#meuspedidos").show();
                    $("#comprados").hide();
                    $.ajax({
                        url: "{{URL::to('meuspedidos')}}",
                        type: 'GET',
                        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        
                        success: function(data){
                            $("#meuspedidos").html("<br><div class=\"checkout__form\"><h5>Lista de Pedidos</h5></div>");
                            for(var i=0;i<Object.keys(data).length;i++){
                                //console.log(data[i].idpedidos);
                                $("#meuspedidos").append("<br><form action=\"{{url('comprados')}}/"+data[i].idpedidos+"\" method=\"get\"><button class=\"listaproduto\" type=\"submit\">Pedido ID: <b>"+data[i].idpedidos+"</b>&nbsp &nbsp Data: "+data[i].created_at.substring(0, 10)+"&nbsp &nbsp <i class=\"far fa-hand-pointer\"></i></button></form>");
                            }
                        }
                    });
                });

                $('#meusdadosdesktop').click(function(){
                    $("#inicio").hide();
                    $("#dadosconta").show();
                    $("#meuspedidos").hide();
                    $("#comprados").hide();
                    
                    $.ajax({
                        url: "{{URL::to('editarconta/')}}",
                        type: 'GET',
                        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        
                        success: function(data){
                            $("#nome").val(data.nome);
                            $("#sobrenome").val(data.sobrenome);
                            $("#cpf").val(data.cpf);
                            $("#datadenascimento").val(data.datadenascimento);
                            $("#telefone").val(data.telefone);
                            $("#bairro").val(data.bairro);
                            $("#endereco").val(data.rua);
                            $("#numero").val(data.numero);
                            $("#complemento").val(data.complemento);
                            $("#cidade").val(data.cidade);
                            //console.log(data.iddadosusuarios);
                        }
                    });

                });

                $('#meusdadosmobile').click(function(){
                    $("#inicio").hide();
                    $("#dadosconta").show();
                    $("#meuspedidos").hide();
                    $("#comprados").hide();
                    
                    $.ajax({
                        url: "{{URL::to('editarconta/')}}",
                        type: 'GET',
                        // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                        
                        success: function(data){
                            $("#nome").val(data.nome);
                            $("#sobrenome").val(data.sobrenome);
                            $("#cpf").val(data.cpf);
                            $("#datadenascimento").val(data.datadenascimento);
                            $("#telefone").val(data.telefone);
                            $("#bairro").val(data.bairro);
                            $("#endereco").val(data.rua);
                            $("#numero").val(data.numero);
                            $("#complemento").val(data.complemento);
                            $("#cidade").val(data.cidade);
                            //console.log(data.iddadosusuarios);
                        }
                    });

                });

                $('#iniciodesktop').click(function(){
                    $("#inicio").show();
                    $("#dadosconta").hide();
                    $("#meuspedidos").hide();
                    $("#comprados").hide();
                    
                });

                $('#iniciomobile').click(function(){
                    $("#inicio").show();
                    $("#dadosconta").hide();
                    $("#meuspedidos").hide();
                    $("#comprados").hide();
                    
                });


                var modal = document.getElementById("myModal");

                // Get the button that opens the modal
                var btn = document.getElementById("myBtn");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks the button, open the modal 
                btn.onclick = function() {
                modal.style.display = "block";
                }

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
                }

            }); 
            
            

    </script>

</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @if(session()->has('message'))
        <script>
            alert("{{ session()->get('message') }}");
        </script>
    @endif

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Conta</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-4">
                <div class="mobile-container">
                    <button id="iniciomobile" class="btn">
                        <i class="fas fa-desktop"></i> <span>Conta</span>
                    </button>
                    <br>
                    <button id="meusdadosmobile" class="btn">
                        <i class="fas fa-user-edit"></i> <span>Dados</span>
                    </button>
                    <br>
                    <button id="buscapedidosmobile" class="btn">
                        <i class="fas fa-clipboard-check"></i> <span>Pedidos</span>
                    </button>
                    <br>
                    <button onclick="window.location.href='/sobre'" class="btn">
                        <i class="fas fa-headset"></i> <span>Suporte</span>
                    </button>
                </div>
                <div class="desktop-container">
                    <button id="iniciodesktop" class="btn">
                        <i class="fas fa-desktop"></i> <span> Inicio/Login</span>
                    </button>
                    <br>
                    <button id="meusdadosdesktop" class="btn">
                        <i class="fas fa-user-edit"></i> <span> Meus Dados</span>
                    </button>
                    <br>
                    <button id="buscapedidosdesktop" class="btn">
                        <i class="fas fa-clipboard-check"></i> <span> Meus Pedidos</span>
                    </button>
                    <br>
                    <button onclick="window.location.href='/sobre'" class="btn">
                        <i class="fas fa-headset"></i> <span> Suporte</span>
                    </button>
                </div>  
            </div>
            <div class="col-12 col-md-8">
                <div id="meuspedidos">
                    
                </div>
                <div id="dadosconta">
                    <br>
                    <form action="{{url('/atualizardadosusuario')}}" class="checkout__form" method="post">
                        @csrf
                        <h5>Dados da Conta</h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Primeiro Nome <span>*</span></p>
                                        <input id="nome" name="nome" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Sobre Nome <span>*</span></p>
                                        <input id="sobrenome" name="sobrenome" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__form__input">
                                        <p>CPF <span>*</span></p>
                                        <input id="cpf" name="cpf" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Data de Nascimento <span>*</span></p>
                                        <input id="datadenascimento" name="datadenascimento" type="date" max="2025-12-31" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Telefone <span>*</span></p>
                                        <input id="telefone" name="telefone" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__form__input">
                                        <p>Bairro <span>*</span></p>
                                        <input id="bairro" name="bairro" type="text" required>
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Endereço <span>*</span></p>
                                        <input id="endereco" name="endereco" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Numero <span>*</span></p>
                                        <input id="numero" name="numero" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Complemento <span></span></p>
                                        <input id="complemento" name="complemento" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__form__input">
                                        <p>Cidade <span>*</span></p>
                                        <input id="cidade" type="text" disabled>
                                    </div>
                                </div>
                            </div>
                            <br>
                        <button type="submit" class="site-btn">Atualizar</button>
                    </form>
                </div>
                <div id="inicio">
                <br>
                     <form class="checkout__form">   
                        <h5>Dados de Login</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>E-Mail Atual</p>
                                    <input id="emailatual" name="emailatual" type="email" value="{{$email}}" disabled>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        

                    </form>
                    
                    
                    <form action="/password/reset" class="checkout__form">
                        <h5>Editar Login</h5>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <button type="submit" class="site-btn">Redefinir Minha Senha</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <button id="myBtn" style="margin-top:25px;" type="submit" class="site-btn">Trocar E-Mail</button>             

                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span class="close">&times;</span>
                                </div>
                                <div class="modal-body">
                                    <br><br>
                                            <form method="post" action="{{url('trocaremail')}}" class="checkout__form">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="checkout__form__input">
                                                            <p>Senha Atual</p>
                                                            <input id="senha" name="senha" type="password" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <div class="checkout__form__input">
                                                            <p>Novo E-Mail</p>
                                                            <input id="novoemail" name="email" type="email" required >
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="checkout__form__input">
                                                            <button style="margin-top:20px;margin-bottom:50px;float:right" type="submit" class="site-btn">Atualizar Email</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <br><br><br><br><br><br><br><br><br><br><br><br><br>

    
</body>

@endsection

</html>