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
    <a href="{{route('pemasok.create')}}" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Pemasok
    </a>
@stop

@section('content')



    <x-adminlte-datatable id="pemasok-table" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
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
                            class="btn btn-sm btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        <a href="{{ route('pemasok.show', $pemasok->id) }}"
                            class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>
                        <button data-toggle="modal" data-target="#modalPemasok" data-id="{{ $pemasok->id }}" data-nama-pemasok="{{ $pemasok->nama_pemasok }}" data-alamat-pemasok="{{ $pemasok->alamat_pemasok }}" data-kontak-pemasok="{{ $pemasok->kontak_pemasok }}"
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

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
