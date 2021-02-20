@component('mail::message')

Ola, Sr(a). {{$nome}}, estamos atendendo o seu pedido ao suporte Apego, 
referente a seguinte mensagem:
<br><br>
<p>> {{$mensagem}}</p>
<br>
<!--@component('mail::button', ['url' => ''])
Button Text
@endcomponent-->
Resposta do suporte:

@component('mail::panel')
{{$resposta}}
@endcomponent

Att Suporte,<br>
{{ config('app.name') }}
@endcomponent
