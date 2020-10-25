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

    <script type="text/javascript">

        $(document).ready(function($){
            $('.preco').mask("####0,00", {reverse: true});
            $(".quantidade").mask("0", {
                min: 0,
                max: 9
            });
        });

        $(document).ready(function($){
            $("#open_btn").click(function() {
                $.FileDialog({multiple: true}).on('files.bs.filedialog', function(ev) {
                    var files = ev.files;

                    function FileListItems (files) {
                        var b = new ClipboardEvent("").clipboardData || new DataTransfer()
                        for (var i = 0, len = files.length; i<len; i++) b.items.add(files[i])
                        return b.files
                    }
                    const fileInput = document.getElementById("files");
                    fileInput.files = new FileListItems(files)
                    //document.getElementById("files").files = files;
                    console.log(document.getElementById("files"));
                    var text = "";
                    files.forEach(function(f) {
                        text += f.name + "<br/>";
                    });
                    $("#output").html(text);
                }).on('cancel.bs.filedialog', function(ev) {
                    $("#output").html("Cancelled!");
                });
            });
        });
       
    </script> 

    <style>
        img{
            max-width: 100%;
            height: auto;
            margin-top: 25px;
        }
        input[type=submit]{
            background-color: #910000;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        #files{
            display:none
        }
       
    </style>

</head>
<body>

<form id="formsubmit" action="/produtos" method="post" enctype="multipart/form-data">

    <label for="nome">Nome:</label><br>
    <input type="text" required name="nome" ><br><br>

    <label for="tamanho">Tamanho</label><br>
    <select id="select2" required aria-required="true" name="tamanho" style="width:350px;">
        @foreach($tamanhos as $tamanho)
            <option value="{{$tamanho->idtamanhos}}">{{$tamanho->nome}}</option>
        @endforeach 
    </select>
    <br><br>

    <label for="quantidade">Quantidade:</label><br>
    <input class="quantidade" name="quantidade" required type="text" ><br><br>

    <label for="preco">Preço:</label><br>
    <input class="preco" required type="text" name="preco" ><br><br> 

    <label for="descricao">Descrição:</label><br>
    <textarea name="descricao" required rows="10" cols="30"></textarea>

    <br><br>
    
    <label for="genero">Genero:</label><br>

    <input type="radio" id="1" name="genero" value="1" checked>
    <label for="male">Masculino</label><br>
    <input type="radio" id="2" name="genero" value="2">
    <label for="female">Feminino</label><br>
    <input type="radio" id="3" name="genero" value="3">
    <label for="female">Qualquer Gênero</label><br><br>
    
    <label for="categoria">Categoria</label><br>
    <select id="select1" required aria-required="true" name="categoria" style="width:350px;">
        @foreach($categorias as $categoria)
            <option value="{{$categoria->idcategorias}}">{{$categoria->nome}}</option>
        @endforeach
    </select>
    <br><br>
    
    <input id="files" type="file" name="files[]">
    @csrf
</form>

<div id="output"></div>

<button id="open_btn" class="btn btn-primary">Adicionar Fotos</button>

<br><hr>

<input form="formsubmit" id="salvar" type="submit" value="Salvar">

</body>

@endsection

</html>