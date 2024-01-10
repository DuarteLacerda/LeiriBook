@extends('layout.admin')
@section('title', 'Utilizadores - Lista')
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
            <a href="{{ route('admin.users.index') }}">Utilizadores</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.users.create') }}';" class="au-btn au-btn-icon au-btn--green">
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
                    @if (count($users))
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning text-center" id="dataTable"
                            width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-p" data-toggle="modal" data-target="#userModal"
                                            data-user="{{ $user }}">
                                            <i class=" fas fa-eye fa-xs" style="color: white;"></i>
                                        </a>

                                        <a class="btn btn-warning btn-p" href="{{ route('admin.users.edit', $user) }}">
                                            <i class="fas fa-edit fa-xs" style="color: white;"></i>
                                        </a>

                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                            role="form" class="d-inline"
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
    <!-- USER Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fas fa-times" style="color: blue"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- USER details will be inserted here -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('#userModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var user = button.data('user')
        var imageUrl = "{{ asset('storage/users_photos/') }}/" + user.foto;
        var modal = $(this)
        modal.find('.modal-title').html('Utilizador ' + user.id + ' - Detalhes');
            $('#userModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var user = button.data('user')
                var imageUrl = "{{ asset('storage/users_photos/') }}/" + user.foto;
                var modal = $(this)
                modal.find('.modal-title').html('Utilizador ' + user.id + ' - Detalhes');
                modal.find('.modal-body').html('<strong>Nome:</strong> ' + user.name + '<br><hr>' + '<strong>Email:</strong> ' + user.email + '<br><hr>' + '<strong>Função:</strong> ' + (user.role == 'A' ? 'Administrador' : 'Normal') + '<br><hr>' + '<strong>Foto de perfil:</strong> <img id="preview" src="' + imageUrl + '" alt="" style="height: 100px">');
            })
        })
</script>
@endsection
