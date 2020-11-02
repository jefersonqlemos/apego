
<!DOCTYPE html>
<html>

@extends('admin.layouts.app')

@section('content')
 
 <head>
 
     <meta http-equiv="refresh" content="20"> 
 
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
     
 
 </head>
 
 <body>
 
     <div class="container">
         <div class="row">
 
         <br>
         
         <form action="/admin" method="get" id="form">
             <button type="submit" class="btn btn-default btn-sm">
                 <span class="glyphicon glyphicon-arrow-left"></span> Voltar
             </button>
         </form>
 
         <h1 style="text-align:center;font-weight:bold;margin-bottom:50px">LISTA PEDIDOS</h1>

             <div class="col-md-16 col-md-offset-0">
 
                 <table class="table table-bordered">
 
                     <tr>
                         <th class="text-center">ID do Pedido</th>
                         <th class="text-center">Valor Total</th>
                         <th class="text-center">Status do pedido</th>
                         <th class="text-center">Data do pedido</th>
                     </tr>
 
                     @foreach($pedidos as $pedido)
 
                         <tr align="center">
                             <td style="vertical-align:middle">{{$pedido->idpedidos}}</td>
                             <td style="vertical-align:middle">R$ {{$pedido->valortotal}}</td>
                             
                             @if($pedido->status_idstatus==1 || $pedido->status_idstatus==2 || $pedido->status_idstatus==3 || $pedido->status_idstatus==100)
                                <td style="vertical-align:middle">
                                    <b>{{ $pedido->status }}</b>
                                </td>
                            @else
                                <td style="vertical-align:middle">
                                    {{ $pedido->status }}
                                </td>
                            @endif

                                <td style="vertical-align:middle">
                                    {{ date('d/m/Y H:i:s', strtotime($pedido->created_at)) }}
                                </td>

                             <td style="vertical-align:middle">
                             <form action="/pedidos/{{$pedido->idpedidos}}" method="get">
                                 <input type="submit" value="Visualizar">
                             </form></td>
                            
                         </tr>
 
                     @endforeach
 
                 </table>

                 {{ $pedidos->links() }}
                 <br><br><br><br><br><br>
 
             </div>
         </div>
     </div>
 </body>
 
 @endsection

 </html>