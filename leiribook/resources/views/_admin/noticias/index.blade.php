@extends('layout.admin')
@section('title', 'Notícias - Lista')
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
            <a href="{{ route('admin.noticias.index') }}">Notícias</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.noticias.create') }}';" class="au-btn au-btn-icon au-btn--green">
    <i class="fa fa-plus"></i>Adicionar Notícia</button>
@endsection

@section('content')
<section>
    <div class="section__content section__content--p20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h1>Notícias</h1>
                    <br>
                    @if (count($noticias))
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning text-center" id="dataTable"
                            width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>ID</th>
                                    <th>Data</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($noticias as $noticia)
                                <tr>
                                    <td class="text-center">
                                        <img src=" {{ asset('storage/noticias/' . $noticia->foto) }}"
                                            width="100" alt="Foto da notícia">
                                    </td>
                                    <td>{{ $noticia->id }}</td>
                                    <td class="text-center">{{ $noticia->data }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-p" data-toggle="modal" data-target="#noticiaModal"
                                            data-noticia="{{ $noticia }}" data-user="{{ $noticia->usuario }}">
                                            <i class=" fas fa-eye fa-xs" style="color: white;"></i>
                                        </a>

                                        <a class="btn btn-warning btn-p" href="{{ route('admin.noticias.edit', $noticia) }}">
                                            <i class="fas fa-edit fa-xs" style="color: white;"></i>
                                        </a>

                                        <form method="POST" action="{{ route('admin.noticias.destroy', $noticia) }}" role="form"
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
                    <h6>Não existem Notícias registados</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Modal -->
    <div class="modal fade" id="noticiaModal" tabindex="-1" role="dialog" aria-labelledby="noticiaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noticiaModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times" style="color: blue"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Noticias details will be inserted here -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('#noticiaModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var noticia = button.data('noticia')
        var user = button.data('user')
        var modal = $(this)
        modal.find('.modal-title').html('Notícia ' + noticia.id + ' - Detalhes');
        modal.find('.modal-body').html('<img src="{{ asset('storage/noticias/') }}/' + noticia.foto + '" alt="Imagem da notícia">' + '<br><hr><strong>Título:</strong> ' + noticia.titulo + '<br><hr><strong>Descrição:</strong> ' + noticia.descricao + '<br><hr><strong>Data:</strong> ' + noticia.data + '<br><hr><strong>Criado por:</strong> ' + user.name);
    })
</script>
@endsection
