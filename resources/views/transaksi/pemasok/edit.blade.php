@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Data Transaksi</h1>

@stop

@section('content')
    <form action="{{ route('kategori.update', $transaksi_pemasok->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
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

                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </div>
    </form>

@stop
