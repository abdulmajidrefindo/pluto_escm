@extends('adminlte::page')

@section('content_header')
    <h1>Merubah Barang</h1>

@stop

@section('content')
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Update Data</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm">

                        <x-adminlte-select2 id="selectMerek" name="merek_id" label="Merek Barang"
                            label-class="text-lightdark" fgroup-class="col-md-6"
                            data-placeholder="Pilih merek...">
                            <option/>
                            @foreach ($merek as $merek)
                                <option value="{{ $merek->id }}">{{ $merek->nama_merek }}</option>
                            @endforeach
                        </x-adminlte-select2>

                        <x-adminlte-select2 id="selectProduk" name="merek_id" label="Nama Produk"
                            label-class="text-lightdark" fgroup-class="col-md-6"
                            data-placeholder="Pilih produk...">
                            <option/>
                            @foreach ($produk as $produk)
                                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                            @endforeach
                        </x-adminlte-select2>

                        <x-adminlte-select2 id="selectPemasok" name="pemasok_id" label="Nama Pemasok"
                            label-class="text-lightdark" fgroup-class="col-md-6"
                            data-placeholder="Pilih pemasok...">
                            <option/>
                            @foreach ($pemasok as $pemasok)
                                <option value="{{ $pemasok->id }}">{{ $pemasok->nama_pemasok }}</option>
                            @endforeach
                        </x-adminlte-select2>

                        <x-adminlte-input type="text" value="{{ $barang->sku }}" name="sku" label="Nama Barang"
                            placeholder="" fgroup-class="col-md-6" disable-feedback />

                        <x-adminlte-input type="text" value="{{ $barang->harga }}" name="harga" label="Harga Barang"
                            placeholder="" fgroup-class="col-md-6" disable-feedback />

                        <x-adminlte-input type="text" value="{{ $barang->total_terjual }}" name="total_terjual" label="Total Barang Terjual"
                            placeholder="" fgroup-class="col-md-6" disable-feedback />

                        <x-adminlte-input type="text" value="{{ $barang->total_masuk }}" name="total_masuk" label="Total Barang Masuk"
                            placeholder="" fgroup-class="col-md-6" disable-feedback />

                        <x-adminlte-input type="text" value="{{ $barang->total_stok }}" name="total_stok" label="Total Stok Barang"
                            placeholder="" fgroup-class="col-md-6" disable-feedback />

                        <x-adminlte-button class="btn-lg" type="submit" label="Perbaharui Data" theme="success"
                            icon="fas fa-lg fa-save" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
