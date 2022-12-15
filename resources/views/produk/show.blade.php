@extends('adminlte::page')

@section('title', 'Detail Barang')

@section('content_header')
    <h1>Rincian Produk</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card card-dark">
                <div class="card-header border-transparent">
                    <h3 class="card-title"> {{ $produk->nama_produk }} </h3>
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
                        <div class="col-sm-6">

                            <div class="form-group col-md-12">
                                <label class="text-lightdark">
                                    ID Produk
                                </label>
                                <div class="input-group">
                                    <input id="id" name="id" value="{{ $produk->id }}" class="form-control"
                                        disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="produk" class="text-lightdark">
                                    Nama produk
                                </label>
                                <div class="input-group">
                                    <input id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="produk" class="text-lightdark">
                                    Unit Satuan
                                </label>
                                <div class="input-group">
                                    <input id="unit" name="unit" value="{{ $produk->unit }}"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="keterangan" class="text-lightdark">
                                    Keterangan
                                </label>
                                <div class="input-group">
                                    <input id="keterangan" name="keterangan" value="{{ $produk->keterangan }}"
                                        class="form-control" disabled>
                                </div>
                            </div>



                        </div>
                        <div class="col-sm-6">
                            <x-adminlte-select2 name="kategori_id" label="Kategori Produk" label-class="text-lightdark"
                                fgroup-class="col-md-12" data-placeholder="Pilih kategori..." multiple disabled>
                                <option />
                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                </x-slot>
                                <x-slot name="appendSlot">
                                    <x-adminlte-button theme="outline-dark" label="Clear" />
                                </x-slot>
                                @foreach ($kategori as $tambah_kategori)
                                    <option value="{{ $tambah_kategori->id }}">{{ $tambah_kategori->nama_kategori }}
                                    </option>
                                @endforeach

                            </x-adminlte-select2>

                            <x-adminlte-select2 id="jenis_produk" name="jenis_produk" label="Jenis Produk" label-class="text-lightdark"
                                fgroup-class="col-md-12" data-placeholder="Pilih jenis produk..." disabled>

                                <option value="Barang Jadi" {{ $produk->jenis_produk == 'Barang Jadi' ? 'selected' : '' }}>
                                    Barang Jadi</option>
                                <option value="Bahan Baku" {{ $produk->jenis_produk == 'Bahan Baku' ? 'selected' : '' }}>
                                    Bahan Baku</option>
                                <option value="Produk Olahan"
                                    {{ $produk->jenis_produk == 'Produk Olahan' ? 'selected' : '' }}>Produk Olahan</option>
                            </x-adminlte-select2>


                            <x-adminlte-input name="created_at" type="text" value="{{ $produk->created_at }}"
                                label="Waktu Ditambahkan" label-class="text-lightdark" fgroup-class="col-md-12" disabled>

                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>

                            </x-adminlte-input>

                            <x-adminlte-input name="updated_at" type="text" value="{{ $produk->updated_at }}"
                                label="Waktu Diperbaharui" label-class="text-lightdark" fgroup-class="col-md-12" disabled>

                                <x-slot name="prependSlot">
                                    <div class="input-group-text bg-purple">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                </x-slot>

                            </x-adminlte-input>


                        </div>
                    </div>
                    <div class="row">
                        <div class = "col-sm-12">
                            <x-adminlte-button class="btn bg-purple col-12 simpan" type="submit" label="Simpan Data"
                                icon="fas fa fa-fw fa-save" hidden />

                            <x-adminlte-button class="btn bg-purple col-12 edit" type="submit" label="Edit Data"
                                icon="fas fa fa-fw fa-edit" />
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card card-dark">
                <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                    <h3 class="card-title">Daftar Item {{ $produk->nama_produk }}</h3>
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
                    <table id="tabel-produk" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pemasok</th>
                                <th>Merek</th>
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

            let kategori = [];
            let data_kategori = @json($produk->kategori);
            //populate select 2 with kategori
            data_kategori.forEach(element => {
                kategori.push(element.id);
            });
            $('#kategori_id').val(kategori).trigger('change');

        });
    </script>

    <script>
        $(document).ready(function() {
            //data table tabel-transaksi-pelanggan

            var tabelProduk = $('#tabel-produk').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('produk.getBarang', $produk->id) }}",
                    type: 'GET',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        sClass: 'text-center',
                        width: '5%'
                    },
                    {
                        data: 'pemasok.nama_pemasok',
                        name: 'pemasok.nama_pemasok'
                    },
                    {
                        data: 'merek.nama_merek',
                        name: 'merek.nama_merek'
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
                $('#nama_produk').prop('disabled', false);
                $('#keterangan').prop('disabled', false);
                $('#kategori_id').prop('disabled', false);
                $('#unit').prop('disabled', false);
                $('#jenis_produk').prop('disabled', false);
                $('.edit').prop('hidden', true);
                $('.simpan').prop('hidden', false);
                //change label color to available input
                $('#nama_produk').parent().parent().find('label').addClass('text-maroon').removeClass('text-lightdark');
                $('#keterangan').parent().parent().find('label').addClass('text-maroon').removeClass('text-lightdark');
                $('#kategori_id').parent().parent().find('label').addClass('text-maroon').removeClass('text-lightdark');
                $('#unit').parent().parent().find('label').addClass('text-maroon').removeClass('text-lightdark');
                $('#jenis_produk').parent().parent().find('label').addClass('text-maroon').removeClass('text-lightdark');




            });

            $('.simpan').click(function() {
                //ajax update data
                $.ajax({
                    url: "{{ route('produk.update', $produk->id) }}",
                    type: 'PUT',
                    data: {
                        nama_produk: $('#nama_produk').val(),
                        keterangan: $('#keterangan').val(),
                        jenis_produk: $('#jenis_produk').val(),
                        unit: $('#unit').val(),
                        kategori_id: $('#kategori_id').val(),
                    },
                    success: function(data) {
                        $('#nama_produk').prop('disabled', true);
                        $('#keterangan').prop('disabled', true);
                        $('#kategori_id').prop('disabled', true);
                        $('#unit').prop('disabled', true);
                        $('#jenis_produk').prop('disabled', true);
                        $('.edit').prop('hidden', false);
                        $('.simpan').prop('hidden', true);

                        $('#nama_produk').parent().parent().find('label').addClass('text-lightdark').removeClass('text-maroon');
                        $('#keterangan').parent().parent().find('label').addClass('text-lightdark').removeClass('text-maroon');
                        $('#kategori_id').parent().parent().find('label').addClass('text-lightdark').removeClass('text-maroon');
                        $('#unit').parent().parent().find('label').addClass('text-lightdark').removeClass('text-maroon');
                        $('#jenis_produk').parent().parent().find('label').addClass('text-lightdark').removeClass('text-maroon');


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
