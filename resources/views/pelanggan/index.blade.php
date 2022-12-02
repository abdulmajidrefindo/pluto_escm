@php

    $heads = ['ID', 'Nama Pelanggan', 'Alamat Pelanggan', 'Kontak Pelanggan', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Pelanggan</h1>
    <a href="{{route('pelanggan.create')}}" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Pelanggan
    </a>
@stop

@section('content')



    <x-adminlte-datatable id="pelanggan-table" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
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
                            class="btn btn-sm btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <a href="{{ route('pelanggan.show', $pelanggan->id) }}"
                            class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                        <button data-toggle="modal" data-target="#modalPelanggan" data-id="{{ $pelanggan->id }}" data-nama-pelanggan="{{ $pelanggan->nama_pelanggan }}" data-alamat-pelanggan="{{ $pelanggan->alamat_pelanggan }}" data-kontak-pelanggan="{{ $pelanggan->kontak_pelanggan }}" 
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

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
