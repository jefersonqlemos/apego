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
                        <a href="{{url('/shopping')}}">Shopping </a>
                        <span>Produto</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            @foreach($fotos as $foto)
                                @if($loop->first)
                                    <a class="pt active">
                                        <img src="{{$foto->fotos}}" alt="">
                                    </a>
                                @else
                                    <a class="pt">
                                        <img src="{{$foto->fotos}}" alt="">
                                    </a>
                                @endif
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
                        <h3>{{$produto->nome}} 
                            <span>
                            @if($produto->quantidade != 0)
                                Produto em Estoque ({{$produto->quantidade}})
                            @else
                                Produto Fora d Estoque
                            @endif
                            </span></h3>
                        
                        <div class="rating">
                            <span>Avaliação: </span>
                            @if($produto->avaliacao != null)
                                @for ($i = 0; $i <$produto->avaliacao ; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @else
                                <span>produto ainda não avaliado</span>
                            @endif
                        </div>
                        <div class="product__details__price">R$ {{$produto->preco}} <span></span></div>
                        <p>{{$produto->brevedescricao}}</p>
                        <div class="product__details__button">
                            <form action="{{url('adicionaraocarrinho/'.$produto->idprodutos)}}" method="post">
                                @csrf
                                <div class="quantity">
                                    <span>Quantidade:</span>
                                    <div class="pro-qty">
                                        @if($produto->quantidade > 0)
                                            <input name="qty" type="text" value="1" readonly min="1" max="{{$produto->quantidade}}">
                                        @else
                                            <input name="qty" type="text" value="0" readonly min="0" max="0">
                                        @endif
                                    </div>
                                </div>
                                @if($produto->quantidade > 0)
                                    <button type="submit" class="cart-btn"><span class="icon_cart_alt"></span> Adicionar ao Carrinho</button>
                                @endif
                            </form>
                            
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Tamanho:</span>
                                    <div class="size__btn">
                                        @foreach($variantes as $variante)
                                            @if($tamanho->idtamanhos == $variante->tamanhos_idtamanhos)
                                                <label for="$tamanho->idtamanhos" class="active">
                                                    <input type="radio" id="$tamanho->idtamanhos">
                                                    {{$tamanho->tamanho}}
                                                </label>
                                            @else
                                                <label for="{{$variante->idprodutos}}">
                                                    <input type="radio" id="{{$variante->idprodutos}}">
                                                    <a style="color: inherit;text-decoration: inherit;" href="{{url('verproduto/'.$variante->idprodutos)}}">{{$variante->tamanho}}</a>
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <span>Genero:</span>
                                    <p>{{$genero->genero}}</p>
                                </li>
                                <li>
                                    <span>Promoção:</span>
                                    <p>Frete Gratuito</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" role="tab">Descrição</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <p>{{$produto->descricaodetalhada}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->


</body>

@endsection


</html>