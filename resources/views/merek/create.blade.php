@extends('adminlte::page')

@section('content_header')
    <h1>Tambah Merek</h1>

@stop

@section('content')
<form action="{{route('merek.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-sm">
        <x-adminlte-input name="nama_merek" label="Nama Merek" placeholder="Contoh : Indofood" fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Contoh : Indomie Goreng" fgroup-class="col-md-6"
            disable-feedback />
        <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />
    </div>
    </div>
</form>
@stop
