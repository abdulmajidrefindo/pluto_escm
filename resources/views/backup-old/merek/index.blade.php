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
    <a href="{{route('merek.create')}}" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Merek baru
    </a>
@stop

@section('content')



    <x-adminlte-datatable id="merek-table" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
        hoverable with-footer footer-theme="light" beautify>
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
                            class="btn btn-sm btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <button data-toggle="modal" data-target="#modalMerek" data-id="{{ $merek->id }}" data-nama-merek="{{ $merek->nama_merek }}" data-keterangan-merek="{{ $merek->keterangan }}"
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
<?php /*
                        <a href="{{ route('merek.show', $merek->id) }}"
                            class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
        */
                        ?>
                        <button data-toggle="modal" data-target="#modalMerek" data-id="{{ $merek->id }}" data-nama-merek="{{ $merek->nama_merek }}" data-keterangan-merek="{{ $merek->keterangan }}"
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

    <x-adminlte-modal id="modalMerek" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <table class="table">
            <tbody>
              <tr>
                <th scope="row">ID</th>
                <td id="idMerek">Majid</td>
              </tr>
              <tr>
                <th scope="row">Merek</th>
                <td id="namaMerek">Ismail Bintang</td>

              </tr>
              <tr>
                <th scope="row">Keterangan</th>
                <td id = "keteranganMerek">Hernando Dio Palma</td>
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
            let namaMerek = $(this).attr('data-nama-merek');
            let keteranganMerek = $(this).attr('data-keterangan-merek');

            $('#deleteForm').attr('action', '/merek/' + id);
            document.getElementById("idMerek").innerHTML = id;
            document.getElementById("namaMerek").innerHTML = namaMerek;
            document.getElementById("keteranganMerek").innerHTML = keteranganMerek;
        });

    </script>
@stop
