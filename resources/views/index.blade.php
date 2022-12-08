@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard (pre-Alpha)</h1>
@stop

@section('content')


    @include('includes.peringatan')

<div class="row">
    <div class="col-12 col-sm-12 col-md-4">
        @include('includes.aksi-cepat')
    </div>

    <div class="col-12 col-sm-8 col-md-8">
        @include('includes.dashboard')
    </div>
</div>
    <div class="row">
        <div class="col-md-8">
            @include('includes.transaksi-terbaru')
        </div>
        <div class="col-md-4">
            @include('includes.produk-terbaru')
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop