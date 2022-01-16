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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Politicas</span>
                    </div>
                </div>
            </div>
        </div>
    </div> <div class="container">
            <div class="row">
    <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Trocas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Privacidade</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Cookies</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Politica de Trocas</h6>
                                <p>Se você comprou e recebeu um produto que não te serviu, ou não era da cor ou modelo que você queria, 
                                    você tem até <b>30 dias</b> corridos a partir do recebimento para realizar a troca</p>
                                <p>Nosso prazo de garantia contra defeito de fabricação é de <b>90 dias</b> corridos após o recebimento do produto.</p>
                                <p>Para realizar a troca, é necessario comparecer ao depósito Apego da sua cidade, abaixo esta 
                                    a listagem do endereço dos depósitos de cada cidade.</p>
                                <p><span class="icon_circle-slelected"></span> <b>Videira-SC</b> - Bairro Santa Tereza, Rua Arlindo de Mattos 239, APT 303.</p>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Politica de Privacidade</h6>
                                <p>Quando você realiza uma compra ou contrata um serviço na Apego, você nos fornece alguns dados pessoais com o objetivo de viabilizar 
                                    a sua operação. A Apego preza pela segurança dos seus dados, pelo respeito a sua privacidade e pela transparência com você e, por isso, 
                                    dedicamos este documento para explicar como os seus dados pessoais serão tratados pela Apego e quais são as medidas que aplicamos para mantê-los seguros.
                                </p>
                                <p>Dados recolhidos para cadastro: 
                                    <b>Nome completo, Número de CPF, Endereço de e-mail, Número de celular, Data de nascimento e dados referentes aos seus endereços.</b>
                                </p>
                                <p>
                                    Nós utilizamos os dados pessoais para garantir um atendimento de qualidade e uma melhor experiência na sua compra.
                                </p>
                                <p>
                                    Com quem nós podemos compartilhar os dados pessoais além da empresa Apego: 
                                    <b>Autoridades judiciais, policiais ou governamentais:</b> nós devemos fornecer dados pessoais de Clientes e/ou Usuários, 
                                    em atendimento à ordem judicial, solicitações de autoridades administrativas, obrigação legal ou regulatória, 
                                    bem como para agir de forma colaborativa com autoridades governamentais, em geral em investigações envolvendo atos ilícitos.
                                </p>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Politica de Cookies</h6>
                                <p>Os cookies são pequenos arquivos criados e salvos no em seu navegador com finalidade de melhorar 
                                    o desempenho em nosso website. As informações não o identificam diretamente e podem oferecer uma melhor experiência na web.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>

</body>

@endsection

</html>