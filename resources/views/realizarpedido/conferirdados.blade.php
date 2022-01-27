
@extends('layouts.app')

@section('content')   

<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>

    <script>

        $(document).ready(function($){

            $('#telefone').mask("(99)99999-9999");

        });

        $("#cidade2").keydown(function(){  
            $.ajax({
                type: "GET",
                url: "buscacidade",
                data: { "cidade": $("#cidade2").val() },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $("#cidades2").empty();
                    for(var i=0;i<data.length;i++)
                    {
                        console.log(data[i].cidade);
                        $("#cidades").append("<option data-id='"+data[i].idcidades+"' value='" + 
                        data[i].cidade + "'></option>");
                    }
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        $("#cidade2").on('change', function(e) {

            var g = $('#cidade2').val();
            var idcidades = $('#cidades2 option[value=' + g +']').attr('data-id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                idcidades: idcidades,
            };
            var type = "POST";
            var ajaxurl = 'cookiecidade';
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    //$('#exampleModalCenter').modal('hide');
                    //window.location.href='{{url('/')}}';
                    document.getElementById("idcidade").value = data;
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        function editardados(){
            document.getElementById("telefone").readOnly = false;
            document.getElementById("bairro").readOnly = false;
            document.getElementById("endereco").readOnly = false;
            document.getElementById("numero").readOnly = false;
            document.getElementById("complemento").readOnly = false;
            document.getElementById("cidade2").readOnly = false;
        }
    </script>

    <style>
    input:read-only {
        background-color: #fafafa;
    }
    </style>

</head>

<body>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{url('/carrinho')}}">Carrinho</a>
                        <span>Dados</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
                <br><br><br>
                    <form action="/concluirdados" class="checkout__form" method="post" >
                        @csrf
                        <h5>Dados da Entrega <a style="float: right;" onclick="editardados();" href="#">Editar Dados</a></h5>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Telefone </p>
                                        <input id="telefone" name="telefone" type="text" value="{{$dadosusuario->telefone}}" required readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Bairro </p>
                                        <input id="bairro" name="bairro" type="text" value="{{$dadosusuario->bairro}}" required readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Endereço </p>
                                        <input id="endereco" name="endereco" type="text" value="{{$dadosusuario->rua}}" required readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Numero </p>
                                        <input id="numero" name="numero" type="text" value="{{$dadosusuario->numero}}" required readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Complemento </p>
                                        <input id="complemento" name="complemento" type="text" value="{{$dadosusuario->complemento}}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                        <p>Cidade </p>
                                        <!--<input id="cidade" type="text" value="{{$dadosusuario->cidade}}" disabled>-->
                                        <div class="dropdown">
                        
                                            <input autocomplete="off" list="cidades2" style="outline: 0; border-width: 0 0 2px;" id="cidade2" value="{{$dadosusuario->cidade}}" readonly>
                                            <datalist id="cidades2"></datalist>
                                            <i class="fa fa-search" aria-hidden="true"></i>
                        
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input id="idcidade" name="idcidade" type="hidden" value="{{$dadosusuario->cidades_idcidades}}">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <button style="float: right;" class="site-btn">Continuar Pedido</button>
                                </div>
                            </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
</body>
@endsection