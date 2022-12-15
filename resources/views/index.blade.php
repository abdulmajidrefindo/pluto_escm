@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>


@stop

@section('content')

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            @include('includes.dashboard')
        </div>
    </div>

    <div class="row">

        <div class="col-12 col-sm-12 col-md-12">
            @include('includes.peringatan')
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            @include('includes.transaksi-terbaru')
        </div>
        <div class="col-md-4">
            @include('includes.produk-terlaris')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('includes.grafik-penjualan')
        </div>



    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
