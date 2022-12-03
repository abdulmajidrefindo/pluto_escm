@extends('adminlte::page')

@section('content_header')
    <h1>Tambah Produk</h1>

@stop

@section('content')
<form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm">
        <x-adminlte-input name="nama_produk" label="Nama Produk" placeholder="Contoh : Aqua, Indomie, dll." fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="unit" label="Unit" placeholder="Contoh : pcs, lusin, botol, dll.   " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Contoh : Apa saja " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />
    </div>
    </div>
</form>
@stop
