@extends('adminlte::page')

@section('title', 'Detail Barang')

@section('content_header')
    <h1>Rincian Merek</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-12 col-sm-12 col-md-4">
            <div class="card card-dark">
                <div class="card-header border-transparent">
                    <h3 class="card-title"> {{ $merek->nama_merek }} </h3>
                    <div class="card-tools">
                        <!-- button to edit page-->

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
                                    ID Merek
                                </label>
                                <div class="input-group">
                                    <input id="id" name="id" value="{{ $merek->id }}" class="form-control"
                                        disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="merek" class="text-lightdark">
                                    Nama merek
                                </label>
                                <div class="input-group">
                                    <input id="nama_merek" name="nama_merek" value="{{ $merek->nama_merek }}"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="keterangan" class="text-lightdark">
                                    Keterangan
                                </label>
                                <div class="input-group">
                                    <input id="keterangan" name="keterangan" value="{{ $merek->keterangan }}"
                                        class="form-control" disabled>
                                </div>
                            </div>


                            <x-adminlte-input name="created_at" type="text" value="{{ $merek->created_at }}" label="Waktu Ditambahkan"
                                fgroup-class="col-md-12" disabled>

                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>

                            </x-adminlte-input>

                            <x-adminlte-input name="updated_at" type="text" value="{{ $merek->updated_at }}" label="Waktu Diperbaharui"
                                fgroup-class="col-md-12" disabled>

                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>

                            </x-adminlte-input>

                            <x-adminlte-button class="btn bg-purple col-12 simpan" type="submit" label="Simpan Data"
                                    icon="fas fa fa-fw fa-save" hidden/>

                                    <x-adminlte-button class="btn bg-purple col-12 edit" type="submit" label="Edit Data"
                                    icon="fas fa fa-fw fa-edit" />

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-8">
            <div class="card card-dark">
                <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                    <h3 class="card-title">Daftar barang dengan merek {{ $merek->nama_merek }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times" ></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tabel-merek" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barang</th>
                                <th>Pemasok</th>
                                <th>Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>


@stop


@section('js')


    <script>
        $(document).ready(function() {
            //set csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            //data table tabel-transaksi-pelanggan

            var tabelProduk = $('#tabel-merek').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('merek.getBarang', $merek->id) }}",
                    type: 'GET',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        sClass: 'text-center',
                        width: '5%'
                    },
                    {
                        data: 'produk.nama_produk',
                        name: 'produk.nama_produk'
                    },
                    {
                        data: 'pemasok.nama_pemasok',
                        name: 'pemasok.nama_pemasok'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        sClass: 'text-center'
                    },
                ],
                order: [
                    [0, 'desc']
                ]
            });


        });
    </script>

<script>
    $(document).ready(function() {

//make input availabe if edit button clicked
        $('.edit').click(function() {
            $('#nama_merek').prop('disabled', false);
            $('#keterangan').prop('disabled', false);
            $('.edit').prop('hidden', true);
            $('.simpan').prop('hidden', false);
        });

        $('.simpan').click(function() {
            //ajax update data
            $.ajax({
                url: "{{ route('merek.update', $merek->id) }}",
                type: 'PUT',
                data: {
                    nama_merek: $('#nama_merek').val(),
                    keterangan: $('#keterangan').val(),
                },
                success: function(data) {
                    $('#nama_merek').prop('disabled', true);
                    $('#keterangan').prop('disabled', true);
                    $('.edit').prop('hidden', false);
                    $('.simpan').prop('hidden', true);
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil diperbaharui',
                    });
                },
                error: function(data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Data gagal diperbaharui',
                    });
                }
            });

            //set updated_at with now
            var now = new Date();
            var date = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();
            var time = now.getHours() + ":" + now.getMinutes() + ":" + now.getSeconds();
            var dateTime = date + ' ' + time;
            $('#updated_at').val(dateTime);

        });


    });
</script>


@stop
