@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Merek</h1>

@stop

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Update Data</h3>
        </div>

        <div class="card-body">
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

        </div>
    </div>

@stop
