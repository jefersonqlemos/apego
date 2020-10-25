@extends('admin.layouts.app')

@section('content')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style type="text/css">
        * {
        margin: 0px;
        padding: 0px;
        border: 0px;
        }
        ul {
            margin: 20px 0 0 20px;
            list-style: none;
        }
        a {
            position: relative; /* Para que a imagem não saia fora do link */
            display: block;
            width: 100px;
            padding: 5px 0;
            border:1px #999999 solid;
            background-color: #CCCCCC;
            text-decoration: none;
            color: #FFFFFF;
        }
        a:hover {
            background-color: #999999;
        }

        a span {
            display: none; /* Aqui você define que todo SPAN que estiver dentro de um A estará invisível */
        }
        a:hover span {
            display: block; /* Tranforma o SPAN em um elemento do tipo bloco */
            position: absolute; /* Para você poder posicionar a vontade, sem quebrar o layour em volta */
            top: 0px; /* Para ficar na mesma altura do link */
            left: 100%; /* Empurra a imagem para fora do link, ficando a lado do mesmo */
            border: 1px #CCCCCC solid; /* Estilo extra, lembrando que você pode colocar qualquer estilo nesse elemento */
        }
        img {
            width: 300px;
            height: 300px;
        }

        #cadastrar_produto {
            margin:0 auto;
            display:block;
            float: right;
        }

    </style>
    

</head>

    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/admin'">
          Voltar na Principal
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"></path>
        </svg>
    </button>

    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/produtosemestoque'">
        Filtrar por Produtos em Estoque
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tags" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M3 2v4.586l7 7L14.586 9l-7-7H3zM2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2z"/>
            <path fill-rule="evenodd" d="M5.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm0 1a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
            <path d="M1 7.086a1 1 0 0 0 .293.707L8.75 15.25l-.043.043a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 0 7.586V3a1 1 0 0 1 1-1v5.086z"/>
        </svg>
    </button>

    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/produtosvendidos'">
        Filtrar por Produtos Vendidos
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"></path>
            <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"></path>
        </svg>
    </button>

    <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/produtos'">
        Sem filtragem, Todos os Produtos
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list-ul" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
        </svg>
    </button>

    <button type="button" class="btn btn-outline-primary" onClick="window.location.reload()">
          Atualizar Pagina
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"></path>
            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"></path>
        </svg>
    </button>

    <button id="cadastrar_produto" type="button" class="btn btn-outline-primary" onclick="window.location.href='/produtos/create'">
        Cadastrar Produto 
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"></path>
        </svg>
    </button>

    <br><br>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Preço</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Visualizar</th>
      <th scope="col">Editar</th>
    </tr>
  </thead>
  <tbody>
    @foreach($produtos as $produto)
        <tr>
            <th scope="row">{{$produto->idprodutos}}</th>
            <td>{{$produto->nome}}</td>
            <td>{{$produto->preco}}</td>
            @if($produto->quantidade != 0)
                <td>{{$produto->quantidade}}</td>
            @else
                <td><b>Vendido</b></td>    
            @endif
            <td>
                <a href="/produtos/{{$produto->idprodutos}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"></path>
                        <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                    </svg>
                    <span><img src="{{$produto->foto}}" alt="gato" /></span>
                </a>
            </td>
            <td>
            
            <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/produtos/{{$produto->idprodutos}}/edit'">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                </svg>
            </button>
            </td>
        </tr>
    @endforeach 
  </tbody>
</table>
{{ $produtos->links() }}

@endsection
  

