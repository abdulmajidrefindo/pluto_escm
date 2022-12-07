@extends('adminlte::page')

@section('content_header')
    <h1>Kategori</h1>

@stop

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Update Data</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm">
                        <x-adminlte-input type="text" value="{{ $kategori->nama_kategori }}" name="nama_kategori"
                            label="Nama Kategori" placeholder="" fgroup-class="col-md-6" disable-feedback />
                        <x-adminlte-input type="text" value="{{ $kategori->keterangan }}" name="keterangan"
                            label="Keterangan" placeholder="" fgroup-class="col-md-6" disable-feedback />
                        <x-adminlte-button class="btn" type="submit" label="Simpan" theme="success"
                            icon="fas fa fa-fw fa-save" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
