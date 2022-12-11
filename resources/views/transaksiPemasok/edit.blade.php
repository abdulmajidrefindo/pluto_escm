@extends('adminlte::page')

@section('content_header')
    <h1>Edit Transaksi</h1>

@stop

@section('content')
    <form action="{{ route('transaksiPemasok.update', $transaksiPemasok->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm">
                <x-adminlte-select2 id="selectPemasok" name="pemasok_id" label="Pemasok"
                    label-class="text-lightblue" fgroup-class="col-md-6"
                    data-placeholder="Pilih pemasok...">
                    <option/>
                    @foreach ($pemasok as $pemasok)
                        <option value="{{ $pemasok->id }}">{{ $pemasok->nama_pemasok }}</option>
                    @endforeach
                </x-adminlte-select2>


                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>



        </div>
    </form>

    <table>

@stop
