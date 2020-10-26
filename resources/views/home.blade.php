@extends('layouts.app')

@section('content')

<html>

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

    <style>
        .btn {
            background-color: #ca1515;
            border: none;
            width: 100%;
            color: white;
            padding: 20px 30px;
            cursor: pointer;
            display: block;
        }

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
            .mobile-container{
                display: block;
            }
            .desktop-container{
                display: none; 
            }
        }

        /* Desktop Styles */
        @media only screen and (min-width: 1001px) {
            .mobile-container{
                display: none;
            }
            .desktop-container{
                display: block; 
            }    
        }
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
                                $("#meuspedidos").append("<br><form action=\"{{url('comprados')}}/"+data[i].idpedidos+"\" method=\"get\"><button class=\"listaproduto\" type=\"submit\">Pedido ID: <b>"+data[i].idpedidos+"</b>&nbsp &nbsp Data: "+data[i].created_at+"</button></form>");
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
                                $("#meuspedidos").append("<br><form action=\"{{url('comprados')}}/"+data[i].idpedidos+"\" method=\"get\"><button class=\"listaproduto\" type=\"submit\">Pedido ID: <b>"+data[i].idpedidos+"</b>&nbsp &nbsp Data: "+data[i].created_at+"</button></form>");
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
                        <i class="fas fa-desktop"></i> <span></span>
                    </button>
                    <br>
                    <button id="meusdadosmobile" class="btn">
                        <i class="fas fa-user-edit"></i> <span></span>
                    </button>
                    <br>
                    <button id="buscapedidosmobile" class="btn">
                        <i class="fas fa-clipboard-check"></i> <span></span>
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
                </div>  
            </div>
            <div class="col-12 col-md-8">
                <div id="meuspedidos">
                    
                </div>
                <div id="dadosconta">
                    <br>
                    <form action="/atualizardadosusuario" class="checkout__form" method="post">
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
                     <form action="/trocaremail" class="checkout__form">
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
                        <h5>Editar Login</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Novo E-Mail</p>
                                    <input id="novoemail" name="novoemail" type="email" required >
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <button style="margin-top:35px" type="submit" class="site-btn">Trocar E-Mail</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <form action="/trocarsenha" class="checkout__form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Senha Atual</p>
                                    <input id="senhaatual" name="senhaatual" type="password" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Nova Senha</p>
                                    <input id="senhanova" name="senhanova" type="password" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <button style="float:right" type="submit" class="site-btn">Trocar Senha</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
</body>

</html>

@endsection
