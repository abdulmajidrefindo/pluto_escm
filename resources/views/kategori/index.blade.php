@php

    $heads = ['ID', 'Nama Kategori', 'Keterangan', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'dsc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Kategori</h1>
    <a href="kategori/create" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Kategori baru
    </a>
@stop

@section('content')



    <x-adminlte-datatable id="kategori-table" :heads="$heads" head-theme="light" theme="dark" :config="$config" striped
        hoverable with-footer footer-theme="light" beautify>
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
                        <a href="{{ route('kategori.show', $kategori->id) }}"
                            class="btn btn-sm btn-default text-primary mx-1 shadow" title="Edit">
                            <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>

                        <a href="{{ route('kategori.edit', $kategori->id) }}"
                            class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                        </a>

                        <button data-toggle="modal" data-target="#modalKategori" data-id="{{ $kategori->id }}"
                            class="delete btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                            <i class="fa fa-lg fa-fw fa-trash"></i>
                        </button>
                    </nobr>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

    <x-adminlte-modal id="modalKategori" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
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
            $('#deleteForm').attr('action', '/kategori/' + id);
        });

    </script>
@stop
