@extends('layout.admin')
@section('title', 'FAQS - Lista')
@section('breadcrumb')
<ul class="list-unstyled list-inline au-breadcrumb__list">
    <li class="list-inline-item">
        <p>Home</p>
    </li>
    <li class="list-inline-item seprate">
        <span>/</span>
    </li>
    <li class="list-inline-item active">
        <a href="{{ route('admin.dashboard') }}">Dashboard<a>
    </li>
    <li class="list-inline-item seprate">
        <span>/</span>
    </li>
    <li class="list-inline-item active">
        <a href="{{ route('admin.faqs.index') }}">Faqs<a>
    </li>
</ul>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <br>
            <h1>Lista</h1>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-12 m-b-30">
            <table class="table-responsive table-striped table-earning">
                <thead>
                    <tr>
                        <th>date</th>
                        <th>order ID</th>
                        <th>name</th>
                        <th class="text-right">price</th>
                        <th class="text-right">quantity</th>
                        <th class="text-right">total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2018-09-29 05:57</td>
                        <td>100398</td>
                        <td>iPhone X 64Gb Grey</td>
                        <td class="text-right">$999.00</td>
                        <td class="text-right">1</td>
                        <td class="text-right">$999.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection