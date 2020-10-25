<!DOCTYPE html>
<html lang="zxx">

@extends('layouts.app')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
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
                        <span>Carrinho</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Valor</th>
                                    <th>Quantidade</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($carrinho as $produto)
                                    <tr>
                                        <td class="cart__product__item">
                                            <img src="{{$produto->options->foto}}" alt="">
                                            <div class="cart__product__item__title">
                                                <h6><a href="{{url('verproduto/'.$produto->id)}}">{{$produto->name}}</a></h6>
                                            </div>
                                        </td>
                                        <td class="cart__price">R$ {{$produto->price}}</td>
                                        <td class="cart__quantity">
                                            <div class="pro-qty">
                                                <input type="text" value="{{$produto->qty}}" disabled>
                                            </div>
                                        </td>
                                        <td class="cart__total">R$ {{$produto->price}}</td>
                                        <td class="cart__close"><a href="{{url('remover/'.$produto->rowId)}}"><span class="icon_close"></span></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="{{url('shopping')}}">Continuar Comprando</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="{{url('carrinho')}}"><span class="icon_loading"></span> Atualizar Pagina</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                   
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Carrinho total</h6>
                        <ul>
                            <li>Subtotal <span>R$ {{$subtotal}}</span></li>
                            <li>Total <span>R$ {{$total}}</span></li>
                        </ul>
                        @if($total!=0)
                            <a href="/conferirdados" class="primary-btn">Continuar Pedido</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->

    
</body>

@endsection

</html>