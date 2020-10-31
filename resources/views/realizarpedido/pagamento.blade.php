@extends('layouts.app')

@section('content')   

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/matheuscuba/icones-bancos-brasileiros@1.1/dist/all.css">
    <script type="text/javascript">

        $(document).ready(function($){

            

            $('#telefone').mask("(99)99999-999?9").focusout(function (event) {  
                var target, phone, element;  
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
                phone = target.value.replace(/\D/g, '');
                element = $(target);  
                element.unmask();  
                if(phone.length > 10) {  
                    element.mask("(99) 99999-999?9");  
                } else {  
                    element.mask("(99) 9999-9999?9");  
                }  
            });
            
            $('#cadCPF').mask("999.999.999-99");
            $('#pagamentoMes').mask("99");
            $('#numCartao').mask("9999999999999999", {"placeholder": ""});
            $("#cvv").mask("999?9", {"placeholder": ""});
            //$('#cvv').mask("999");
            $('#pagamentoAno').mask("9999");

            $('#pe').click(function(){
                    $("#pagarentrega").show();
                    $("#boleto").hide();
                    $("#cartaocredito").hide();
                    $("#cartaodebito").hide(); 
            });

            $('#bo').click(function(){
                    $("#pagarentrega").hide();
                    $("#boleto").show();
                    $("#cartaocredito").hide();
                    $("#cartaodebito").hide(); 
            });

            $('#cc').click(function(){
                    $("#pagarentrega").hide();
                    $("#boleto").hide();
                    $("#cartaocredito").show();
                    $("#cartaodebito").hide(); 
            });

            $('#cd').click(function(){
                    $("#pagarentrega").hide();
                    $("#boleto").hide();
                    $("#cartaocredito").hide();
                    $("#cartaodebito").show(); 
            });
            
            $.ajax({
                url : "{{URL::to('/authenticate/index/iniciapagamento')}}",
                type : 'get',
                dataType : 'json',
                async : false,
                timeout: 20000,
                success: function(data){
                    console.log(data);
                    PagSeguroDirectPayment.setSessionId(data.id);
                    $('.preloaderjquery').fadeOut('slow');
                }
            });   

            $("#numCartao").keyup(function(){

                numcartao=$("#numCartao").val();
                QtdCaracteres = numcartao.length;
                console.log(numcartao);

                if(QtdCaracteres==6 || QtdCaracteres==16){
                    PagSeguroDirectPayment.getBrand( {
                    cardBin: numcartao,
                    success: function(response) {

                        BandeiraImg=response.brand.name;
                        $(".bandeira").val(BandeiraImg);
                        
                        $('.bandeiracartao').html("<img src=https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/"+BandeiraImg+".png>")

                        console.log(response);
                        getParcelas(BandeiraImg);
                    },
                    error: function(response) {
                        alert('Cartão não reconhecido');
                            $('.bandeiracartao').empty();
                            $('#parcelamento').empty().append("<option value=''>Digite o Cartão para Selecionar</option>");
                        }
                    });

                }

                
            });

            $("#btnboleto").click(function(){

                identificador = PagSeguroDirectPayment.getSenderHash();
                $(".hashPagSeguro").val(identificador);
                $('#formboleto').find('button').trigger('click');

            });

            $("#btncartaodebito").click(function(){

                identificador = PagSeguroDirectPayment.getSenderHash();
                $(".hashPagSeguro").val(identificador);
                $('#formcartaodebito').find('button').trigger('click');

            });

            $("#btncartaocredito").click(function(){

                identificador = PagSeguroDirectPayment.getSenderHash();
                $(".hashPagSeguro").val(identificador);
                console.log(identificador);

                console.log($("#numCartao").val());
                numCartao = $("#numCartao").val();
                cvvCartao = $("#cvv").val();
                bandeira = $("#bandeira").val();
                expiracaoMes = $("#pagamentoMes").val();
                expiracaoAno = $("#pagamentoAno").val();

                PagSeguroDirectPayment.createCardToken({
                    cardNumber: numCartao,
                    brand: bandeira,
                    cvv: cvvCartao,
                    expirationMonth: expiracaoMes,
                    expirationYear: expiracaoAno,

                    success: function(response){  
                        console.log(response); 
                        $(".tokenPagamentoCartao").val(response.card.token);
                        $('#formcartaocredito').find('button').trigger('click');
                    },
                    error: function(response){ console.log(response); }
                });
            });

            function getParcelas(Bandeira)
            {
                Amount='{{$total}}';
                Amount=Amount.replace(",",".");

                PagSeguroDirectPayment.getInstallments({
                    amount: Amount,
                    maxInstallmentNoInterest: '3',
                    brand: Bandeira,
                    success: function(response)
                    {
                        $('#parcelamento').empty();
                        $.each(response.installments,function(i,obj){
                            $.each(obj.slice(0,3),function(i2,obj2){
                                var NumberValue=obj2.installmentAmount;
                                var Number= "R$ "+ NumberValue.toFixed(2).replace(".",",");
                                $('#parcelamento').show().append("<option value='"+obj2.quantity+"|"+NumberValue.toFixed(2)+"'>"+obj2.quantity+" parcelas de "+Number+"</option>");
                            });
                        });
                    }
                });
            }
            

        }); 
        

    </script>

    <style>
        .preloaderjquery {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-image: url('/img/rolling.gif');
            background-repeat: no-repeat; 
            background-color: #FFF;
            background-position: center;
        }

        /* HIDE RADIO */
        [type=radio] { 
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* IMAGE STYLES */
        [type=radio] + img {
            cursor: pointer;
        }

        /* CHECKED STYLES */
        [type=radio]:checked + img {
            outline: 2px solid MediumBlue;
        }

        .bank{
            margin: 20px; 
        }

    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div class="preloaderjquery"></div>

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
                                <li><a id="pe" href="#">Pagar na Entrega </a></li>
                                <li><a id="bo" href="#">Boleto Bancário </a></li>
                                <li><a id="cc" href="#">Cartão de Credito </a></li>
                                <li><a id="cd" href="#">Debito Online </a></li>
                            </ul>
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

                
                <div id="pagarentrega" class="col-lg-8 col-md-8">
                    <div class="blog__details__content">
                        <div class="blog__details__desc">
                            <br>
                            <h5><b>PAGAR NA ENTREGA</b></h5>
                            <hr>
                            <p><b>Pague na entrega no dinheiro, deposito ou transferencia Bancaria</b></p>
                        </div>
                        <button style="float: right;" class="site-btn">Finalizar Pedido</button>
                    </div>
                </div>
                   
                <div class="col-12 col-md-8">
                    <div id="boleto" style="display:none">
                        <form id="formboleto" action="{{url('/authenticate/index/efetuapagamentoboleto')}}" class="checkout__form" method="post">
                            <br>
                            @csrf
                            <h5>Pagar no Boleto Bancario</h5>
                            <input class="hashPagSeguro" name="hashPagSeguro" type="hidden" required>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__form__input">
                                    <p><b>Se deseja pagar no boleto, clique em finalizar para gerar o link para impressão</b></p>
                                    </div>
                                </div>
                            </div>
                            <button style="display:none" class="site-btn">Finalizar Pedido</button>
                        </form>
                        <button id="btnboleto" style="float: right;margin-top: 40px" class="site-btn">Finalizar Pedido</button>
                    </div>

                    
                    <div id="cartaocredito" style="display:none">
                        <form id="formcartaocredito" action="{{url('/authenticate/index/efetuapagamentocartao')}}" class="checkout__form" method="post" >
                            <br>
                            @csrf    
                            <h5>Pagar no Cartão de Credito</h5>
                            <div class="row">
                                <input class="hashPagSeguro" name="hashPagSeguro" type="hidden" required>
                                <input class="tokenPagamentoCartao" name="tokenPagamentoCartao" type="hidden" required>
                                <input class="bandeira" name="bandeira" type="hidden" required>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>Nome do Titular<span>*</span></p>
                                            <input name="nome" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>Sobrenome do Titular<span>*</span></p>
                                            <input name="sobrenome" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>CPF do Titular<span>*</span></p>
                                            <input id="cadCPF" name="cadCPF" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>Data de Nascimento do Titular<span>*</span></p>
                                            <input name="datadenascimento" type="date" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">                                       
                                        <p>Telefone do Titular<span>*</span></p>
                                        <input id="telefone" name="telefone" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>Numero do Cartão<span>*</span></p>
                                            <div class="bandeiracartao"></div>
                                            <input id="numCartao" name="numCartao" type="text" tabindex="1" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>CVV<span>*</span></p>
                                            <input id="cvv" name="cvv" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>Mes da Expiração<span>*</span></p>
                                            <input id="pagamentoMes" name="pagamentoMes" type="text" tabindex="2" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>Ano da Expiração<span>*</span></p>
                                            <input id="pagamentoAno" name="pagamentoAno" type="text" tabindex="3" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="checkout__form__input">
                                            <p>Numero de Parcelas<span>*</span></p>
                                            <select name="parcelamento" id="parcelamento">
                                                <option value="">Digite o Cartão para Selecionar</option>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <button style="display:none" class="site-btn">Finalizar Pedido</button>
                        </form>
                        <button id="btncartaocredito" style="float: right;;margin-top: 40px" class="site-btn">Finalizar Pedido</button>
                    </div>
                    
                    <div id="cartaodebito" style="display:none">
                        <form id="formcartaodebito" action="{{url('/authenticate/index/efetuapagamentodebito')}}" class="checkout__form" method="post">
                            <br>
                            @csrf
                            <input class="tokenPagamentoCartao" name="tokenPagamentoCartao" type="hidden" required>
                            <h5>Debito Online</h5>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__form__input">
                                            <p>Bancos Disponiveis</p>
                                            <label>
                                                <input type="radio" name="banco" value="bancodobrasil" checked>
                                                <img class="bank" src="img/banks/Banco_do_Brasil.png">
                                            </label>
                                            <label>
                                                <input type="radio" name="banco" value="itau">
                                                <img class="bank" src="img/banks/Itau.png">
                                            </label>
                                            <label>
                                                <input type="radio" name="banco" value="banrisul">
                                                <img class="bank" src="img/banks/Banrisul.png">
                                            </label>
                                            <label>
                                                <input type="radio" name="banco" value="bradesco">
                                                <img class="bank" src="img/banks/Bradesco.png">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button style="display:none" class="site-btn">Finalizar Pedido</button>
                        </form>
                        <button id="btncartaodebito" style="float: right;;margin-top: 40px" class="site-btn">Finalizar Pedido</button>
                    </div> 
                </div>
            </div>    
        </div>
    </section>
    
</body>

@endsection