@extends('adminlte::page')

@section('content_header')
    <h1>Edit Transaksi</h1>

@stop

@section('content')
    <form action="{{ route('transaksiPelanggan.update', $transaksiPelanggan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm">
                <x-adminlte-select2 id="selectPelanggan" name="pelanggan_id" label="Pelanggan"
                    label-class="text-lightblue" fgroup-class="col-md-6"
                    data-placeholder="Pilih pelanggan...">
                    <option/>
                    @foreach ($pelanggan as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                    @endforeach
                </x-adminlte-select2>


                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>



        </div>
    </form>

    <table>

@stop
