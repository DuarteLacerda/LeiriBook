@extends('layout.admin')
@section('title', 'Géneros deste livro - Lista')
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
            <a href="{{ route('admin.livros_categorias.index', ['id' => $livro->id]) }}">Géneros deste livro</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.livros_categorias.create', ['livroId' => $livro->id]) }}';" class="au-btn au-btn-icon au-btn--green">
    <i class="fa fa-plus"></i>Adicionar novo género a este livro</button>
@endsection

@section('content')
<section>
    <div class="section__content section__content--p20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h1>{{ $livro->titulo }}</h1>
                    <br>
                    @if ($livro->categorias->isNotEmpty())
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning text-center" id="dataTable"
                            width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Géneros</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($livro->categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->nome }}</td>
                                    <td>

                                        <form method="POST" action="{{ route('admin.livros_categorias.destroy', ['livro' => $livro, 'categoria' => $categoria]) }}" role="form"
                                            class="d-inline"
                                            onsubmit="return confirm('Confirma que pretende eliminar este registo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-p"><i
                                                    class="fas fa-trash fa-xs" style="color: white;"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <h6>Este livro não tem géneros</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Modal -->
    <div class="modal fade" id="livro_categoriasModal" tabindex="-1" role="dialog" aria-labelledby="livro_categoriasModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="livro_categoriasModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times" style="color: blue"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Livros_categorias details will be inserted here -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
