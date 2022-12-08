@php

    $heads = ['ID', 'Nama Pemasok', 'Alamat Pemasok', 'Kontak Pemasok', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Pemasok</h1>
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

            <ul class="nav nav-tabs" id="pemasok-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pemasok-tabs-table-tab" data-toggle="pill" href="#pemasok-tabs-table"
                        role="tab" aria-controls="pemasok-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Pemasok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pemasok-tabs-add-tab" data-toggle="pill" href="#pemasok-tabs-add" role="tab"
                        aria-controls="pemasok-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Pemasok
                        Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="pemasokTabContent">
                <div class="tab-pane active show" id="pemasok-tabs-table" role="tabpanel"
                    aria-labelledby="pemasok-tabs-table-tab">

                    <x-adminlte-datatable id="pemasok-table" :heads="$heads"  theme="light" :config="$config" striped
                        hoverable with-footer footer-theme="light" beautify>
                        @foreach ($pemasok as $pemasok)
                            <tr>
                                <td>
                                    {{ $pemasok->id }}
                                </td>
                                <td>
                                    {{ $pemasok->nama_pemasok }}
                                </td>
                                <td>
                                    {{ $pemasok->alamat_pemasok }}
                                </td>
                                <td>
                                    {{ $pemasok->kontak_pemasok }}
                                </td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('pemasok.edit', $pemasok->id) }}"
                                            class="btn btn-sm btn-primary mx-1 shadow" title="Edit">
                                            <i class="fa fa-fw fa-pen"></i> Edit
                                        </a>
                                        <a href="{{ route('pemasok.show', $pemasok->id) }}"
                                            class="btn btn-sm btn-success mx-1 shadow" title="Detail">
                                            <i class="fa fa-fw fa-eye"></i> Detail
                                        </a>
                                        <button data-toggle="modal" data-target="#modalPemasok" data-id="{{ $pemasok->id }}" data-nama-pemasok="{{ $pemasok->nama_pemasok }}" data-alamat-pemasok="{{ $pemasok->alamat_pemasok }}" data-kontak-pemasok="{{ $pemasok->kontak_pemasok }}"
                                            class="delete btn btn-sm btn-danger mx-1 shadow" title="Hapus">
                                            <i class="fa fa-fw fa-trash"></i> Hapus
                                        </button>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                    </div>

                    <div class="tab-pane fade" id="pemasok-tabs-add" role="tabpanel" aria-labelledby="pemasok-tabs-add-tab">

                        <form action="{{route('pemasok.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm">
                                    <x-adminlte-input name="nama_pemasok" label="Nama Pemasok" placeholder="Contoh : Ivan" fgroup-class="col-md-6"
                                        disable-feedback />
                                    <x-adminlte-input name="alamat_pemasok" label="Alamat Pemasok" placeholder="Contoh : Jl. Kedawung No.38 Blok 9, Kel. Bojongkaret, Kec. Telukasin, Kab. Wadahok, Provinsi Banten " fgroup-class="col-md-6"
                                        disable-feedback />
                                    <x-adminlte-input name="kontak_pemasok" label="Kontak Pemasok" placeholder="Contoh : 081xxxxxxxx " fgroup-class="col-md-6"
                                        disable-feedback />
                                    <x-adminlte-button class="btn-lg" type="submit" label="Simpan Data" theme="success" icon="fas fa-lg fa-save" />
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>

    <x-adminlte-modal id="modalPemasok" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idPemasok">Mark</td>
              </tr>
              <tr>
                <th scope="row">Nama Pemasok</th>
                <td id="namaPemasok">Mail</td>

              </tr>
              <tr>
                <th scope="row">Alamat Pemasok</th>
                <td id = "alamatPemasok">Nando</td>
              </tr>
              <tr>
                <th scope="row">Kontak Pemasok</th>
                <td id = "kontakPemasok">Nando</td>
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
            let namaPemasok = $(this).attr('data-nama-pemasok');
            let alamatPemasok = $(this).attr('data-alamat-pemasok');
            let kontakPemasok = $(this).attr('data-kontak-pemasok');

            $('#deleteForm').attr('action', '/pemasok/' + id);
            document.getElementById("idPemasok").innerHTML = id;
            document.getElementById("namaPemasok").innerHTML = namaPemasok;
            document.getElementById("alamatPemasok").innerHTML = alamatPemasok;
            document.getElementById("kontakPemasok").innerHTML = kontakPemasok;
        });

    </script>
@stop
