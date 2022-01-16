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
                        <span>Depósitos</span>
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
                            <h5>Cidade e Endereço dos Depósitos</h5>   
                            <br><br>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> <b>Videira-SC</b> - Bairro Santa Tereza, Rua Arlindo de Mattos 239, APT 303.</h6>
                                </li>
                            </ul>
                            <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection

</html>