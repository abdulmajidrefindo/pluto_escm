@extends('adminlte::page')

@section('content_header')
    <h1>Tambah Pemasok</h1>

@stop

@section('content')
<form action="{{route('pemasok.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm">
        <x-adminlte-input name="nama_pemasok" label="Nama Pemasok" placeholder="Contoh : Ivan" fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="alamat_pemasok" label="Alamat Pemasok" placeholder="Contoh : Jl. Kedawung No.38 Blok 9, Kel. Bojongkaret, Kec. Telukasin, Kab. Wadahok, Provinsi Banten " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="kontak_pemasok" label="Kontak Pemasok" placeholder="Contoh : 081xxxxxxxx " fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />
    </div>
    </div>
</form>
@stop
