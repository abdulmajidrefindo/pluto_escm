@php

    $heads = ['ID', 'SKU', 'Harga', 'Total Barang Terjual', 'Total Barang Masuk', 'Total Stok Barag', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Barang')

@section('content_header')
    <h1>Daftar Barang</h1>
    <a href="{{route('barang.create')}}" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Barang
    </a>
@stop

@section('content')



    <x-adminlte-datatable id="barang-table" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
        hoverable with-footer footer-theme="light" beautify>
        @foreach ($barang as $barang)
            <tr>
                <td>
                    {{ $barang->id }}
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
                            class="btn btn-sm btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <button data-toggle="modal" data-target="#modalBarangDetail" data-id="{{ $barang->id }}" data-sku="{{ $barang->sku }}" data-harga="{{ $barang->harga }}" data-total-terjual="{{ $barang->total_terjual }}" data-total-masuk="{{ $barang->total_masuk }}" data-total-stok="{{ $barang->total_masuk }}"
                            class="btn btn-sm btn-default text-teal mx-1 shadow" title="Detail">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                      <?php //  <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> ?> </a>

                        <button data-toggle="modal" data-target="#modalbarang" data-id="{{ $barang->id }}" data-sku="{{ $barang->sku }}" data-harga="{{ $barang->harga }}" data-total-terjual="{{ $barang->total_terjual }}" data-total-masuk="{{ $barang->total_masuk }}" data-total-stok="{{ $barang->total_masuk }}"
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

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
                <td id = "harga">1000</td>
              </tr>
              <tr>
                <th scope="row">Total Barang Terjual</th>
                <td id = "total_terjual">30</td>
              </tr>
              <tr>
                <th scope="row">Total Barang Masuk</th>
                <td id = "total_masuk">60</td>
              </tr>
              <tr>
                <th scope="row">Total Stok Barang</th>
                <td id = "total_stok">100</td>
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
                <td id = "harga">Nando</td>
              </tr>
              <tr>
                <th scope="row">Total Barang Terjual</th>
                <td id = "total_terjual">Nando</td>
              </tr>
              <tr>
                <th scope="row">Total Barang Masuk</th>
                <td id = "total_masuk">Nando</td>
              </tr>
              <tr>
                <th scope="row">Total Stok Barang</th>
                <td id = "total_stok">Nando</td>
              </tr>
              <tr>
                <th scope="row">Waktu dibuat</th>
                <td id = "created_at">Hoho</td>
              </tr>
              <tr>
                <th scope="row">Terakhir diubah</th>
                <td id = "created_at">Heho</td>
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
