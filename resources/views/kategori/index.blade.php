@php

    $heads = ['ID', 'Nama Kategori', 'Keterangan', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Kategori</h1>
    <a href="{{route('kategori.create')}}" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Kategori baru
    </a>
@stop

@section('content')
    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1">
            <div class="card-tools">

                <!-- This will cause the card to maximize when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <!-- This will cause the card to collapse when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

              </div>
              <!-- /.card-tools -->
            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home"
                        role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile"
                        role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Kategori
                        Baru</a>
                </li>
            </ul>

        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane active show" id="custom-tabs-two-home" role="tabpanel"
                    aria-labelledby="custom-tabs-two-home-tab">
                    <x-adminlte-datatable id="kategori-table" :heads="$heads" theme="light"
                        :config="$config" striped hoverable beautify>
                        @foreach ($kategori as $kategori)
                            <tr>
                                <td>
                                    {{ $kategori->id }}
                                </td>
                                <td>
                                    {{ $kategori->nama_kategori }}
                                </td>
                                <td>
                                    {{ $kategori->keterangan }}
                                </td>
                                <td>
                                    <nobr>
                                        <a href="{{ route('kategori.edit', $kategori->id) }}"
                                            class="btn btn-primary mx-1 shadow" title="Edit">
                                            <i class="fa fa-sm fa-fw fa-pen"></i> Edit
                                        </a>
                                        <button data-toggle="modal" data-target="#modalKategoriDetail"
                                            data-id="{{ $kategori->id }}"
                                            data-nama-kategori="{{ $kategori->nama_kategori }}"
                                            data-keterangan-kategori="{{ $kategori->keterangan }}"
                                            class="btn btn-success mx-1 shadow" title="Detail">
                                            <i class="fa fa-sm fa-fw fa-eye"></i> Detail
                                        </button>
                                        <?php //  <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details"> <i class="fa fa-lg fa-fw fa-eye"></i>
                                        ?> </a>

                                        <button data-toggle="modal" data-target="#modalKategori"
                                            data-id="{{ $kategori->id }}"
                                            data-nama-kategori="{{ $kategori->nama_kategori }}"
                                            data-keterangan-kategori="{{ $kategori->keterangan }}"
                                            id = "deleteData"
                                            class="btn  btn-danger mx-1 shadow" title="Hapus">
                                            <i class="fa fa-sm fa-fw fa-trash"></i> Hapus
                                        </button>
                                    </nobr>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
                <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                    aria-labelledby="custom-tabs-two-profile-tab">
                    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm">
                                <x-adminlte-input name="nama_kategori" label="Nama Kategori" placeholder="Contoh : Minuman"
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

    <x-adminlte-modal id="modalKategori" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idKategori">Mark</td>
              </tr>
              <tr>
                <th scope="row">Kategori</th>
                <td id="namaKategori">Jacob</td>

              </tr>
              <tr>
                <th scope="row">Keterangan</th>
                <td id = "keteranganKategori">Larry the Bird</td>
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

    <x-adminlte-modal id="modalKategoriDetail" title="Rincian Data" theme="teal" icon="fas fa-eye" size='lg'>
        Berikut rincian kategori
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idKategori">Jacob</td>
              </tr>
              <tr>
                <th scope="row">Kategori</th>
                <td id="namaKategori">Larry</td>

              </tr>
              <tr>
                <th scope="row">Keterangan</th>
                <td id = "keteranganKategori">Hoho</td>
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
            let namaKategori = $(this).attr('data-nama-kategori');
            let keteranganKategori = $(this).attr('data-keterangan-kategori');

            $('#showForm').attr('action', '/kategori/' + id);
            document.getElementById("idKategori").innerHTML = id;
            document.getElementById("namaKategori").innerHTML = namaKategori;
            document.getElementById("keteranganKategori").innerHTML = keteranganKategori;
        });

    </script>
    <script>
        $(document).on('click', '#deleteData', function() {
            let id = $(this).attr('data-id');
            let namaKategori = $(this).attr('data-nama-kategori');
            let keteranganKategori = $(this).attr('data-keterangan-kategori');

            $('#deleteForm').attr('action', '/kategori/' + id);
            document.getElementById("idKategori").innerHTML = id;
            document.getElementById("namaKategori").innerHTML = namaKategori;
            document.getElementById("keteranganKategori").innerHTML = keteranganKategori;
        });

    </script>
@stop
