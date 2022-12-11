@extends('adminlte::page')

@section('content_header')
    <h1>Merek</h1>

@stop

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Update Data</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('merek.update', $merek->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm">
                        <x-adminlte-input type="text" value="{{ $merek->nama_merek }}" name="nama_merek"
                            label="Nama Merek" placehsolder="" fgroup-class="col-md-6" disable-feedback />
                        <x-adminlte-input type="text" value="{{ $merek->keterangan }}" name="keterangan"
                            label="Keterangan" placeholder="" fgroup-class="col-md-6" disable-feedback />
                        <x-adminlte-button class="btn" type="submit" label="Simpan" theme="success"
                            icon="fas fa fa-fw fa-save" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
