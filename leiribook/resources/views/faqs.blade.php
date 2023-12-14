@extends('layout.master')
@section('title', 'LeiriBook - FAQS')

@section('content')
<div class="container" id="faq-container" style="margin-top: 5rem">
    @foreach ($faqs as $faq)
    <div class="card mb-3" style="display: none;">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                {{ $faq->question }}
            </h5>
            <button class="btn" data-toggle="collapse" data-target="#collapse1" aria-expanded="true"
                aria-controls="collapse1">
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>
        <div id="collapse1" class="collapse">
            <div class="card-body">
                {{ $faq->answer }}
            </div>
        </div>
    </div>
    @endforeach


</div>
@endsection

@section('scripts')
<script src="{{ asset('js/duarte-faqs.js') }}"></script>
@endsection