@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu direccion de correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('un link de verificacion se ha enviado su correo') }}
                        </div>
                    @endif

                    {{ __('Antes de proceder por favor verifica tu correo para poder realizar compras') }}
                    {{ __('Si no recibio el correo') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click aqui para solicitar otro link') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
