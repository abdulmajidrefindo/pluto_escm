@extends('adminlte::page')

@section('content_header')
    <h1>Tambah Barang</h1>

@stop

@section('content')
<form action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm">

        <x-adminlte-select name="nama_produk" label="Nama produk" fgroup-class="col-md-6">
            <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']" disabled="-1"
                empty-option="Pilih Produk.."/>
        </x-adminlte-select>

        <x-adminlte-select name="nama_pemasok" label="Nama Pemasok" fgroup-class="col-md-6">
            <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']" disabled="-1"
                empty-option="Pilih Pemasok.."/>
        </x-adminlte-select>


        <x-adminlte-input name="sku" label="SKU Barang" placeholder="Contoh : Aqua, Indomie, dll." fgroup-class="col-md-6"
            disable-feedback />

        <x-adminlte-input name="harga" label="Harga Barang" placeholder="Contoh : pcs, lusin, botol, dll.   " fgroup-class="col-md-6"
            disable-feedback />

        <x-adminlte-input name="total_stok" label="Total Stok Barang" placeholder="Contoh : Apa saja " fgroup-class="col-md-6"
            disable-feedback />

        <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />
    </div>
    </div>
</form>
@stop
