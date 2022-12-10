@php

    $heads = ['ID', 'Nama', 'Merek', 'Pemasok', 'SKU', 'Harga', 'Total Terjual', 'Total Masuk', 'Total Stok', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[0, 'desc']],
        'columns' => [null, null, null, null, null, null, null, null, null, ['orderable' => false]],
    ];
@endphp

@php

@endphp

@extends('adminlte::page')

@section('plugins.Select2', true)

@section('title', 'Barang')

@section('content_header')
    <h1>Daftar Barang</h1>
@stop

@section('content')



    <div class="card card-dark card-tabs">
        <div class="card-header p-0 pt-1">
            <div class="card-tools">

                <!-- This will cause the card to maximize when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <!-- This will cause the card to collapse when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

            </div>

            <ul class="nav nav-tabs" id="barang-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="barang-tabs-table-tab" data-toggle="pill" href="#barang-tabs-table"
                        role="tab" aria-controls="barang-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="barang-tabs-add-tab" data-toggle="pill" href="#barang-tabs-add" role="tab"
                        aria-controls="barang-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Barang
                        Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="barangTabContent">
                <div class="tab-pane active show" id="barang-tabs-table" role="tabpanel"
                    aria-labelledby="barang-tabs-table-tab">
                    <x-adminlte-datatable id="barang-table" :heads="$heads" theme="light" :config="$config" striped
                        hoverable beautify with-footer>
                        @foreach ($barang as $barang)
                            <tr>
                                <td>
                                    {{ $barang->id }}
                                </td>
                                <td>
                                    {{ $barang->produk->nama_produk }}
                                </td>
                                <td>
                                    {{ $barang->merek->nama_merek }}
                                </td>
                                <td>
                                    {{ $barang->pemasok->nama_pemasok }}
                                </td>
                                <td>
                                    {{ $barang->sku }}
                                </td>
                                <td>
                                    {{ $barang->harga }}
                                </td>
                                <td>
                                    {{ $barang->total_terjual }}
                                </td>
                                <td>
                                    {{ $barang->total_masuk }}
                                </td>
                                <td>
                                    {{ $barang->total_stok }}
                                </td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('barang.edit', $barang->id) }}"
                                            class="btn btn-sm btn-primary mx-1 shadow" title="Edit">
                                            <i class="fa fa-fw fa-pen"></i> Edit
                                        </a>
                                        <button data-toggle="modal" data-target="#modalBarangDetail"
                                            data-id="{{ $barang->id }}" data-sku="{{ $barang->sku }}"
                                            data-harga="{{ $barang->harga }}"
                                            data-total-terjual="{{ $barang->total_terjual }}"
                                            data-total-masuk="{{ $barang->total_masuk }}"
                                            data-total-stok="{{ $barang->total_masuk }}"
                                            class="btn btn-sm btn-success mx-1 shadow" title="Detail">
                                            <i class="fa fa-fw fa-eye"></i> Detail
                                        </button>
                                        <?php //  <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i>
                                        ?> </a>

                                        <button data-toggle="modal" data-target="#modalbarang"
                                            data-id="{{ $barang->id }}" data-sku="{{ $barang->sku }}"
                                            data-harga="{{ $barang->harga }}"
                                            data-total-terjual="{{ $barang->total_terjual }}"
                                            data-total-masuk="{{ $barang->total_masuk }}"
                                            data-total-stok="{{ $barang->total_masuk }}"
                                            class="delete btn btn-sm btn-danger mx-1 shadow" title="Hapus">
                                            <i class="fa fa-fw fa-trash"></i> Hapus
                                        </button>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
                <div class="tab-pane fade" id="barang-tabs-add" role="tabpanel" aria-labelledby="barang-tabs-add-tab">

                    <!-- Form input barang -->

                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <x-adminlte-select2 id="selectProduk" name="produk_id" label="Produk"
                                    label-class="text-lightblue" fgroup-class="col-md-6"
                                    data-placeholder="Pilih produk...">
                                    <option/>
                                    @foreach ($produk as $produk)
                                        <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-select2 id="selectMerek" name="merek_id" label="Merek Barang"
                                    label-class="text-lightblue" fgroup-class="col-md-6"
                                    data-placeholder="Pilih merek...">
                                    <option/>
                                    @foreach ($merek as $merek)
                                        <option value="{{ $merek->id }}">{{ $merek->nama_merek }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-select2 id="selectPemasok" name="pemasok_id" label="Pemasok"
                                    label-class="text-lightblue" fgroup-class="col-md-6"
                                    data-placeholder="Pilih pemasok...">
                                    <option/>
                                    @foreach ($pemasok as $pemasok)
                                        <option value="{{ $pemasok->id }}">{{ $pemasok->nama_pemasok }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-input name="sku" label="SKU Barang" label-class="text-lightblue"
                                    placeholder="Contoh : Aqua, Indomie, dll." fgroup-class="col-md-6" disable-feedback />

                                <x-adminlte-input name="harga" label="Harga Barang" label-class="text-lightblue"
                                    placeholder="Contoh : pcs, lusin, botol, dll.   " fgroup-class="col-md-6"
                                    disable-feedback />

                                <x-adminlte-input name="total_stok" label="Total Stok Barang"
                                    label-class="text-lightblue" placeholder="Contoh : Apa saja " fgroup-class="col-md-6"
                                    disable-feedback />

                                <x-adminlte-button class="btn" type="submit" label="Simpan Data" theme="info"
                                    icon="fas fa-lg fa-save" />
                            </div>
                        </div>
                    </form>

                    <!-- End of form input barang -->

                </div>

            </div>
        </div>

    </div>

    <x-adminlte-modal id="modalbarang" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td id="idBarang">Mark</td>
                </tr>
                <tr>
                    <th scope="row">SKU Barang</th>
                    <td id="sku">123</td>

                </tr>
                <tr>
                    <th scope="row">Harga Barangt</th>
                    <td id="harga">1000</td>
                </tr>
                <tr>
                    <th scope="row">Total Barang Terjual</th>
                    <td id="total_terjual">30</td>
                </tr>
                <tr>
                    <th scope="row">Total Barang Masuk</th>
                    <td id="total_masuk">60</td>
                </tr>
                <tr>
                    <th scope="row">Total Stok Barang</th>
                    <td id="total_stok">100</td>
                </tr>
            </tbody>
        </table>
        <x-slot name="footerSlot">
            <form id="deleteForm" method="post">
                @csrf
                @method('DELETE')

                <input id="id" name="id" hidden value="">
                <x-adminlte-button type="submit" class="mr-auto" theme="danger" label="Iya, hapus data." />

                <x-adminlte-button theme="success" label="Tidak" data-dismiss="modal" />
            </form>
        </x-slot>

    </x-adminlte-modal>


    <x-adminlte-modal id="modalBarangDetail" title="Rincian Data" theme="teal" icon="fas fa-eye" size='lg'>
        Berikut rincian kategori
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">ID</th>
                    <td id="idBarang">Mark</td>
                </tr>
                <tr>
                    <th scope="row">SKU Barang</th>
                    <td id="sku">Mail</td>

                </tr>
                <tr>
                    <th scope="row">Harga Barangt</th>
                    <td id="harga">Nando</td>
                </tr>
                <tr>
                    <th scope="row">Total Barang Terjual</th>
                    <td id="total_terjual">Nando</td>
                </tr>
                <tr>
                    <th scope="row">Total Barang Masuk</th>
                    <td id="total_masuk">Nando</td>
                </tr>
                <tr>
                    <th scope="row">Total Stok Barang</th>
                    <td id="total_stok">Nando</td>
                </tr>
                <tr>
                    <th scope="row">Waktu dibuat</th>
                    <td id="created_at">Hoho</td>
                </tr>
                <tr>
                    <th scope="row">Terakhir diubah</th>
                    <td id="created_at">Heho</td>
                </tr>
            </tbody>
        </table>

    </x-adminlte-modal>

@stop


@section('js')
    <script>
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            let sku = $(this).attr('data-sku');
            let harga = $(this).attr('data-harga');
            let total_terjual = $(this).attr('data-total-terjual');
            let total_masuk = $(this).attr('data-total-masuk');
            let total_stok = $(this).attr('data-total-stok');

            $('#deleteForm').attr('action', '/barang/' + id);
            document.getElementById("idBarang").innerHTML = id;
            document.getElementById("sku").innerHTML = sku;
            document.getElementById("harga").innerHTML = harga;
            document.getElementById("total_terjual").innerHTML = totalTerjual;
            document.getElementById("total_masuk").innerHTML = totalMasuk;
            document.getElementById("total_stok").innerHTML = totalStok;
        });







    </script>
@stop
