<!DOCTYPE html>
<html>
    
@extends('admin.layouts.app')

@section('content')

<head>
<title>Apego</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head> 

<body>
        <div class="container">
            <br>
            
            <h1>Mensagem ao Suporte</h1>

            <br>
            <form action="/resposta/{{$suporte->idsuportes}}" method="post">
                <div class="form-group">
                    <label for="nome">Nome  do Solicitante</label>
                    <input name="nome" type="text" class="form-control" id="nome" value="{{$suporte->nome}}" disabled>
                </div>
                
                <div class="form-group">
                    <label for="status">Status</label>
                    @if($suporte->status==0)
                        <input name="status" type="text" class="form-control" id="status" value="Em Espera" disabled>
                    @else
                        <input name="status" type="text" class="form-control" id="status" value="Já foi Atendido" disabled>
                    @endif
                   
                </div>
                
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{$suporte->email}}" disabled>
                </div>

                <div class="form-group">
                    <label for="data">Data de Envio</label>
                    <input name="data" type="text" class="form-control" id="data" value="{{$suporte->created_at}}" disabled>
                </div>

                <div class="form-group">
                    <label for="mensagem">Mensagem do Solicitante</label>
                    <textarea name="mensagem" class="form-control" id="mensagem" rows="7" disabled>> {{$suporte->mensagem}}</textarea>
                </div>
                @if($suporte->resposta==null)
                <div class="form-group">
                    <label for="resposta">Responder Mensagem</label>
                    <textarea name="resposta" class="form-control" id="resposta" rows="7" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="float:right;margin-bottom:150px">Enviar Resposta</button>
                
                @else
                
                <div class="form-group">
                    <label for="resposta">Resposta Enviada</label>
                    <textarea name="resposta" class="form-control" id="resposta" rows="7" disabled>{{$suporte->resposta}}</textarea>
                </div>

                @endif
                
                @csrf
            </form>
        </div>
    </body>

    @endsection

</html> 