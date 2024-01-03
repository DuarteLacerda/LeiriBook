@extends('layout.admin')
@section('title', 'Utilizadores - Editar')
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
            <a href="{{ route('profile', $user) }}">Perfil</a>
        </li>
    </ul>
</div>
<button onclick="location.href='{{ route('admin.faqs.index') }}';" class="au-btn au-btn-icon au-btn--green">
    <i class="fa fa-arrow-left"></i>Voltar
</button>
@endsection

@section('content')
<section>
    <div class="section__content section__content--p20">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="col-12">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Perfil</h3>
                            </div>
                            <hr>
                            <form action="{{ route('admin.users.update', $user) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">Nome:</label>
                                            <input id="name" name="name" type="text" class="form-control"
                                                aria-required="true" aria-invalid="false" placeholder="Ana Matias"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    @if(Auth::user()->role == 'A')
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="password" class="control-label mb-1">Password:</label>
                                            <button type="button" class="eye1" onclick="previewpass()">
                                                <i class="fas fa-eye-slash" style="color: #4272d7;" id="eye"></i>
                                            </button>
                                            <input id="password" name="password" type="password" class="form-control"
                                                aria-required="true" aria-invalid="false" placeholder="2y@2d$gd"
                                                value="{{ $user->password }}">
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">Email:</label>
                                            <input id="email" name="email" type="email" class="form-control cc-exp"
                                                aria-required="true" aria-invalid="false"
                                                placeholder="example@example.com" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="foto" class=" form-control-label">Inserir</label>
                                            <input type="file" id="foto" name="foto" class="form-control-file"
                                                onchange="previewFile()">
                                        </div>
                                        @if (old('file', $user->foto))
                                        <img src="{{ asset('storage/users_photos/' . old('file', $user->foto)) }}"
                                            alt="" style="height: 150px">
                                        @endif
                                        <img id="preview" src="" alt="" style="height: 150px">
                                        <form method="POST" action="{{ route('profile.destroyPhotoProfile', $user) }}"
                                            class="inline"
                                            onsubmit="return confirm('Confirma que pretende eliminar esta foto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="deletePhoto()"><i
                                                    class="fas fa-trash fa-sm" style="color: white;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @can('updateRole', $user)
                                <div class="form-group">
                                    <label for="inputRole">Previlégios</label>
                                    <select name="role" id="inputRole" class="form-control">
                                        <option value="A" {{ old('role', $user->role) == 'A' ? 'selected' : '' }}>
                                            Administrador
                                        </option>
                                        <option value="N" {{ old('role', $user->role) == 'N' ? 'selected' : '' }}>
                                            Normal
                                        </option>
                                    </select>
                                </div>
                                @endcan
                                <br>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-edit fa-xl"></i>&nbsp;
                                        <span id="payment-button-amount">Editar</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    function previewFile() {
        const preview = document.querySelector('#preview');
        const file = document.querySelector('#foto').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    };

    function previewpass() {
        var x = document.getElementById("password");
        var eye = document.getElementById("eye");
        if (x.type === "password") {
            x.type = "text";
            eye.classList.remove('fa-eye-slash');
            eye.classList.add('fa-eye');
        } else {
            x.type = "password";
            eye.classList.remove('fa-eye');
            eye.classList.add('fa-eye-slash');
        }
    };

    function deletePhoto() {
        var x = document.getElementById("foto");
        var y = document.getElementById("preview");
        x.value = "";
        y.src = "";
    };
</script>
@endsection