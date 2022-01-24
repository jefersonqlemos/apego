<!DOCTYPE html>
<html lang="zxx">

@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Apego Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apego</title>

    <script type="text/javascript">

        document.getElementById("lisobre").className = "active";

    </script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Depósito</span>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__content">
                        <div class="contact__address">
                            <br><br><br>
                            <h5>Localização do Depósito da Sua Cidade</h5>   
                            <br><br>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> <b>{{$cidade->cidade}}</b> - {{$cidade->endereco}}.</h6>
                                </li>
                            </ul>
                            <br>
                            <button id="btn-save" onClick="window.location.href='{{url('/updatedeposito')}}'" type="button" class="site-btn">Trocar Cidade</button><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection

</html>