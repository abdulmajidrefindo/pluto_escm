@extends('adminlte::page')

@section('content_header')
    <h1>Rincian Kategori</h1>


@stop

@section('content')

    <div class="row">
        <div class="col-12 col-sm-12 col-md-6">
            <div class="card card-dark">
                <div class="card-header border-transparent">
                    <h3 class="card-title"> {{ $kategori->nama_kategori }} </h3>
                    <div class="card-tools">
                        <!-- button to edit page-->
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-tool">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="form-group col-md-12">
                                <label class="text-lightdark">
                                    ID Kategori
                                </label>
                                <div class="input-group">
                                    <input id="id" name="id" value="{{ $kategori->id }}" class="form-control"
                                        disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="kategori" class="text-lightdark">
                                    Nama kategori
                                </label>
                                <div class="input-group">
                                    <input id="group" name="group" value="{{ $kategori->nama_kategori }}"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="keterangan" class="text-lightdark">
                                    Keterangan
                                </label>
                                <div class="input-group">
                                    <input id="merek" name="merek" value="{{ $kategori->keterangan }}"
                                        class="form-control" disabled>
                                </div>
                            </div>


                            <x-adminlte-date-range value="{{ $kategori->created_at }}" name="created_at"
                                label="Waktu Ditambahkan" disabled>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-date-range>

                            <x-adminlte-date-range value="{{ $kategori->updated_at }}" name="created_at"
                                label="Waktu Diperbaharui" disabled>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-date-range>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6">
            <div class="card card-dark">
                <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                    <h3 class="card-title">Daftar Produk {{ $kategori->nama_kategori }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Nama Produk</th>
                                <th>Dibuat</th>
                                <th>Terakhir Diubah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori->produk as $produk)
                                <tr>
                                    <td>{{ $produk->id }}</td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->created_at }}</td>
                                    <td>{{ $produk->updated_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        console.log('Hi!');
    </script>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
    </div>

@stop
