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

        $(document).ready(function() {
            $("input[name=genero][value=" + "{{$produto->generos_idgeneros}}" + "]").attr('checked', 'checked');
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
            margin-left:45%;
        }
        #files{
            display:none
        }
       
    </style>

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

    <form id="formsubmit" action="/storevariantetamanho" method="post" enctype="multipart/form-data">

        <label for="variante_tamanho">Variante de Tamanho:</label><br>
        <input readonly="readonly" class="variante_tamanho" name="variante_tamanho" required type="text" value="{{$produto->variante_tamanho}}"><br><br>

        <label for="nome">Nome do Produto:</label><br>
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

        <label style="color:red" for="tamanho">Tamanho:</label><br>
        <select id="select2" required aria-required="true" name="tamanho" style="width:350px;">
            @foreach($tamanhos as $tamanho)
                <option value="{{$tamanho->idtamanhos}}">{{$tamanho->tamanho}}</option>
            @endforeach 
        </select>
        <br><br>

        <label style="color:red" for="quantidade">Quantidade:</label><br>
        <input class="quantidade" name="quantidade" required type="text" ><br><br>

        <label for="preco">Preço:</label><br>
        <input class="preco" required type="text" name="preco" value="{{$produto->preco}}"><br><br> 

        <label for="brevedescricao">Breve Descrição:</label><br>
        <textarea name="brevedescricao" required rows="5" cols="80">{{$produto->brevedescricao}}</textarea><br><br>

        <label for="descricaodetalhada">Descrição detalhada:</label><br>
        <textarea name="descricaodetalhada" required rows="10" cols="80">{{$produto->descricaodetalhada}}</textarea>

        <br><br>
        
        <label for="genero">Genero:</label><br>

        <input type="radio" id="1" name="genero" value="1" checked>
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
        <br><br>

        @if($cidade == 1)
            <label for="cidade">Escolha a cidade:</label>
            <select name="cidade" id="cidade" required>
                @foreach($cidades as $cidade)
                    @if($cidade->idcidades==$produto)
                        <option value="{{$cidade->idcidades}}" selected>{{$cidade->cidade}}</option>
                    @else
                        <option value="{{$cidade->idcidades}}">{{$cidade->cidade}}</option>
                    @endif
                @endforeach
            </select>
            <br>
            <br>
        @else
            <input type="hidden" name="cidade" value="{{$cidade}}">
            <input type="hidden" name="fotoproduto" value="{{$produto->foto}}">
        @csrf
    </form>

    <div id="output"></div>

    @foreach($fotos as $foto)

        <img src="{{$foto->fotos}}"  alt="Preview">

        <br>
    @endforeach

    <br><hr>
        
        <input form="formsubmit" id="salvar" type="submit" value="Salvar">
        
    </div>


<br><br><br><br><br><br>

</body>

@endsection

</html>