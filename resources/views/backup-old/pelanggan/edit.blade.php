@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Merek</h1>

@stop

@section('content')
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm">
                <x-adminlte-input type="text" value="{{ $pelanggan->nama_pelanggan }}" name="nama_pelanggan" label="Nama Pelanggan"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $pelanggan->alamat_pelanggan }}" name="alamat_pelanggan" label="Alamat Pelanggan"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $pelanggan->kontak_pelanggan }}" name="kontak_pelanggan" label="Kontak Pelanggan"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </div>
    </form>

@stop
