@extends('layout.admin')
@section('title', 'Eventos - Fotos - Lista')
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
                <a href="{{ route('admin.eventos.index') }}">Eventos</a>
            </li>
            <li class="list-inline-item seprate">
                <span>/</span>
            </li>
            <li class="list-inline-item active">
                <a href="{{ route('admin.evento_fotos.index', $evento) }}">Fotos</a>
            </li>
        </ul>
    </div>
    <button onclick="location.href='{{ route('admin.evento_fotos.create', $evento) }}';"
        class="au-btn au-btn-icon au-btn--green">
        <i class="fa fa-plus"></i>Adicionar Foto</button>
@endsection

@section('content')
    <section>
        <div class="section__content section__content--p20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <h1>Fotos do Evento: {{ $evento->nome }}</h1>
                        <br>
                        @if (count($fotos))
                            <div class="table-responsive table--no-card m-b-30">
                                <table class="table table-borderless table-striped table-earning text-center" id="dataTable"
                                    width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Imagem</th>
                                            <th>ID</th>
                                            <th>Ordem</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fotos as $foto)
                                            <tr>
                                                <td class="text-center">
                                                    <img src=" {{ asset('storage/eventos_fotos/' . $foto->foto) }}"
                                                        width="100" alt="Foto do evento">
                                                </td>
                                                <td class="text-center">{{ $foto->id }}</td>
                                                <td class="text-center">{{ $foto->ordem }}</td>

                                                <td>
                                                    <a class="btn btn-primary btn-p" data-toggle="modal"
                                                        data-target="#fotoModal" data-foto="{{ $foto }}"
                                                        data-imagem="{{ asset('storage/eventos_fotos/' . $foto->foto) }}">
                                                        <i class=" fas fa-eye fa-xs" style="color: white;"></i>
                                                    </a>

                                                    <a class="btn btn-warning btn-p"
                                                        href="{{ route('admin.evento_fotos.edit', [$evento, $foto]) }}">
                                                        <i class="fas fa-edit fa-xs" style="color: white;"></i>
                                                    </a>

                                                    <form method="POST"
                                                        action="{{ route('admin.evento_fotos.destroy', [$evento, $foto]) }}"
                                                        role="form" class="d-inline"
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
                            <h6>Não existem fotos registadas</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- FAQ Modal -->
        <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fotoModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times" style="color: blue"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Eventos details will be inserted here -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('#fotoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var foto = button.data('foto')
            var imagem = button.data('imagem')

            var modal = $(this)
            modal.find('.modal-title').html('Foto ' + foto.id + ' - Detalhes');
            modal.find('.modal-body').html('<img src="' + imagem + '" alt="Imagem do evento">' + '<br><hr><strong>Descrição:</strong> ' + foto.titulo + '<br><hr><strong>Ordem:</strong> ' + foto.ordem);

        })
    </script>
@endsection
