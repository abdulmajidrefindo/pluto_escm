@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Kategori</h1>

@stop

@section('content')
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm">
                <x-adminlte-input type="text" value="{{ $kategori->nama_kategori }}" name="nama_kategori" label="Nama Kategori"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $kategori->keterangan }}" name="keterangan" label="Keterangan"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </div>
    </form>

@stop
