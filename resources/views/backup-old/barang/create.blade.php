@extends('adminlte::page')

@section('content_header')
    <h1>Tambah Barang</h1>

@stop

@section('content')
<form action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm">
        <x-adminlte-input name="merek_id" label="Merek ID" placeholder="Contoh : 1, 2, 3." fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="produk_id" label="produk ID" placeholder="Contoh : 1, 2, 3." fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="pemasok_id" label="pemasok ID" placeholder="Contoh : 1, 2, 3." fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="sku" label="SKU Barang" placeholder="Contoh : Aqua, Indomie, dll." fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="harga" label="Harga Barang" placeholder="Contoh : pcs, lusin, botol, dll.   " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="total_terjual" label="Total Barang Terjual" placeholder="Contoh : Apa saja " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="total_masuk" label="Total Barang Masuk" placeholder="Contoh : Apa saja " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="total_stok" label="Total Stok Barang" placeholder="Contoh : Apa saja " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />
    </div>
    </div>
</form>
@stop
