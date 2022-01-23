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
        document.getElementById("lihome").className = "active";
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

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item set-bg"
                    data-setbg="img/categories/category-1.jpg">
                    <div class="categories__text">
                        <h1>Feminino</h1>
                        <p>{{$informacoeslayout->frasehome}}</p>
                        <a href="/feminino">Compre agora</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-2.jpg">
                            <div class="categories__text">
                                <h4>Masculino</h4>
                                <p>{{$numeroitemsmasculino}} itens</p>
                                <a href="{{ url('/masculino')}}">Compre agora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-3.jpg">
                            <div class="categories__text">
                                <h4>Calçados</h4>
                                <p>{{$numeroitemscalcados}} items</p>
                                <a href="{{ url('todascategorias/9')}}">Compre agora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/gopro.jpg">
                            <div class="categories__text">
                                <h4>Acessórios</h4>
                                <p>{{$numeroitemsacessorios}} items</p>
                                <a href="{{ url('todascategorias/16')}}">Compre agora</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg" data-setbg="img/categories/category-5.jpg">
                            <div class="categories__text">
                                <h4>Infantil</h4>
                                <p>{{$numeroitemsinfantil}} items</p>
                                <a href="{{ url('/infantil')}}">Compre agora</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Produtos Mais Recentes</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
            @foreach($produtos as $produto)
                <div class="col-lg-3 col-md-4 col-sm-6 mix">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{$produto->foto}}">
                            <ul class="product__hover">
                                <li><a href="{{$produto->foto}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="{{url('verproduto/'.$produto->idprodutos)}}"><span class="icon_search-2"></span></a></li>
                                <li><a href="{{url('adicaorapida/'.$produto->idprodutos)}}"><span class="icon_cart_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{url('verproduto/'.$produto->idprodutos)}}">{{$produto->nome}} {{$produto->marca}}</a></h6>
                            <div class="rating">
                            @if($produto->avaliacao != null)
                                @for ($i = 0; $i <$produto->avaliacao ; $i++)
                                    <i class="fa fa-star"></i>
                                @endfor
                            @endif
                            </div>
                            <div class="product__price">R$ {{$produto->preco}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="img/banner/banner-1.jpg">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Moda</span>
                            <h1>Outono Inverno</h1>
                            <a href="{{ url('/shopping')}}">Shopping</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>Moda</span>
                            <h1>Primavera Verão</h1>
                            <a href="{{ url('/shopping')}}">Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Ultimos Vendidos</h4>
                    </div>
                    @foreach($ultimosvendidos as $produto)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{$produto->foto}}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>{{$produto->nome}} {{$produto->marca}}</h6>
                            <div class="rating">
                                @if($produto->avaliacao != null)
                                    @for ($i = 0; $i <$produto->avaliacao ; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                @endif
                            </div>
                            <div class="product__price">R$ {{$produto->preco}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Ultimos Avaliados</h4>
                    </div>
                    @foreach($ultimosavaliados as $produto)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{$produto->foto}}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>{{$produto->nome}} {{$produto->marca}}</h6>
                            <div class="rating">
                                @if($produto->avaliacao != null)
                                    @for ($i = 0; $i <$produto->avaliacao ; $i++)
                                        <i class="fa fa-star"></i>
                                    @endfor
                                @endif
                            </div>
                            <div class="product__price">R$ {{$produto->preco}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Mais Baratos</h4>
                    </div>
                    @foreach($maisbaratos as $produto)
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="{{$produto->foto}}" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6>{{$produto->nome}} {{$produto->marca}}</h6>
                            <div class="rating">
                                @if($produto->avaliacao != null)
                                    @for ($i = 0; $i <$produto->avaliacao ; $i++)
                                <i class="fa fa-star"></i>
                                    @endfor
                                @endif
                            </div>
                            <div class="product__price">R$ {{$produto->preco}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="img/discount.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Para</span>
                        <h2>Verão <script>document.write(new Date().getFullYear())</script></h2>
                        <h5><span>Faltam</span></h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>42</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="{{ url('/shopping')}}">Shopping</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Frete Gratis</h6>
                    <p>Para Todas as Compras</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Pagamento</h6>
                    <p>Pode Pagar na Entrega</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Suporte Online 24/7</h6>
                    <p>Suporte Dedicado</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Segurança</h6>
                    <p>Pagamento 100% Seguro</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

</body>

@endsection

</html>

