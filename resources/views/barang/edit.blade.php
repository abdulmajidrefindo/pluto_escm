@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Barang</h1>

@stop

@section('content')
    <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm">
                <x-adminlte-input type="text" value="{{ $barang->merek_id }}" name="merek_id" label="Merek ID"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $barang->produk_id }}" name="produk_id" label="Produk ID"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />

                <x-adminlte-input type="text" value="{{ $barang->pemasok_id }}" name="pemasok_id" label="Pemasok ID"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $barang->sku }}" name="sku" label="Nama Barang"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $barang->harga }}" name="harga" label="Harga Barang"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $barang->total_terjual }}" name="total_terjual" label="Total Barang Terjual"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $barang->total_masuk }}" name="total_masuk" label="Total Barang Masuk"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $barang->total_stok }}" name="total_stok" label="Total Stok Barang"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>



        </div>
    </form>

    <table>

@stop
