@php

    $heads = ['ID', 'Pelanggan', 'Total Harga', 'Taggal Transaksi', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Transaksi')

@section('content_header')
    <h1>Daftar Transaksi</h1>
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
              <!-- /.card-tools -->
            <ul class="nav nav-tabs" id="katefori-tabs" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="transaksiPelanggan-tabs-table-tab" data-toggle="pill" href="#transaksiPelanggan-tabs-table"
                        role="tab" aria-controls="transaksiPelanggan-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Transaksi Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="transaksiPelanggan-tabs-add-tab" data-toggle="pill" href="#transaksiPelanggan-tabs-add"
                        role="tab" aria-controls="transaksiPelanggan-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Transaksi Pelanggan Baru</a>
                </li>
            </ul>

        </div>
        <div class="card-body">
            <div class="tab-content" id="transaksiPelangganTabContent">
                <div class="tab-pane active show" id="transaksiPelanggan-tabs-table" role="tabpanel"
                    aria-labelledby="transaksiPelanggan-tabs-table-tab">
                    <x-adminlte-datatable id="transaksiPelanggan-table" :heads="$heads" theme="light"
                        :config="$config" striped hoverable beautify>
                        @foreach ($transaksiPelanggan as $transaksiPelanggan)
                            <tr>
                                <td>
                                    {{ $transaksiPelanggan->id }}
                                </td>
                                <td>
                                    {{ $transaksiPelanggan->pelanggan->nama_pelanggan }}
                                </td>
                                <td>
                                    {{ $transaksiPelanggan->total_harga }}
                                </td>
                                <td>
                                    {{ $transaksiPelanggan->created_at }}
                                </td>

                                <td>
                                    <nobr>
                                        <a href="{{ route('transaksiPelanggan.edit', $transaksiPelanggan->id) }}"
                                            class="btn btn-sm btn-primary mx-1 shadow" title="Edit">
                                            <i class="fa fa-sm fa-fw fa-pen"></i> Edit
                                        </a>
                                        <button data-toggle="modal" data-target="#modalTransaksiPelangganDetail"
                                            data-id="{{ $transaksiPelanggan->id }}"
                                            data-total-harga="{{ $transaksiPelanggan->total_harga }}"
                                            data-created-at="{{ $transaksiPelanggan->created_at }}"
                                            class="btn btn-sm btn-success mx-1 shadow" title="Detail">
                                            <i class="fa fa-sm fa-fw fa-eye"></i> Detail
                                        </button>
                                        <?php //  <a href="{{ route('transaksiPelanggan.show', $transaksiPelanggan->id) }}" class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i>
                                        ?> </a>

                                        <button  data-toggle="modal" data-target="#modalTransaksiPelanggan"
                                            data-id="{{ $transaksiPelanggan->id }}"
                                            data-total-harga="{{ $transaksiPelanggan->total_harga }}"
                                            data-created-at="{{ $transaksiPelanggan->created_at }}"
                                            id = "deleteData"
                                            class="btn btn-sm btn-danger mx-1 shadow" title="Hapus">
                                            <i class="fa fa-sm fa-fw fa-trash"></i> Hapus
                                        </button>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
                <div class="tab-pane fade" id="transaksiPelanggan-tabs-add" role="tabpanel"
                    aria-labelledby="transaksiPelanggan-tabs-add-tab">

                    <form action="{{ route('transaksiPelanggan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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

                                <x-adminlte-input name="total_harga" label="Total Harga" placeholder="Contoh : 7000"
                                    fgroup-class="col-md-6" disable-feedback />

                                <x-adminlte-button class="btn" type="submit" label="Simpan" theme="success"
                                    icon="fas fa fa-fw fa-save" />
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <x-adminlte-modal id="modalTransaksiPelanggan" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idTransaksiPelanggan">Mark</td>
              </tr>
              <tr>
                <th scope="row">Total Harga</th>
                <td id="total_harga">7000</td>

              </tr>
              <tr>
                <th scope="row">Tanggal Transaksi</th>
                <td id = "created_at">08/09/2022/td>
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

    <x-adminlte-modal id="modalTransaksiPelangganDetail" title="Rincian Data" theme="teal" icon="fas fa-eye" size='lg'>
        Berikut rincian transaksiPelanggan
        <table class="table">
          <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idTransaksiPelanggan">Mark</td>
              </tr>
              <tr>
                <th scope="row">Total Harga</th>
                <td id="total_harga">7000</td>

              </tr>
              <tr>
                <th scope="row">Tanggal Transaksi</th>
                <td id = "created_at">08/09/2022/td>
              </tr>
            </tbody>
          </table>

    </x-adminlte-modal>

@stop


@section('js')
    <script>
        $(document).on('click', '#showData', function() {
            let id = $(this).attr('data-id');
            let total_harga = $(this).attr('data-total-harga');
            let created_at = $(this).attr('data-created-at');

            $('#showForm').attr('action', '/transaksiPelanggan/' + id);
            document.getElementById("idTransaksiPelanggan").innerHTML = id;
            document.getElementById("total_harga").innerHTML = total_harga;
            document.getElementById("created_at").innerHTML = created_at;
        });

        $(document).on('click', '#deleteData', function() {
            let id = $(this).attr('data-id');
            let total_harga = $(this).attr('data-nama-transaksiPelanggan');
            let created_at = $(this).attr('data-keterangan-transaksiPelanggan');

            $('#deleteForm').attr('action', '/transaksiPelanggan/' + id);
            document.getElementById("idTransaksiPelanggan").innerHTML = id;
            document.getElementById("total_harga").innerHTML = total_harga;
            document.getElementById("created_at").innerHTML = created_at;
        });

    </script>
@stop
