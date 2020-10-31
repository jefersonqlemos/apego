@extends('admin.layouts.app')

@section('content')

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">ID Suporte</th>
            <th scope="col">Nome da Pessoa</th>
            <th scope="col">Status</th>
            <th scope="col">Data</th>
            <th scope="col">Ver Mensagem</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suportes as $suporte)
        <tr>
            <th scope="row">{{$suporte->idsuportes}}</th>
            <td>{{$suporte->nome}}</td>
            @if($suporte->status==0)
                <td><b>Em Espera</b></td>
            @else
                <td>Atendido</td>
            @endif
            <td>{{date('d-m-Y H:i:s', strtotime($suporte->created_at))}}</td>
            <td>
                <button type="button" class="btn btn-primary" onclick="window.location.href='/mensagemsuporte/{{$suporte->idsuportes}}'">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"></path>
                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"></path>
                    </svg>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    {{ $suportes->links() }}
</body>
@endsection