@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Produk</h1>

@stop

@section('content')
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-sm">
                <x-adminlte-input type="text" value="{{ $produk->nama_produk }}" name="nama_produk" label="Nama Produk"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $produk->unit }}" name="unit" label="Unit"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />
                <x-adminlte-input type="text" value="{{ $produk->keterangan }}" name="keterangan" label="Keterangan"
                    placeholder="" fgroup-class="col-md-6" disable-feedback />

                <x-adminlte-select2 id="selectKategori" name="kategori_id" label="Nama Kategori"
                    label-class="text-lightdark" fgroup-class="col-md-6"
                    data-placeholder="Pilih kategori...">
                    <option/>
                    @foreach ($kategori as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </x-adminlte-select2>

                <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                    icon="fas fa-lg fa-save" />
            </div>
        </div>
    </form>

@stop
