<!DOCTYPE html>
<html lang="zxx">

@extends('admin.layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Apego Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apego</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>

<body>

    

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            @foreach($fotos as $foto)
                                <a class="pt">
                                    <img src="{{$foto->fotos}}" alt="">
                                </a>
                            @endforeach 
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                            @foreach($fotos as $foto)
                                <img class="product__big__img" src="{{$foto->fotos}}" alt="">
                            @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$produto->nome}}</h3>
                        <h4>Marca: <b>{{$produto->marca}}</b></h4><br>
                        <h5>Tamanho: <b>{{$tamanho->tamanho}}</b></h5><br>
                        <div class="product__details__price">$ {{$produto->preco}}</div>
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantidade Em Estoque: <b>{{$produto->quantidade}}</b></span>
                            </div>
                            <a href="/produtos/{{$produto->idprodutos}}/edit" class="cart-btn">Editar Produto</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" role="tab">Breve Descrição</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Descrição</h6>
                                <p>{{$produto->brevedescricao}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

    <!-- Js Plugins -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    <script src="/js/mixitup.min.js"></script>
    <script src="/js/jquery.countdown.min.js"></script>
    <script src="/js/jquery.slicknav.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.nicescroll.min.js"></script>
    <script src="/js/main.js"></script>
</body>

@endsection

</html>