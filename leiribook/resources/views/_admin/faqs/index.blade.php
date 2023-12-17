@extends('layout.admin')
@section('title', 'FAQS - Lista')
@section('breadcrumb')
<div class="au-breadcrumb-left">
    <span class="au-breadcrumb-span">You are here:</span>
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
            <a href="{{ route('admin.faqs.index') }}">Preguntas Frequentes</a>
        </li>
    </ul>
</div>
<div>
    <button onclick="location.href='{{ route('admin.faqs.create') }}';" class="au-btn au-btn-icon au-btn--green">
        <i class="fa fa-plus"></i>add item</button>
</div>
@endsection

@section('content')
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <br>
                    <h1>Lista</h1>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="section__content section__content--p15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning text-center">
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
                                @foreach ($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->id }}</td>
                                    <td class="text-left">{{ $faq->question }}</td>
                                    <td>{{ $faq->approved }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-p" data-toggle="modal" data-target="#faqModal"
                                            data-faq="{{ $faq }}">
                                            <i class=" fas fa-eye fa-xs"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-p" href="{{ route('admin.faqs.edit', $faq) }}">
                                            <i class="fas fa-edit fa-xs"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" role="form"
                                            class="inline"
                                            onsubmit="return confirm('Confirma que pretende eliminar este registo?');">
                                            <button type="submit" class="btn btn-danger btn-p"><i
                                                    class="fas fa-trash fa-xs"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                    <h5 class="modal-title" id="faqModalLabel">FAQ Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- FAQ details will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        var faq = button.data('faq')

        var modal = $(this)
        modal.find('.modal-body').text('FAQ ID: ' + faq.id + ', Question: ' + faq.question + ', Aprovado (1=S, 0=N): ' + faq.approved)
    })
</script>
@endsection
