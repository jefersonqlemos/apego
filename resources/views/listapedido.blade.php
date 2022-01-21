<!DOCTYPE html>
<html lang="zxx">

@extends('layouts.app')

@section('content')

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
            // Check Radio-box
            $(".rating input:radio").attr("checked", false);

            $('.rating input').click(function () {
                $(".rating span").removeClass('checked');
                $(this).parent().addClass('checked');
            });

            $('input:radio').change(
            function(){
                var userRating = this.value;
                document.getElementById("formavaliacao").submit();
            }); 
        });
    </script>

    <style>
        .rating {
            float:left;
            width:300px;
        }
        .rating span { float:right; position:relative; }
        .rating span input {
            position:absolute;
            top:0px;
            left:0px;
            opacity:0;
        }
        .rating span label {
            display:inline-block;
            width:20px;
            height:20px;
            text-align:center;
            color:#FFF;
            background:#ccc;
            font-size:30px;
            margin-right:2px;
            line-height:30px;
            border-radius:50%;
            -webkit-border-radius:50%;
        }
        .rating span:hover ~ span label,
        .rating span:hover label,
        .rating span.checked label,
        .rating span.checked ~ span label {
            background:darkred;
            color:#FFF;
        }
    </style>

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
                        <span>Pedido</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <br><br>

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <table class="table table-bordered">
                    
                    <tbody>
                        <tr> 
                            <td>ID: <b>{{$pedido->idpedidos}}</b></td>
                                <td>Data: {{date("d/m/Y h:m:s", strtotime($pedido->created_at))}}</td>
                                <td>Valor Total do Pedido: <b>R$ {{$pedido->valortotal}}</b></td>
                        </tr>
                        <tr>
                                <td colspan="2">Status: <b>{{$status->status}}</b></td>
                                <td></td>
                        </tr>

                        @if($pedido->tipotransacao==2)
                        <tr>
                            <td colspan="2">
                            <a href="{{$pedido->link}}">imprimir boleto aqui</a></td>
                        </tr>
                        @elseif($pedido->tipotransacao==3)
                        <tr>
                            <td colspan="2">obs: caso não tenha conseguido acessar o banco para realizar o debito online, ligue ou 
                            mande uma mensagem ao suporte Apego. Caso pagou ignora essa mensagem.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Produtos Comprados</th>
                                    <th>Valor</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($produtos as $produto)
                                <tr>
                                    <td class="cart__product__item">
                                        <a href="{{url('/verproduto/'.$produto->idprodutos)}}">
                                            <img src="{{$produto->foto}}" alt="">
                                        </a>
                                        <div class="cart__product__item__title">
                                            <h4><b><a style="color:#ca1515" href="{{url('/verproduto/'.$produto->idprodutos)}}">{{$produto->nome}} {{$produto->marca}} {{$produto->tamanho}}</a></b></h4>
                                        </div>
                                        @if($produto->avaliacao==null)
                                            <form id="formavaliacao" action="{{url('/avaliacao/'.$produto->idprodutos)}}" method="post">
                                                @csrf
                                                <div class="rating">
                                                    Avalie esse produto   
                                                    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
                                                    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
                                                    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
                                                    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
                                                    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>                                            
                                                </div>
                                                <input type="hidden" name="idpedidos" value="{{$pedido->idpedidos}}">
                                            </form>
                                        @else
                                            <div class="rating">
                                                @for ($i = 0; $i <$produto->avaliacao ; $i++)
                                                    <i class="fa fa-star"></i>
                                                @endfor
                                            </div>
                                        @endif
                                    </td>
                                    <td class="cart__price">R$ {{$produto->preco}}</td>
                                    <td class="cart__quantity">&nbsp;&nbsp;&nbsp;&nbsp;{{$produto->quantidade}}</td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->


</body>

@endsection

</html>