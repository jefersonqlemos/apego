<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Apego</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    

    <!-- Styles -->
    
</head>
<body>

    @include('cookieConsent::index')

    @if(Cookie::get('cookieCidade') !== null)
        <!--cidade: {{Cookie::get('cookieCidade')}}-->
    @else
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Qual Sua Cidade?</h5>
                </div>
                <div class="modal-body">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Videira
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Videira</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="btn-save" type="button" class="site-btn">Pronto</button>
                </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="{{ url('/carrinho')}}"><span class="icon_cart_alt"></span>
                <div class="tip">{{$cartcount}}</div>
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="{{ url('/')}}"><img src="{{ asset('img/logo.png')}}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
            <div class="offcanvas__auth">
                @guest
                    <a href="{{ url('/login' )}}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ url('/register' )}}">Registrar</a>
                    @endif
                    @else
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                            <a href="{{ url('/home' )}}">{{ Auth::user()->name }}</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            </a>
                @endguest
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{ url('/')}}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li id="lihome"><a href="{{ url('/')}}">Home</a></li>
                            <li id="lifeminino"><a href="{{ url('/feminino')}}">Feminino</a></li>
                            <li id="limasculino"><a href="{{ url('/masculino')}}">Masculino</a></li>
                            <li id="lishopping"><a href="{{ url('/shopping')}}">Shopping</a></li>
                            <li id="liconta"><a href="{{ url('/home')}}">Conta</a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('/home')}}">Minha Conta</a></li>
                                    <li><a href="{{ url('/home')}}">Meus Pedidos</a></li>
                                    <li><a href="{{ url('/carrinho')}}">Meu Carrinho</a></li>
                                </ul>
                            </li>
                            <li id="lisobre"><a href="{{ url('/sobre')}}">Sobre</a>
                                <ul class="dropdown">
                                    <li><a href="{{ url('/sobre')}}">Sobre Nós</a></li>
                                    <li><a href="{{ url('/sobre')}}">Contato</a></li>
                                    <li><a href="{{ url('/sobre')}}">Suporte</a></li>
                                    <li><a href="{{ url('/politica')}}">Politicas</a></li>
                                    <li><a href="{{ url('/depositos')}}">Depósitos</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            @guest
                                <a href="{{ url('/login' )}}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                    <a href="{{ url('/register' )}}">Registrar</a>
                                @endif
                            @else
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="{{ url('/home' )}}">{{ Auth::user()->name }}</a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            @endguest
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                            <li><a href="{{ url('/carrinho')}}"><span class="icon_cart_alt"></span>
                                <div class="tip">{{$cartcount}}</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <!-- Header Section End -->

    
        @yield('content')
    

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2416299294062049"
     crossorigin="anonymous"></script>

    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-1.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="{{$informacoeslayout->linkinstagram}}">@lojasapego</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-2.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="{{$informacoeslayout->linkinstagram}}">@lojasapego</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-3.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="{{$informacoeslayout->linkinstagram}}">@lojasapego</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-4.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="{{$informacoeslayout->linkinstagram}}">@lojasapego</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-5.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="{{$informacoeslayout->linkinstagram}}">@lojasapego</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                    <div class="instagram__item set-bg" data-setbg="{{ asset('img/instagram/insta-6.jpg') }}">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="{{$informacoeslayout->linkinstagram}}">@lojasapego</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="{{ url('/')}}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                        </div>
                        <p>{{$informacoeslayout->frasehome}}</p>
                        <div class="footer__payment">
                            <a href="#"><img src="{{ asset('img/payment/payment-1.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('img/payment/payment-2.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('img/payment/payment-3.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('img/payment/payment-4.png') }}" alt=""></a>
                            <a href="#"><img src="{{ asset('img/payment/payment-5.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="footer__widget">
                        <h6>Outros links</h6>
                        <ul>
                            <li><a href="{{ url('/sobre') }}">Sobre/Suporte</a></li>
                            <li><a href="{{ url('/sobre')}}">Contato</a></li>
                            <li><a href="{{ url('/depositos')}}">Depósitos</a></li>
                            <li><a href="{{ url('/politica')}}">Politicas de Troca</a></li>
                            <li><a href="{{ url('/politica')}}">Privacidade e Cookies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer__widget">
                        <h6>Conta</h6>
                        <ul>
                            <li><a href="{{ url('/home') }}">Minha Conta</a></li>
                            <li><a href="{{ url('/home') }}">Meus Pedidos</a></li>
                            <li><a href="{{ url('/carrinho') }}">Carrinho de Compras</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-8">
                    <div class="footer__newslatter">
                        <h6>Notificar Produtos mais Recentes</h6>
                        <form action="/emailnotificacao" method="post">
                            @csrf
                            <input type="text" name="email" placeholder="Email" required>
                            <button type="submit" class="site-btn">Enviar</button>
                        </form>
                        <div class="footer__social">
                            <a href="{{$informacoeslayout->linkfacebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$informacoeslayout->linktwitter}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$informacoeslayout->linkyoutube}}"><i class="fa fa-youtube-play"></i></a>
                            <a href="{{$informacoeslayout->linkinstagram}}"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved, CNPJ: 44.851.290/0001-52 - Matriz - Rua Arlindo de Mattos nº 239 - 3º Andar CEP: 89560-376 - Santa Tereza, Videira - SC - Telefone: (49)99968-0648 - O preço válido para os pedidos é o exibido na tela de pagamento.</p>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
                <form action="{{ url('search')}}" class="search-model-form">
                    <input type="text" name="search" id="search-input" placeholder="Pesquisar....."><button type="submit" style="border: none; background-color: #ffffff;"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    <!-- Search End -->
    </div>
    

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="//code.jivosite.com/widget/ufWbPE819m" async></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-K8F82TYVBQ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-K8F82TYVBQ');

      $(document).ready(function($){
        $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false}); 

            // CREATE
        $("#btn-save").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();
            var formData = {
                cidade: "Videira",
            };
            var type = "POST";
            var ajaxurl = 'cookiecidade';
            $.ajax({
                type: type,
                url: ajaxurl,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    //data.cidade
                    //console.log(data);
                    $('#exampleModalCenter').modal('hide');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
      });

    </script>
</body>
</html>
