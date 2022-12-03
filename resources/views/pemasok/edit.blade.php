@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Merek</h1>

@stop

@section('content')
    <form action="{{ route('pemasok.update', $pemasok->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm">
                <x-adminlte-input type="text" value="{{ $pemasok->nama_pemasok }}" name="nama_pemasok" label="Nama Pemasok"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $pemasok->alamat_pemasok }}" name="alamat_pemasok" label="Alamat Pemasok"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $pemasok->kontak_pemasok }}" name="kontak_pemasok" label="Kontak Pemasok"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </div>
    </form>

@stop
