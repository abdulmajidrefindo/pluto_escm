@php

    $heads = ['ID', 'Nama Pelanggan', 'Alamat Pelanggan', 'Kontak Pelanggan', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false]],
    ];
@endphp

@php

@endphp

@extends('adminlte::page')

@section('plugins.Select2', true)

@section('title', 'Pelanggan')

@section('content_header')
    <h1>Daftar Pelanggan</h1>
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

            <ul class="nav nav-tabs" id="pelanggan-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pelanggan-tabs-table-tab" data-toggle="pill" href="#pelanggan-tabs-table"
                        role="tab" aria-controls="pelanggan-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pelanggan-tabs-add-tab" data-toggle="pill" href="#pelanggan-tabs-add" role="tab"
                        aria-controls="pelanggan-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Pelanggan Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="pelangganTabContent">
                <div class="tab-pane active show" id="pelanggan-tabs-table" role="tabpanel"
                    aria-labelledby="pelanggan-tabs-table-tab">
                    <x-adminlte-datatable id="pelanggan-table" :heads="$heads" head-theme="light" theme="light" :config="$config" striped
                        hoverable with-footer footer-theme="light" beautify>
                        @foreach ($pelanggan as $pelanggan)
                            <tr>
                                <td>
                                    {{ $pelanggan->id }}
                                </td>
                                <td>
                                    {{ $pelanggan->nama_pelanggan }}
                                </td>
                                <td>
                                    {{ $pelanggan->alamat_pelanggan }}
                                </td>
                                <td>
                                    {{ $pelanggan->kontak_pelanggan }}
                                </td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                                            class="btn btn-sm btn-primary mx-1 shadow" title="Edit">
                                            <i class="fa fa-fw fa-pen"></i> Edit
                                        </a>
                                        <a href="{{ route('pelanggan.show', $pelanggan->id) }}"
                                            class="btn btn-sm btn-success mx-1 shadow" title="Detail">
                                            <i class="fa fa-fw fa-eye"></i> Detail
                                        </a>
                                        <button data-toggle="modal" data-target="#modalPelanggan" data-id="{{ $pelanggan->id }}" data-nama-pelanggan="{{ $pelanggan->nama_pelanggan }}" data-alamat-pelanggan="{{ $pelanggan->alamat_pelanggan }}" data-kontak-pelanggan="{{ $pelanggan->kontak_pelanggan }}"
                                            class="delete btn btn-sm btn-danger mx-1 shadow" title="Hapus">
                                            <i class="fa fa-fw fa-trash"></i> Hapus
                                        </button>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>

                <div class="tab-pane fade" id="pelanggan-tabs-add" role="tabpanel" aria-labelledby="pelanggan-tabs-add-tab">

                    <form action="{{route('pelanggan.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <x-adminlte-input name="nama_pelanggan" label="Nama Pelanggan" placeholder="Contoh : Ivan" fgroup-class="col-md-6"
                                    disable-feedback />
                                <x-adminlte-input name="alamat_pelanggan" label="Alamat Pelanggan" placeholder="Contoh : Jl. Kedawung No.38 Blok 9, Kel. Bojongkaret, Kec. Telukasin, Kab. Wadahok, Provinsi Banten " fgroup-class="col-md-6"
                                    disable-feedback />
                                <x-adminlte-input name="kontak_pelanggan" label="Kontak Pelanggan" placeholder="Contoh : 081xxxxxxxx " fgroup-class="col-md-6"
                                    disable-feedback />
                                <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />
                            </div>
                        </div>
                    </form>


                </div>

            </div>
        </div>

    </div>

    <x-adminlte-modal id="modalPelanggan" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idPelanggan">Mark</td>
              </tr>
              <tr>
                <th scope="row">Nama Pelanggan</th>
                <td id="namaPelanggan">Mail</td>

              </tr>
              <tr>
                <th scope="row">Alamat Pelanggan</th>
                <td id = "alamatPelanggan">Nando</td>
              </tr>
              <tr>
                <th scope="row">Kontak Pelanggan</th>
                <td id = "kontakPelanggan">Nando</td>
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
            let namaPelanggan = $(this).attr('data-nama-pelanggan');
            let alamatPelanggan = $(this).attr('data-alamat-pelanggan');
            let kontakPelanggan = $(this).attr('data-kontak-pelanggan');

            $('#deleteForm').attr('action', '/pelanggan/' + id);
            document.getElementById("idPelanggan").innerHTML = id;
            document.getElementById("namaPelanggan").innerHTML = namaPelanggan;
            document.getElementById("alamatPelanggan").innerHTML = alamatPelanggan;
            document.getElementById("kontakPelanggan").innerHTML = kontakPelanggan;
        });

    </script>
@stop
