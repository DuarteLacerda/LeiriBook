@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Verifica o teu E-mail</h1>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        <h3>Foi enviado um novo email de verificação.</h3>
                    </div>
                    @endif

                    <h4>Antes de continuar, verifique a sua caixa de email.</h4>
                    <h4>Se não receber nenhum email, </h4>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            <h5>carregue aqui para receber um
                                novo.</h5>
                        </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection