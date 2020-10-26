@extends('layouts.app')

@section('content')

<br><br><br><br><br><br><br><br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificação de E-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, entre em seu e-mail e clique no link de verificação') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique aqui se você não recebeu o link em seu email') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br>

@endsection
