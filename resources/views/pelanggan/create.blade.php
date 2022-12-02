@extends('adminlte::page')

@section('content_header')
    <h1>Tambah Pelanggan</h1>

@stop

@section('content')
<form action="{{route('pelanggan.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm">
        <x-adminlte-input name="nama_pelanggan" label="Nama Pelanggan" placeholder="Contoh : Ivan" fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="alamat_pelanggan" label="Alamat Pelanggan" placeholder="Contoh : Jl. Kedawung No.38 Blok 9, Kel. Bojongkaret, Kec. Telukasin, Kab. Wadahok, Provinsi Banten " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="kontak_pelanggan" label="Kontak Pelanggan" placeholder="Contoh : 081xxxxxxxx " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />
    </div>
    </div>
</form>
@stop
