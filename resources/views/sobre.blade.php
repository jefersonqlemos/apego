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

    @if(session()->has('message'))
        <script>
            alert("{{ session()->get('message') }}");
        </script>
    @endif

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Sobre</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>INFORMAÇÕES/SUPORTE</h5>
                            <ul>
                                <li>
                                    <h6> Sobre a Empresa</h6>
                                    <p>{{$sobre->sobre}}</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Endereço</h6>
                                    <p>{{$sobre->endereco}}</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Telefone</h6>
                                    <p><span>{{$sobre->telefone}}</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Suporte</h6>
                                    <p>{{$sobre->email}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>ENVIAR UMA MENSAGEM AO SUPORTE</h5>
                            <form action="mensagemsuporte" method="post">
                                @csrf
                                <input type="text" name="nome" placeholder="Nome" required>
                                <input type="text" name="email" placeholder="Email" required>
                                <textarea name="mensagem" placeholder="Mensagem" required></textarea>
                                <button type="submit" class="site-btn">Enviar Mensagem</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28436.37370981746!2d-51.168390385574746!3d-27.01288518353988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e14e48979cd46f%3A0xa8618b273152bbf0!2sVideira%2C%20SC%2C%2089560-000!5e0!3m2!1spt-BR!2sbr!4v1603050491235!5m2!1spt-BR!2sbr"
                        height="780" style="border:0" allowfullscreen="">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<br><br><br><br><br><br>

</body>

@endsection

</html>