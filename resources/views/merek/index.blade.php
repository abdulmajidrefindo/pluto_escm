@php

    $heads = ['ID', 'Nama Merek', 'Keterangan', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Merek</h1>
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
            <ul class="nav nav-tabs" id="merek-tabs" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="merek-tabs-table-tab" data-toggle="pill" href="#merek-tabs-table"
                        role="tab" aria-controls="merek-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Merek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="merek-tabs-add-tab" data-toggle="pill" href="#merek-tabs-add"
                        role="tab" aria-controls="merek-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Merek
                        Baru</a>
                </li>
            </ul>

        </div>
        <div class="card-body">
            <div class="tab-content" id="merekTabContent">
                <div class="tab-pane active show" id="merek-tabs-table" role="tabpanel"
                    aria-labelledby="merek-tabs-table-tab">
                    <x-adminlte-datatable id="merek-table" :heads="$heads" theme="light"
                        :config="$config" striped hoverable beautify>
                        @foreach ($merek as $merek)
                            <tr>
                                <td>
                                    {{ $merek->id }}
                                </td>
                                <td>
                                    {{ $merek->nama_merek }}
                                </td>
                                <td>
                                    {{ $merek->keterangan }}
                                </td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('merek.edit', $merek->id) }}"
                                            class="btn btn-sm btn-primary mx-1 shadow" title="Edit">
                                            <i class="fa fa-sm fa-fw fa-pen"></i> Edit
                                        </a>
                                        <a href="{{ route('merek.show', $merek->id) }}"
                                            class="btn btn-sm btn-success mx-1 shadow" title="Detail">
                                            <i class="fa fa-sm fa-fw fa-eye"></i> Detail </a>
                                        </button>
                                        <button  data-toggle="modal" data-target="#modalMerek"
                                            data-id="{{ $merek->id }}"
                                            data-nama-merek="{{ $merek->nama_merek }}"
                                            data-keterangan-merek="{{ $merek->keterangan }}"
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
                <div class="tab-pane fade" id="merek-tabs-add" role="tabpanel"
                    aria-labelledby="merek-tabs-add-tab">
                    <form action="{{ route('merek.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <x-adminlte-input name="nama_merek" label="Nama Merek" placeholder="Contoh : Minuman"
                                    fgroup-class="col-md-6" disable-feedback />
                                <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Contoh : Ngga tau"
                                    fgroup-class="col-md-6" disable-feedback />
                                <x-adminlte-button class="btn" type="submit" label="Simpan" theme="success"
                                    icon="fas fa fa-fw fa-save" />
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    <x-adminlte-modal id="modalMerek" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idMerek">Mark</td>
              </tr>
              <tr>
                <th scope="row">Merek</th>
                <td id="namaMerek">Jacob</td>

              </tr>
              <tr>
                <th scope="row">Keterangan</th>
                <td id = "keteranganMerek">Larry the Bird</td>
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

    <x-adminlte-modal id="modalMerekDetail" title="Rincian Data" theme="teal" icon="fas fa-eye" size='lg'>
        Berikut rincian merek
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idMerek">Jacob</td>
              </tr>
              <tr>
                <th scope="row">Merek</th>
                <td id="namaMerekShow">Larry</td>

              </tr>
              <tr>
                <th scope="row">Keterangan</th>
                <td id = "keteranganMerek">Hoho</td>
              </tr>
              <tr>
                <th scope="row">Waktu dibuat</th>
                <td id = "created_at">Hoho</td>
              </tr>
              <tr>
                <th scope="row">Terakhir diubah</th>
                <td id = "updated_at">Heho</td>
              </tr>
            </tbody>
          </table>

    </x-adminlte-modal>

@stop




@section('js')
    <script>
        $(document).on('click', '#showData', function() {
            let id = $(this).attr('data-id');
            let namaMerek = $(this).attr('data-nama-merek');
            let keteranganMerek = $(this).attr('data-keterangan-merek');

            $('#showForm').attr('action', '/merek/' + id);
            document.getElementById("idMerek").innerHTML = id;
            document.getElementById("namaMerekShow").innerHTML = namaMerek;
            document.getElementById("keteranganmerek").innerHTML = keteranganMerek;
        });

        $(document).on('click', '#deleteData', function() {
            let id = $(this).attr('data-id');
            let namaMerek = $(this).attr('data-nama-merek');
            let keteranganMerek = $(this).attr('data-keterangan-merek');

            $('#deleteForm').attr('action', '/merek/' + id);
            document.getElementById("idMerek").innerHTML = id;
            document.getElementById("namaMerek").innerHTML = namaMerek;
            document.getElementById("keteranganMerek").innerHTML = keteranganMerek;
        });

    </script>
@stop
