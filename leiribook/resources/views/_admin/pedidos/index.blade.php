@extends('layout.admin')
@section('title', 'Pedidos - Gerir')
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
            <a href="{{ route('admin.pedidos.index') }}">Pedidos</a>
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
                    @if (count($pedidos))
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning text-center" id="dataTable"
                            width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Imagem</th>
                                    <th>+Info/Editar/Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidos as $pedido)
                                <tr>
                                    <td>{{ $pedido->id }}</td>
                                    <td class="text-left">{{ $pedido->titulo }}</td>
                                    <td>
                                        <img style="width:50px; height:75px" src="{{ asset('storage/' . $pedido->foto) }}">
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-p" data-toggle="modal" data-target="#pedidoModal"
                                            data-pedido="{{ $pedido }}">
                                            <i class=" fas fa-eye fa-xs" style="color: white;"></i>
                                        </a>

                                        <a class="btn btn-warning btn-p" href="{{ route('admin.pedidos.edit', $pedido) }}">
                                            <i class="fas fa-edit fa-xs" style="color: white;"></i>
                                        </a>

                                        <form method="POST" action="{{ route('admin.pedidos.destroy', $pedido) }}" role="form"
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
                    <h6>Não existem pedidos registados</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Modal -->
    <div class="modal fade" id="pedidoModal" tabindex="-1" role="dialog" aria-labelledby="pedidoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pedidoModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times" style="color: blue"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Livros details will be inserted here -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('#pedidoModal').on('show.bs.modal', function (book) {
        var button = $(book.relatedTarget)
        var pedido = button.data('pedido')

        var modal = $(this)
        modal.find('.modal-title').html('Pedido ' + pedido.id + ' - Detalhes');
        modal.find('.modal-body').html('<strong>Titulo:</strong> ' + livro.titulo + '<br><hr><strong>Descrição:</strong> ' + livro.descricao)

    })
</script>
@endsection
