@extends('layout.admin')
@section('title', 'Avaliações - Lista')
@section('breadcrumb')
    <div class="au-breadcrumb-left">
        <span class="au-breadcrumb-span">Tu estás aqui:</span>
        <ul class="list-unstyled list-inline au-breadcrumb__list">
            <li class="list-inline-item">
                <p>Home</p>
            </li>
            <li class="list-inline-item seprate">
                <span>/</span>
            </li>
            <li class="list-inline-item active">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="list-inline-item seprate">
                <span>/</span>
            </li>
            <li class="list-inline-item active">
                <a href="{{ route('admin.avaliacoes.index') }}">Avaliações</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <section>
        <div class="section__content section__content--p20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <h1>Lista</h1>
                        <br>
                        @if (count($avaliacoes))
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning text-center" id="dataTable"
                                    width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Descrição</th>
                                            <th>Nível</th>
                                            <th>Utilizador</th>
                                            <th>Livro</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($avaliacoes as $avaliacao)
                                            <tr>
                                                <td>{{ $avaliacao->id }}</td>
                                                <td class="text-left">{{ $avaliacao->descricao }}</td>
                                                <td>{{ $avaliacao->nivel }}</td>
                                                <td>{{ $avaliacao->user_id }}</td>
                                                <td>{{ $avaliacao->livro_id }}</td>
                                                <td>
                                                    <form method="POST"
                                                        action="{{ route('admin.avaliacoes.destroy', $avaliacao) }}"
                                                        role="form" class="inline"
                                                        onsubmit="return confirm('Confirma que pretende eliminar este registo?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-p"><i
                                                                class="fas fa-trash fa-xs"
                                                                style="color: white;"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h6>Não existe nenhuma Avaliação registada.</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
