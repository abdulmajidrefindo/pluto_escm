@extends('adminlte::page')

@section('content_header')
    <h1>Rincian Pelanggan</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-12 col-sm-12 col-md-4">
            <div class="card card-dark">
                <div class="card-header border-transparent">
                    <h3 class="card-title"> {{ $pelanggan->nama_pelanggan }} </h3>
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
                                    ID Pelanggan
                                </label>
                                <div class="input-group">
                                    <input id="id" name="id" value="{{ $pelanggan->id }}" class="form-control"
                                        disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="merek" class="text-lightdark">
                                    Nama Pelanggan
                                </label>
                                <div class="input-group">
                                    <input id="nama_pelanggan" name="nama_pelanggan" value="{{ $pelanggan->nama_pelanggan }}"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="merek" class="text-lightdark">
                                    Kontak Pelanggan
                                </label>
                                <div class="input-group">
                                    <input id="kontak_pelanggan" name="kontak_pelanggan" value="{{ $pelanggan->kontak_pelanggan }}"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="alamat_pelanggan">
                                    Alamat Pelanggan
                                </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text bg-purple">
                                            <i class="fas fa-location-dot"></i>
                                        </div>
                                    </div>
                                    <textarea id="alamat_pelanggan" name="alamat_pelanggan" class="form-control" disabled="disabled">{{ $pelanggan->alamat_pelanggan }} </textarea>
                                </div>
                            </div>


                            <x-adminlte-input name="created_at" type="text" value="{{ $pelanggan->created_at }}"
                                label="Waktu Ditambahkan" fgroup-class="col-md-12" disabled>

                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>

                            </x-adminlte-input>

                            <x-adminlte-input name="updated_at" type="text" value="{{ $pelanggan->updated_at }}"
                                label="Waktu Diperbaharui" fgroup-class="col-md-12" disabled>

                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>

                            </x-adminlte-input>

                            <x-adminlte-button class="btn bg-purple col-12 simpan" type="submit" label="Simpan Data"
                                icon="fas fa fa-fw fa-save" hidden />

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
                    <h3 class="card-title">Daftar Transaksi {{ $pelanggan->nama_pelanggan }}</h3>
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
                    <table id="tabel-transaksi" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal Transaksi</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>





@stop

@section('css')

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

        //make input available when edit button is clicked
    </script>

    <script>
        $(document).ready(function() {
            $('.edit').click(function() {
                $('#nama_pelanggan').prop('disabled', false);
                $('#alamat_pelanggan').prop('disabled', false);
                $('#kontak_pelanggan').prop('disabled', false);
                $('.simpan').prop('hidden', false);
                $('.edit').prop('hidden', true);

            });

            $('.simpan').click(function() {
                //ajax update data
                $.ajax({
                    url: "{{ route('pelanggan.update', $pelanggan->id) }}",
                    type: 'PUT',
                    data: {
                        nama_pelanggan: $('#nama_pelanggan').val(),
                        alamat_pelanggan: $('#alamat_pelanggan').val(),
                        kontak_pelanggan: $('#kontak_pelanggan').val(),

                    },
                    success: function(data) {
                        $('#nama_pelanggan').prop('disabled', true);
                        $('#alamat_pelanggan').prop('disabled', true);
                        $('#kontak_pelanggan').prop('disabled', true);
                        $('.simpan').prop('hidden', true);
                        $('.edit').prop('hidden', false);


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

    <script>
        $(document).ready(function() {
            //set data table
               $('#tabel-transaksi').DataTable({
                   processing: true,
                   serverSide: true,
                   ajax: "{{ route('pelanggan.getTransaksi', $pelanggan->id) }}",
                   columns: [{
                           data: 'id',
                           name: 'id',

                       },
                       {
                           data: 'created_at',
                           name: 'created_at'
                       },
                       {
                           data: 'total_harga',
                           name: 'total_harga'
                       },
                       {
                           data: 'action',
                           name: 'action'
                       }
                   ]
               });
        });

        //make input available when edit button is clicked
    </script>


@stop
