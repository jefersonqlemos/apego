<!DOCTYPE html>
<html>
    
@extends('admin.layouts.app')

@section('content')

<title>Apego</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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