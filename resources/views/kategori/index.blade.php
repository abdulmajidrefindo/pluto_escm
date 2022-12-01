@php
    $heads = ['No.', 'Nama Kategori', 'Keterangan', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Kategori</h1>
    <button href="#" class="btn btn-primary btn-lg shadow aria-pressed='true'" title="New">
        Tambah Kategori baru
    </button>
@stop

@section('content')



            <x-adminlte-datatable id="kategori-table" :heads="$heads" head-theme="light" theme="dark" :config="$config"
                striped hoverable with-footer footer-theme="light" beautify>
                @foreach ($kategori as $kategori)
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            {{ $kategori->nama_kategori }}
                        </td>
                        <td>
                            {{ $kategori->keterangan }}
                        </td>
                        <td>
                            <nobr>
                                <a href="#" class="btn btn-sm btn-default text-primary mx-1 shadow" title="Edit">
                                    <i class="fa fa-lg fa-fw fa-pen"></i>
                                </a>
                                <button data-toggle="modal" data-target="#modalKategori"
                                    class="btn btn-sm btn-default text-danger mx-1 shadow" title="Hapus">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                                <a href="#" class="btn btn-sm btn-default text-teal mx-1 shadow" title="Details">
                                    <i class="fa fa-lg fa-fw fa-eye"></i>
                                </a>
                            </nobr>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>

    <x-adminlte-modal id="modalKategori" title="Hapus Data" theme="danger" icon="fas fa-trash" size='lg'>
        Anda yakin ingin menghapus data berikut?
        <x-slot name="footerSlot">
            <x-adminlte-button class="mr-auto" theme="success" label="Iya" />
            <x-adminlte-button theme="danger" label="Tidak" data-dismiss="modal" />
        </x-slot>
    </x-adminlte-modal>

@stop


