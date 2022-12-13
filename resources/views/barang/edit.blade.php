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

                    <x-adminlte-input type="text" value="ITM{{ $barang->id }}" name="id" label="ID Barang"
                        placeholder="" fgroup-class="col-md-6 col-lg-12" disabled/>

                    <x-adminlte-select2 id="selectProduk" name="produk_id" label="Nama Produk"
                            label-class="text-lightdark" fgroup-class="col-sm-7 col-md-6 col-lg-7"
                            data-placeholder="Pilih produk...">
                            <option/>
                            @foreach ($produk as $produk)
                                <option value="{{ $produk->id }}" {{ $produk->id == $barang->produk_id ? 'selected' : '' }}>{{ $produk->nama_produk }}</option>
                            @endforeach
                        </x-adminlte-select2>

                        <x-adminlte-select2 id="selectMerek" name="merek_id" label="Merek Barang"
                            label-class="text-lightdark" fgroup-class="col-sm-5 col-md-4 col-lg-5"
                            data-placeholder="Pilih merek...">
                            <option/>
                            @foreach ($merek as $merek)
                                <option value="{{ $merek->id }}" {{ $merek->id == $barang->merek_id ? 'selected' : '' }}>{{ $merek->nama_merek }}</option>
                            @endforeach
                        </x-adminlte-select2>



                        <x-adminlte-select2 id="selectPemasok" name="pemasok_id" label="Nama Pemasok"
                            label-class="text-lightdark" fgroup-class="col-md-4 col-lg-12"
                            data-placeholder="Pilih pemasok...">
                            <option/>
                            @foreach ($pemasok as $pemasok)
                                <option value="{{ $pemasok->id }}" {{ $pemasok->id == $barang->pemasok_id ? 'selected' : '' }}>{{ $pemasok->nama_pemasok }}</option>
                            @endforeach
                        </x-adminlte-select2>

                        <x-adminlte-input type="number" value="{{ $barang->sku }}" name="sku" label="Nomor SKU (Stok Keeping Unit)"
                            placeholder="" fgroup-class="col-md-4 col-lg-12"  />

                        <x-adminlte-input type="number" value="{{ $barang->harga }}" name="harga" label="Harga Barang"
                            placeholder="" fgroup-class="col-sm-6 col-md-3 3 col-lg-6"  />

                        <x-adminlte-input type="number" value="{{ $barang->total_terjual }}" name="total_terjual" label="Total Barang Terjual"
                            placeholder="" fgroup-class="col-sm-6 col-md-3 col-lg-6"  />

                        <x-adminlte-input type="number" value="{{ $barang->total_masuk }}" name="total_masuk" label="Total Barang Masuk"
                            placeholder="" fgroup-class="col-sm-6 col-md-3 3 col-lg-6"  />

                        <x-adminlte-input type="number" value="{{ $barang->total_stok }}" name="total_stok" label="Total Stok Barang"
                            placeholder="" fgroup-class="col-sm-6 col-md-3 3 col-lg-6"  />


                </div>

                <div class="row">
                    <div class="col-md-12">
                        <x-adminlte-button class="btn col-12" type="submit" label="Update" theme="primary"
                            icon="fas fa-lg fa-save" />
                    </div>

            </form>
        </div>
    </div>
@stop
