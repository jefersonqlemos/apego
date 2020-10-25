@extends('layouts.app')

@section('content')   


    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{url('/carrinho')}}">Carrinho</a>
                        <a href="{{url('/conferirdados')}}">Dados</a>
                        <span>Pagamento</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
    
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Forma de Pagamento</h4>
                            </div>
                            <ul>
                            <li><a href="#">Pagar na Entrega </a></li>
                            <li><a href="#">Boleto Bancário </a></li>
                            <li><a href="#">Cartão de Credito </a></li>
                            <li><a href="#">Cartão de Debito </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-8 col-md-8">
                    <div class="blog__details__content">
                        <div class="blog__details__desc">
                            <br><br>
                            <h3>Pagar na Entrega</h3>
                            <hr>
                            <p><b>Pague na entrega no dinheiro, deposito ou transferencia Bancaria</b></p>
                        </div>
                        <button style="float: right;" class="site-btn">Finalizar</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="#" class="checkout__form">
                        <br><br>
                        <div class="row">
                            <div class="checkout__order">
                                <h5>Valor do Pedido</h5>
                                
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span>R$ {{$subtotal}}</span></li>
                                        <li>Total <span>R$ {{$total}}</span></li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </form>   
                </div>         
            </div>
        </div>
    </section>

@endsection