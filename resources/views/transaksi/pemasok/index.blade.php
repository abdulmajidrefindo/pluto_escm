@php

    $heads = ['ID', 'ID Pemasok', 'Tanggal Transaksi', 'Total Harga', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, null,  ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Transaksi Pemasok</h1>
    <a href="{{route('transaksiPemasok.create')}}" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Transaksi baru
    </a>
@stop

@section('content')

    <x-adminlte-datatable id="transaksi-pemasok-table" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
        hoverable with-footer footer-theme="light" beautify>
        @foreach ($transaksi_pemasok as $transaksi_pemasok)
            <tr>
                <td>
                    {{ $transaksi_pemasok->id }}
                </td>
                <td>
                    {{ $transaksi_pemasok->pemasok_id }}
                </td>
                <td>
                    {{ $transaksi_pemasok->createdAt }}
                </td>
                <td>
                    {{ $transaksi_pemasok->total_harga }}
                </td>
                <td>
                    <nobr>
                        <a href="{{ route('transaksiPemasok.edit', $transaksi_pemasok->id) }}"
                            class="btn btn-sm btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <button data-toggle="modal" data-target="#modalTransaksiPemasokDetail" data-id="{{ $transaksi_pemasok->id }}" data-pemasok-id="{{ $transaksi_pemasok->pemasok_id }}" data-tanggal-transaksi="{{ $transaksi_pemasok->createdAt }}" data-total-harga="{{ $transaksi_pemasok->total_harga }}"
                            class="btn btn-sm btn-default text-teal mx-1 shadow" title="Detail">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </button>
                      <?php //  <a href="{{ route('transaksi pemasok.show', $transaksi_pemasok->id) }}" class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i> ?> </a>

                        <button data-toggle="modal" data-target="#modalTransaksiPemasok" data-id="{{ $transaksi_pemasok->id }}" data-pemasok-id="{{ $transaksi_pemasok->pemasok_id }}" data-tanggal-transaksi="{{ $transaksi_pemasok->createdAt }}" data-total-harga="{{ $transaksi_pemasok->total_harga }}"
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

    <x-adminlte-modal id="modalTransaksiPemasok" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idTransaksiPemasok">Mark</td>
              </tr>
              <tr>
                <th scope="row">ID Pemasok</th>
                <td id="pemasok_id">Mark</td>
              </tr>
              <tr>
                <th scope="row">Tanggal Transaksi</th>
                <td id="createAt">Mark</td>
              </tr>
              <tr>
                <th scope="row">Total Harga</th>
                <td id="total_harga">Jacob</td>
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

    <x-adminlte-modal id="modalTransaksiPemasokDetail" title="Rincian Data" theme="teal" icon="fas fa-eye" size='lg'>
        Berikut rincian Transaksi Pemasok
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idTransaksiPemasok">Mark</td>
              </tr>
              <tr>
                <th scope="row">ID Pemasok</th>
                <td id="pemasok_id">Mark</td>
              </tr>
              <tr>
                <th scope="row">Tanggal Transaksi</th>
                <td id="createAt">Mark</td>
              </tr>
              <tr>
                <th scope="row">Total Harga</th>
                <td id="total_harga">Jacob</td>
              </tr>
            </tbody>
          </table>

    </x-adminlte-modal>

@stop


@section('js')
    <script>
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            let pemasok_id = $(this).attr('data-nama-pemasok');
            let create_at= $(this).attr('data-tanggal-transaksi');
            let total_harga = $(this).attr('data-total-harga');


            $('#deleteForm').attr('action', '/transaksiPemasok/' + id);
            document.getElementById("idTransaksiPemasok").innerHTML = id;
            document.getElementById("pemasok_id").innerHTML = pemasok_id;
            document.getElementById("createAt").innerHTML = create_at;
            document.getElementById("total_harga").innerHTML = total_harga;
        });

    </script>
@stop
