@extends('adminlte::page')

@section('content_header')
    <h1>Tambah Transaksi Pemasok</h1>

@stop

@section('content')
<form action="{{route('transaksiPemasok.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm">
        <x-adminlte-select name="nama_pemasok" label="Pemasok" fgroup-class="col-md-6">
            <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']" disabled="-1"
                empty-option="Pilih Pemasok.."/>
        </x-adminlte-select>

        <x-adminlte-select name="barang_id" label="Barang ID" fgroup-class="col-md-6">
            <x-adminlte-options :options="['Option 1', 'Option 2', 'Option 3']" disabled="-1"
                empty-option="Pilih ID Barang.."/>
        </x-adminlte-select>

        <x-adminlte-input type="text" name="kuantitas" label="Kuantitas"
            placeholder="" fgroup-class="col-md-6" disable-feedback />

        <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />

    </div>
    </div>
</form>
@stop
