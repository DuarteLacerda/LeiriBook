@extends('layout.admin')
@section('title', 'Eventos - Lista')
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
            <a href="{{ route('admin.eventos.index') }}">Preguntas Frequentes</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.eventos.create') }}';" class="au-btn au-btn-icon au-btn--green">
    <i class="fa fa-plus"></i>add item</button>
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
                    @if (count($eventos))
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning text-center" id="dataTable"
                            width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Pergunta</th>
                                    <th>Estado</th>
                                    <th>Detalhes</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($eventos as $evento)
                                <tr>
                                    <td>{{ $evento->id }}</td>
                                    <td class="text-left">{{ $evento->question }}</td>
                                    <td>{{ (($evento->approved === 0) ? '❌' : '✅') }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-p" data-toggle="modal" data-target="#faqModal"
                                            data-evento="{{ $evento }}">
                                            <i class=" fas fa-eye fa-xs" style="color: white;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-p" href="{{ route('admin.eventos.edit', $evento) }}">
                                            <i class="fas fa-edit fa-xs" style="color: white;"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.eventos.destroy', $evento) }}" role="form"
                                            class="inline"
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
                    <h6>Não existem Perguntas registadas.</h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- FAQ Modal -->
    <div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="faqModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="faqModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times" style="color: blue"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- FAQ details will be inserted here -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('#faqModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var evento = button.data('evento')

        var modal = $(this)
        modal.find('.modal-title').html('Pergunta ' + evento.id + ' - Detalhes');
        modal.find('.modal-body').html('<strong>Pergunta:</strong> ' + evento.question + '<br><hr><strong>Resposta:</strong> ' + evento.answer + '<br><hr><strong>Estado:</strong> ' + ((evento.approved === 0) ? 'Pendente' : 'Aprovado'))
    })
</script>
@endsection
