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
    <button onclick="location.href='{{ route('admin.avaliacoes.create') }}';" class="au-btn au-btn-icon au-btn--green">
        <i class="fa fa-plus"></i>Nova Avaliação</button>
@endsection

@section('content')
    <section>
        <div class="section__content section__content--p20">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <br>
                        <h1>Avaliações</h1>
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
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($avaliacoes as $avaliacao)
                                            <tr>
                                                <td>{{ $avaliacao->id }}</td>
                                                <td class="text-left">
                                                    {{ Str::limit($avaliacao->descricao, 20) }}
                                                </td>
                                                <td>{{ $avaliacao->nivel }}</td>
                                                <td>{{ $avaliacao->user->name }}</td>
                                                <td>{{ $avaliacao->livro->titulo }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-p" data-toggle="modal"
                                                        data-target="#avaliacaoModal" data-avaliacao="{{ $avaliacao }}">
                                                        <i class=" fas fa-eye fa-xs" style="color: white;"></i>
                                                    </a>
                                                    <a class="btn btn-warning btn-p"
                                                        href="{{ route('admin.avaliacoes.edit', $avaliacao) }}">
                                                        <i class="fas fa-edit fa-xs" style="color: white;"></i>
                                                    </a>
                                                    <form method="POST"
                                                        action="{{ route('admin.avaliacoes.destroy', $avaliacao) }}"
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
                            <h6>Não existe nenhuma Avaliação registada.</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Avaliacao Modal -->
        <div class="modal fade" id="avaliacaoModal" tabindex="-1" role="dialog" aria-labelledby="avaliacaoModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="avaliacaoModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fas fa-times" style="color: blue"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('#avaliacaoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var avaliacao = button.data('avaliacao')

            var modal = $(this)
            modal.find('.modal-title').html('Avaliação Número: ' + avaliacao.id + ' - Detalhes');
            modal.find('.modal-body').html('<strong>Descrição:</strong> ' + avaliacao.descricao +
                '<br><hr><strong>Nível:</strong> ' + avaliacao.nivel + '<br><hr><strong>Livro:</strong> ' +
                avaliacao.livro.titulo +'<br><hr><strong>Utilizador:</strong> ' +avaliacao.user.name)
        })
    </script>
@endsection
