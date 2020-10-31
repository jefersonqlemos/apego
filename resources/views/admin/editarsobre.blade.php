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
            
            <h1>Dados da Empresa</h1>

            <br>
            <form action="{{url('/updatesobre')}}" method="post">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input name="endereco" type="text" class="form-control" id="endereco" value="{{$sobre->endereco}}">
                </div>
                
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input name="telefone" type="text" class="form-control" id="telefone" value="{{$sobre->telefone}}">
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{$sobre->email}}">
                </div>

                <div class="form-group">
                    <label for="linkfacebook">Link Facebook</label>
                    <input name="linkfacebook" type="text" class="form-control" id="linkfacebook" value="{{$links->linkfacebook}}">
                </div>
                
                <div class="form-group">
                    <label for="linktwitter">Link Twitter</label>
                    <input name="linktwitter" type="text" class="form-control" id="linktwitter" value="{{$links->linktwitter}}">
                </div>

                <div class="form-group">
                    <label for="linkyoutube">Link YouTube</label>
                    <input name="linkyoutube" type="text" class="form-control" id="linkyoutube" value="{{$links->linkyoutube}}">
                </div>

                <div class="form-group">
                    <label for="linkinstagram">Link Instagram</label>
                    <input name="linkinstagram" type="text" class="form-control" id="linkinstagram" value="{{$links->linkinstagram}}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Sobre a Empresa</label>
                    <textarea name="sobre" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$sobre->sobre}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
                @csrf
            </form>
        </div>
    </body>

    @endsection

</html> 