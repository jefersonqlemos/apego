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

<form action="/produtos/{{$produto->idprodutos}}" method="post">

    <label for="nome">Nome:</label><br>
    <input type="text" required name="nome" value="{{$produto->nome}}"><br><br>

    <label for="tamanho">Tamanho</label><br>
    <select id="select2" required aria-required="true" name="tamanho" style="width:350px;">
        @foreach($tamanhos as $tamanho)
            @if($produto->tamanhos_idtamanhos == $tamanho->idtamanhos)
                <option value="{{ $produto->tamanhos_idtamanhos }}">{{ $tamanho->nome }}</option>
            @endif
        @endforeach 
            <optgroup label="Tamanho">
        @foreach($tamanhos as $tamanho)
            <option value="{{$tamanho->idtamanhos}}">{{$tamanho->nome}}</option>
        @endforeach 
        </optgroup>
    </select><br><br>

    <label for="quantidade">Quantidade:</label><br>
    <input class="quantidade" name="quantidade" required type="text" value="{{$produto->quantidade}}"><br><br>

    <label for="preco">Preço:</label><br>
    <input class="preco" required type="text" name="preco" value="{{$produto->preco}}"><br><br> 

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" required rows="10" cols="30">{{$produto->descricao}}</textarea>

    <br><br>
    
    <label for="genero">Genero:</label><br>

    <input type="radio" id="1" name="genero" value="1">
    <label for="male">Masculino</label><br>
    <input type="radio" id="2" name="genero" value="2">
    <label for="female">Feminino</label><br>
    <input type="radio" id="2" name="genero" value="3">
    <label for="female">Qualquer Gênero</label><br><br>
    
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
    <div class="buttonHolder">
        <input type="submit" value="Salvar">
    </div>
    <hr>
</form>

<h1>Fotos do Produto</h1>

<form id="addfoto" action="/fotos/{{$produto->idprodutos}}" method="post" enctype="multipart/form-data">
    <b>Adicionar Fotos</b><br>
    <input id="foto" type="file" name="foto" accept="image/*" /><br/>
    @method('put')
    @csrf
</form>

<br><h2>Para Excluir Clique No "X"<h2><br>

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
  </div>


@endforeach 


</body>

@endsection

</html>


