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

    <script type="text/javascript">

        var url = window.location.pathname;

        if(url=='/feminino'){
            document.getElementById("lifeminino").className = "active";
        }else if(url=='/masculino'){
            document.getElementById("limasculino").className = "active";
        }else{
            document.getElementById("lishopping").className = "active";
        }

        function tamanhoFiltragem() {
            var radios = document.getElementsByName('tamanho');

            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    // do whatever you want with the checked radio
                    
                    document.getElementById("busca_tamanho").href = "{{ url('buscaportamanho' )}}" +"/"+ radios[i].value;

                    // only one radio can be logically checked, don't check the rest
                    break;
                }
            }
        }

        function precoFiltragem() {
            var vmenor = document.getElementById("minamount").value;
            var vmaior = document.getElementById("maxamount").value;
            document.getElementById("busca_preco").href = "{{ url('buscaporpreco' )}}" +"/"+ vmenor +"/" + vmaior;
        }
            
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
                        <a href="{{ url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Categorias</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-heading active">
                                            <a data-toggle="collapse" data-target="#collapseOne">Feminino</a>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="{{ url('categoriafeminino/1' )}}">Saia</a></li>
                                                    <li><a href="{{ url('categoriafeminino/2' )}}">Shorts</a></li>
                                                    <li><a href="{{ url('categoriafeminino/3' )}}">Vestido</a></li>
                                                    <li><a href="{{ url('categoriafeminino/4' )}}">Body</a></li>
                                                    <li><a href="{{ url('categoriafeminino/5' )}}">Blusa</a></li>
                                                    <li><a href="{{ url('categoriafeminino/6' )}}">Moletom</a></li>
                                                    <li><a href="{{ url('categoriafeminino/7' )}}">Colete</a></li>
                                                    <li><a href="{{ url('categoriafeminino/8' )}}">Cropped</a></li>
                                                    <li><a href="{{ url('categoriafeminino/9' )}}">Calçados</a></li>
                                                    <li><a href="{{ url('categoriafeminino/10' )}}">Jaqueta</a></li>
                                                    <li><a href="{{ url('categoriafeminino/11' )}}">Casaco</a></li>
                                                    <li><a href="{{ url('categoriafeminino/12' )}}">Terno</a></li>
                                                    <li><a href="{{ url('categoriafeminino/13' )}}">Bermuda</a></li>
                                                    <li><a href="{{ url('categoriafeminino/14' )}}">Calça</a></li>
                                                    <li><a href="{{ url('categoriafeminino/15' )}}">Camisa</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseTwo">Masculino</a>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="{{ url('categoriamasculino/2' )}}">Shorts</a></li>
                                                    <li><a href="{{ url('categoriamasculino/5' )}}">Blusa</a></li>
                                                    <li><a href="{{ url('categoriamasculino/6' )}}">Moletom</a></li>
                                                    <li><a href="{{ url('categoriamasculino/7' )}}">Colete</a></li>
                                                    <li><a href="{{ url('categoriamasculino/9' )}}">Calçados</a></li>
                                                    <li><a href="{{ url('categoriamasculino/10' )}}">Jaqueta</a></li>
                                                    <li><a href="{{ url('categoriamasculino/11' )}}">Casaco</a></li>
                                                    <li><a href="{{ url('categoriamasculino/12' )}}">Terno</a></li>
                                                    <li><a href="{{ url('categoriamasculino/13' )}}">Bermuda</a></li>
                                                    <li><a href="{{ url('categoriamasculino/14' )}}">Calça</a></li>
                                                    <li><a href="{{ url('categoriamasculino/15' )}}">Camisa</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFour">Acessórios</a>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="{{ url('todascategorias/19')}}">Acessórios</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseFive">Todas as Categorias</a>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                @foreach($categorias as $categoria)
                                                    <li><a href="{{ url('todascategorias/'.$categoria->idcategorias)}}">{{$categoria->nome}}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Buscar por preço</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="0" data-max="300"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Price:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#" onclick="precoFiltragem()" id="busca_preco">Filtrar</a>
                        </div>
                        <div class="sidebar__sizes">
                            <div class="section-title">
                                <h4>Buscar por tamanho</h4>
                            </div>
                            <div class="lista_tamanho">
                                <form id="form_tamanho">
                                    @foreach($tamanhos as $tamanho)
                                        <input type="radio" id="{{$tamanho->tamanho}}" name="tamanho" value="{{$tamanho->idtamanhos}}">
                                        <label for="{{$tamanho->tamanho}}">{{$tamanho->tamanho}}</label><br>
                                    @endforeach

                                    <div class="sidebar__filter">
                                        <a href="#" onclick="tamanhoFiltragem()" id="busca_tamanho">Filtrar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">

                    @foreach($produtos as $produto)

                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{$produto->foto}}">
                                    <ul class="product__hover">
                                        <li><a href="{{$produto->foto}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="{{url('adicaorapida/'.$produto->idprodutos)}}"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="{{url('verproduto/'.$produto->idprodutos)}}"><span class="icon_search"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{url('verproduto/'.$produto->idprodutos)}}">{{$produto->nome}}</a></h6>
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
                        
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                                @if ($produtos->onFirstPage())
                                @else
                                    <a href="{{ $produtos->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
                                @endif
                                @for ($i = 1; $i <= $produtos->lastPage(); $i++)
                                    <a href="{{ $produtos->url($i) }}">{{ $i }}</a>
                                @endfor

                                @if ($produtos->hasMorePages())
                                    <a href="{{ $produtos->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    

</body>

@endsection

</html>