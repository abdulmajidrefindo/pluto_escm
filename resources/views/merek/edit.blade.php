@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Merek</h1>

@stop

@section('content')
    <form action="{{ route('merek.update', $merek->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm">
                <x-adminlte-input type="text" value="{{ $merek->nama_merek }}" name="nama_merek" label="Nama Merek"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $merek->keterangan }}" name="keterangan" label="Keterangan"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </div>
    </form>

@stop
