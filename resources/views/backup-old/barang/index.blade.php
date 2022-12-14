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
                        <a href="{{ route('barang.show', $barang->id) }}"
                            class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                        <button data-toggle="modal" data-target="#modalbarang" data-id="{{ $barang->id }}" data-sku="{{ $barang->sku }}" data-harga="{{ $barang->harga }}" data-total-terjual="{{ $barang->total_terjual }}" data-total-masuk="{{ $barang->total_masuk }}" data-total-stok="{{ $barang->total_masuk }}"
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

    <x-adminlte-modal id="modalBarang" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
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

@stop


@section('js')
    <script>
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            let namaBarang = $(this).attr('data-nama-Barang');
            let unit = $(this).attr('data-unit');
            let keterangan = $(this).attr('data-keterangan');

            $('#deleteForm').attr('action', '/Barang/' + id);
            document.getElementById("idBarang").innerHTML = id;
            document.getElementById("sku").innerHTML = sku;
            document.getElementById("harga").innerHTML = harga;
            document.getElementById("total_terjual").innerHTML = totalTerjual;
            document.getElementById("total_masuk").innerHTML = totalMasuk;
            document.getElementById("total_stok").innerHTML = totalStok;
        });

    </script>
@stop
