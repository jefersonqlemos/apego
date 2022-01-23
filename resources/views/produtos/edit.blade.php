<!DOCTYPE html>
<html>

@extends('admin.layouts.app')

@section('content')

<head>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href="{{ asset('Drag-Drop-File-Upload-Dialog-with-jQuery-Bootstrap/dist/bootstrap.fd.css') }}" rel="stylesheet">
    <script src="{{ asset('Drag-Drop-File-Upload-Dialog-with-jQuery-Bootstrap/dist/bootstrap.fd.js') }}"></script>

<style>

    input[type=submit]{
            background-color: #910000;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }

    .image-area {
    position: relative;
    width: 30%;
    background: #333;
    }
    .image-area img{
    max-width: 100%;
    height: auto;
    }
    .remove-image {
    display: none;
    position: absolute;
    top: -10px;
    right: -10px;
    border-radius: 10em;
    padding: 2px 6px 3px;
    text-decoration: none;
    font: 700 21px/20px sans-serif;
    background: #555;
    border: 3px solid #fff;
    color: #FFF;
    box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 2px 4px rgba(0,0,0,0.3);
    text-shadow: 0 1px 2px rgba(0,0,0,0.5);
    -webkit-transition: background 0.5s;
    transition: background 0.5s;
    }
    .remove-image:hover {
    background: #E54E4E;
    padding: 3px 7px 5px;
    top: -11px;
    right: -11px;
    }
    .remove-image:active {
    background: #E54E4E;
    top: -10px;
    right: -11px;
    }

    .buttonHolder{ text-align: center; }

    h1{
        text-align: center;
    }

</style>

<script type="text/javascript">

        $(document).ready(function($){
            $('.preco').mask("####0,00", {reverse: true});
            $(".quantidade").mask("0", {
                min: 0,
                max: 9
            });

        });
        
        
        function readURL(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                $('#filesize').text(input.files[0].size);
                reader.readAsDataURL(input.files[0]);
                reader.onload = function(e) {              
                    //$('#img').attr('src', e.target.result);
                    //document.getElementById("foto").value = e.target.result; 
                    $("#addfoto").submit();
                };
            }
        }

        $(document).ready(function() {
            $('input[type=file]').on('change', readURL);
        });

        $(document).ready(function() {
            $("input[name=genero][value=" + "{{$produto->generos_idgeneros}}" + "]").attr('checked', 'checked');
        });   

    </script> 

</head>
<body>

<br><br><br>

<div class="container">

            <form style="display: hidden" action="/produtos" method="get" id="form">
                <button type="submit" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-arrow-left"></span> Voltar
                </button>
            </form>

            <br><br><br>

            <form id="formproduto" action="/produtos/{{$produto->idprodutos}}" method="post">

                <label for="variante_tamanho">Variante de Tamanho:</label><br>
                <input disabled="disabled" class="variante_tamanho" name="variante_tamanho" required type="text" value="{{$produto->variante_tamanho}}"><br><br>

                <label for="nome">Nome:</label><br>
                <input type="text" required name="nome" value="{{$produto->nome}}"><br><br>

                <label for="marca">Marca</label><br>
                <select id="select3" required aria-required="true" name="marca" style="width:350px;">
                    @foreach($marcas as $marca)
                        @if($produto->marcas_idmarcas == $marca->idmarcas)
                            <option value="{{ $produto->marcas_idmarcas }}">{{ $marca->marca }}</option>
                        @endif
                    @endforeach 
                        <optgroup label="Marca">
                    @foreach($marcas as $marca)
                        <option value="{{$marca->idmarcas}}">{{$marca->marca}}</option>
                    @endforeach 
                    </optgroup>
                </select><br><br>

                <label for="tamanho">Tamanho</label><br>
                <select id="select2" required aria-required="true" name="tamanho" style="width:350px;">
                    @foreach($tamanhos as $tamanho)
                        @if($produto->tamanhos_idtamanhos == $tamanho->idtamanhos)
                            <option value="{{ $produto->tamanhos_idtamanhos }}">{{ $tamanho->tamanho }}</option>
                        @endif
                    @endforeach 
                        <optgroup label="Tamanho">
                    @foreach($tamanhos as $tamanho)
                        <option value="{{$tamanho->idtamanhos}}">{{$tamanho->tamanho}}</option>
                    @endforeach 
                    </optgroup>
                </select><br><br>

                <label for="quantidade">Quantidade:</label><br>
                <input class="quantidade" name="quantidade" required type="text" value="{{$produto->quantidade}}"><br><br>

                <label for="preco">Preço:</label><br>
                <input class="preco" required type="text" name="preco" value="{{$produto->preco}}"><br><br> 

                <label for="brevedescricao">Breve Descrição:</label><br>
                <textarea name="brevedescricao" required rows="5" cols="80">{{$produto->brevedescricao}}</textarea><br><br>

                <label for="descricaodetalhada">Descrição Detalhada:</label><br>
                <textarea name="descricaodetalhada" required rows="10" cols="80">{{$produto->descricaodetalhada}}</textarea>

                <br><br>
                
                <label for="genero">Genero:</label><br>

                <input type="radio" id="1" name="genero" value="1">
                <label for="male">Masculino</label><br>
                <input type="radio" id="2" name="genero" value="2">
                <label for="female">Feminino</label><br>
                <input type="radio" id="3" name="genero" value="3">
                <label for="female">Qualquer Gênero</label><br>
                <input type="radio" id="4" name="genero" value="4">
                <label for="female">Infantil</label><br><br>
                
                <label for="categoria">Categoria</label><br>
                <select id="select1" required aria-required="true" name="categoria" style="width:350px;">
                    @foreach($categorias as $categoria)
                        @if($produto->categorias_idcategorias == $categoria->idcategorias)
                            <option value="{{ $produto->categorias_idcategorias }}">{{ $categoria->nome }}</option>
                        @endif
                    @endforeach 
                        <optgroup label="Categoria">
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->idcategorias}}">{{$categoria->nome}}</option>
                    @endforeach 
                    </optgroup>
                </select>
                <br><br><hr>
                @method('put')
                @csrf    
                
            </form>

            @if($produto->idprodutos == $produto->variante_tamanho)

                <h1>Fotos do Produto</h1>

                <form id="addfoto" action="/fotos/{{$produto->idprodutos}}" method="post" enctype="multipart/form-data">
                    <b>Adicionar Fotos</b><br>
                    <input id="foto" type="file" name="foto" accept="image/jpeg" /><br/>
                    @method('put')
                    @csrf
                </form>

                <br><h4><b>Para Excluir Clique No "X"</b></h4><br>



                @foreach($fotos as $foto)

                    @if ($loop->first) 
                        <input form="addfoto" type="hidden" name="fotoproduto" value="{{$foto->fotos}}">
                    @endif
                    <form action="/fotos/{{$foto->idfotos}}" method="post">
                        <div class="image-area">
                        <img src="{{$foto->fotos}}"  alt="Preview">
                        <button class="remove-image" type="submit" style="display: inline;">&#215;</button>
                        @method('delete')
                        @csrf
                        </div>
                    </form>
                    <br>
                

                @endforeach 

            @else
                <h1>Fotos de variantes, não é possivel cadastrar/modificar</h1>
            @endif

        <hr>
        <div class="buttonHolder">
            <input form="formproduto" type="submit" value="Salvar">
        </div>
        

</div>

<br><br><br><br><br><br>

</body>

@endsection

</html>


