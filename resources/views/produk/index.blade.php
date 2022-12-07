@php

    $heads = ['ID', 'Nama Produk', 'Unit', 'Keterangan', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Produk</h1>
    <a href="{{route('produk.create')}}" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Produk
    </a>
@stop

@section('content')



    <x-adminlte-datatable id="produk-table" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
        hoverable with-footer footer-theme="light" beautify>
        @foreach ($produk as $produk)
            <tr>
                <td>
                    {{ $produk->id }}
                </td>
                <td>
                    {{ $produk->nama_produk }}
                </td>
                <td>
                    {{ $produk->unit }}
                </td>
                <td>
                    {{ $produk->keterangan }}
                </td>
                <td>
                    <nobr>
                        <a href="{{ route('produk.edit', $produk->id) }}"
                            class="btn btn-sm btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <button data-toggle="modal" data-target="#modalProdukDetail" data-id="{{ $produk->id }}" data-sku="{{ $produk->sku }}" data-harga="{{ $produk->harga }}" data-total-terjual="{{ $produk->total_terjual }}" data-total-masuk="{{ $produk->total_masuk }}" data-total-stok="{{ $produk->total_masuk }}"
                            class="btn btn-sm btn-default text-teal mx-1 shadow" title="Detail">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                        <?php //  <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> ?> </a>

                        <button data-toggle="modal" data-target="#modalProduk" data-id="{{ $produk->id }}" data-nama-produk="{{ $produk->nama_produk }}" data-unit="{{ $produk->unit }}" data-keterangan="{{ $produk->keterangan }}"
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

    <x-adminlte-modal id="modalProduk" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idProduk">Mark</td>
              </tr>
              <tr>
                <th scope="row">Nama Produk</th>
                <td id="namaProduk">Mail</td>

              </tr>
              <tr>
                <th scope="row">Unit</th>
                <td id = "unit">Nando</td>
              </tr>
              <tr>
                <th scope="row">Keterangan</th>
                <td id = "keterangan">Nando</td>
              </tr>
              <tr>
                <th scope="row">Kategori</th>
                <td id = "kategori">halah</td>
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


    <x-adminlte-modal id="modalProdukDetail" title="Rincian Data" theme="teal" icon="fas fa-eye" size='lg'>
        Berikut rincian kategori
        <table class="table">
            <tbody>
                <tr>
                  <th scope="row">ID</th>
                  <td id="idProduk">Mark</td>
                </tr>
                <tr>
                  <th scope="row">Nama Produk</th>
                  <td id="namaProduk">Mail</td>

                </tr>
                <tr>
                  <th scope="row">Unit</th>
                  <td id = "unit">Nando</td>
                </tr>
                <tr>
                  <th scope="row">Keterangan</th>
                  <td id = "keterangan">Nando</td>
                </tr>
                <tr>
                  <th scope="row">Kategori</th>
                  <td id = "kategori">halah</td>
                </tr>
              </tbody>
            </table>

    </x-adminlte-modal>

@stop



@section('js')
    <script>
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            let namaProduk = $(this).attr('data-nama-produk');
            let unit = $(this).attr('data-unit');
            let keterangan = $(this).attr('data-keterangan');
            let kategori = $(this).attr('data-kategori');

            $('#deleteForm').attr('action', '/produk/' + id);
            document.getElementById("idProduk").innerHTML = id;
            document.getElementById("namaProduk").innerHTML = namaProduk;
            document.getElementById("unit").innerHTML = unit;
            document.getElementById("keterangan").innerHTML = keterangan;
            document.getElementById("kategori").innerHTML = kategori;
        });

    </script>
@stop
