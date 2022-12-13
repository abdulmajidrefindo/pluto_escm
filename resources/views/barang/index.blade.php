@extends('adminlte::page')

@section('plugins.Select2', true)

@section('title', 'Barang')

@section('content_header')
    <h1>Barang</h1>
@stop

@section('content')






    <div class="card card-dark card-tabs">
        <div class="card-header p-0 pt-1">
            <div class="card-tools">

                <!-- This will cause the card to maximize when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <!-- This will cause the card to collapse when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

            </div>

            <ul class="nav nav-tabs" id="barang-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="barang-tabs-table-tab" data-toggle="pill" href="#barang-tabs-table"
                        role="tab" aria-controls="barang-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Barang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="barang-tabs-add-tab" data-toggle="pill" href="#barang-tabs-add" role="tab"
                        aria-controls="barang-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Barang
                        Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="barangTabContent">
                <div class="tab-pane active show" id="barang-tabs-table" role="tabpanel"
                    aria-labelledby="barang-tabs-table-tab">

                    <!-- Table barang -->
                    <div class="table-responsive">
                        <table id="barang-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Merek</th>
                                    <th>Pemasok</th>

                                    <th>Harga</th>
                                    <th>Total Terjual</th>
                                    <th>Total Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>



                </div>
                <div class="tab-pane fade" id="barang-tabs-add" role="tabpanel" aria-labelledby="barang-tabs-add-tab">

                    <!-- Form input barang -->

                    <form id="form_tambah_barang">

                        <div class="row">
                            <div class="col-sm">
                                <x-adminlte-select2 name="produk_id" label="Produk" label-class="text-lightdark"
                                    fgroup-class="col-md-6" data-placeholder="Pilih produk...">
                                    <option />
                                    @foreach ($produk as $tambahProduk)
                                        <option value="{{ $tambahProduk->id }}">{{ $tambahProduk->nama_produk }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-select2 name="merek_id" label="Merek Barang" label-class="text-lightdark"
                                    fgroup-class="col-md-6" data-placeholder="Pilih merek...">
                                    <option />
                                    @foreach ($merek as $tambahMerek)
                                        <option value="{{ $tambahMerek->id }}">{{ $tambahMerek->nama_merek }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-select2 name="pemasok_id" label="Pemasok" label-class="text-lightdark"
                                    fgroup-class="col-md-6" data-placeholder="Pilih pemasok...">
                                    <option />
                                    @foreach ($pemasok as $tambahPemasok)
                                        <option value="{{ $tambahPemasok->id }}">{{ $tambahPemasok->nama_pemasok }}</option>
                                    @endforeach
                                </x-adminlte-select2>

                                <x-adminlte-input name="sku" label="SKU Barang" label-class="text-lightdark"
                                    placeholder="Stock Keeping Unit." fgroup-class="col-md-6" disable-feedback />

                                <x-adminlte-input name="harga" label="Harga Barang" label-class="text-lightdark"
                                    placeholder="Rp.-  " fgroup-class="col-md-6"
                                    disable-feedback />

                                <x-adminlte-input name="total_stok" label="Total Stok Barang" label-class="text-lightdark"
                                    placeholder="Banyaknya stok yang tersedia." fgroup-class="col-md-6" disable-feedback />

                                <x-adminlte-button class="btn" type="submit" name="tambah_barang" label="Simpan Data"
                                    theme="info" icon="fas fa-lg fa-save" />
                            </div>
                        </div>
                    </form>

                    <!-- End of form input barang -->

                </div>

            </div>
        </div>



    </div>


    <!-- End of card barang -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="updateModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <form id="form_update_barang">
                        <div class="row">

                            <x-adminlte-input type="text" value="ITM" name="update_id" label="ID Barang"
                                placeholder="" fgroup-class="col-md-6 col-lg-12" disabled />

                            <x-adminlte-select2 name="update_produk_id" label="Nama Produk" label-class="text-lightdark"
                                fgroup-class="col-sm-7 col-md-6 col-lg-7" data-placeholder="Pilih produk...">
                                <option />
                                @foreach ($produk as $updateProduk)
                                    <option value="{{ $updateProduk->id }}">{{ $updateProduk->nama_produk }}</option>
                                @endforeach

                            </x-adminlte-select2>

                            <x-adminlte-select2 name="update_merek_id" label="Merek Barang" label-class="text-lightdark"
                                fgroup-class="col-sm-5 col-md-5 col-lg-5" data-placeholder="Pilih merek...">
                                <option />
                                @foreach ($merek as $updateMerek)
                                    <option value="{{ $updateMerek->id }}">{{ $updateMerek->nama_merek }}</option>
                                @endforeach

                            </x-adminlte-select2>



                            <x-adminlte-select2 name="update_pemasok_id" label="Nama Pemasok"
                                label-class="text-lightdark" fgroup-class="col-sm-12 col-md-12 col-lg-12"
                                data-placeholder="Pilih pemasok...">
                                <option />
                                @foreach ($pemasok as $updatePemasok)
                                    <option value="{{ $updatePemasok->id }}">{{ $updatePemasok->nama_pemasok }}</option>
                                @endforeach

                            </x-adminlte-select2>

                            <x-adminlte-input type="number" value="" name="update_sku"
                                label="Nomor SKU (Stok Keeping Unit)" placeholder=""
                                fgroup-class="col-md-12 col-lg-12" />

                            <x-adminlte-input type="number" value="" name="update_harga" label="Harga Barang"
                                placeholder="" fgroup-class="col-sm-6 col-md-6 col-lg-6" />

                            <x-adminlte-input type="number" value="" name="update_total_terjual"
                                label="Total Barang Terjual" placeholder="" fgroup-class="col-sm-6 col-md-6 col-lg-6" />

                            <x-adminlte-input type="number" value="" name="update_total_masuk"
                                label="Total Barang Masuk" placeholder="" fgroup-class="col-sm-6 col-md-6 col-lg-6" />

                            <x-adminlte-input type="number" value="" name="update_total_stok"
                                label="Total Stok Barang" placeholder="" fgroup-class="col-sm-6 col-md-6 col-lg-6" />


                        </div>

                        <div class="row d-grid gap-2">
                            <div class="col-md-6 d-grid gap-2">
                                <x-adminlte-button class="btn col-12 rounded-0" name="update_barang" type="submit"
                                    label="Update" theme="primary" icon="fas fa-fw fa-sm fa-save" />


                            </div>

                            <div class="col-md-6">
                                <x-adminlte-button data-dismiss="modal" class="btn btn-block col-12 rounded-0"
                                    name="update_barang" type="button" label="Cancel" theme="danger"
                                    icon="fas fa-fw fa-sm fa-window-close" />

                            </div>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->




@stop


@section('js')
    <script>
        $(document).ready(function() {

            //csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#barang-table').DataTable({
                processing: true,
                serverSide: true,
                width: '100%',
                ajax: "{{ route('barang.getTable') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        width: '5%',
                        sClass: 'text-center'
                    },
                    {
                        data: 'produk.nama_produk',
                        name: 'produk.nama_produk'
                    },
                    {
                        data: 'merek.nama_merek',
                        name: 'merek.nama_merek',


                    },
                    {
                        data: 'pemasok.nama_pemasok',
                        name: 'pemasok.nama_pemasok'
                    },

                    {
                        data: 'harga',
                        name: 'harga'

                    },
                    {
                        data: 'total_terjual',
                        name: 'total_terjual'
                    },
                    {
                        data: 'total_stok',
                        name: 'total_stok'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        sClass: 'text-center'
                    },
                ]
            });

            //delete data pelanggan
            $(document).on('click', '.delete', function() {
                let id = $(this).attr('data-id');
                deleteData(id);
            });

        });

        //function delete data
        //delete data
        function deleteData(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "SEMUA data TRANSAKSI yang berkaitan dengan barang ini akan terhapus!!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Anda benar-benar yakin?',
                        text: "Data yang terhapus tak dapat dikembalikan!!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: 'DELETE',
                                url: '{{ route('barang.index') }}' + '/' + id,
                                dataType: 'json',
                                success: function(data) {
                                    if (data.success != null) {
                                        Swal.fire({
                                            title: 'Berhasil!',
                                            text: 'Data Berhasil Dihapus',
                                            icon: 'success',
                                            iconColor: '#fff',
                                            color: '#fff',
                                            toast: true,
                                            background: '#8D72E1',
                                            position: 'top',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,

                                        });
                                        $('#barang-table').DataTable().ajax
                                            .reload();
                                    } else {
                                        Swal.fire({
                                            title: 'Gagal!',
                                            text: 'Data Gagal Dihapus',
                                            icon: 'error',
                                            iconColor: '#fff',
                                            toast: true,
                                            background: '#f8bb86',
                                            position: 'center-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,

                                        });
                                    }

                                },
                                errors: function(data) {
                                    Swal.fire({
                                        title: 'Gagal!',
                                        text: 'Data Gagal Dihapus',
                                        icon: 'error',
                                        iconColor: '#fff',
                                        toast: true,
                                        background: '#f8bb86',
                                        position: 'center-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,

                                    });
                                }

                            });

                        }
                    })
                }
            })
        }
    </script>


    <script>
        $(document).on('click', '.edit', function() {
            //update
            //populate form
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'GET',
                url: '{{ route('barang.index') }}' + '/' + id + '/edit',
                dataType: 'json',
                success: function(data) {

                    $('#update_id').val(data.id);

                    $('#update_produk_id').val(data.produk.id).trigger('change');
                    $('#update_merek_id').val(data.merek.id).trigger('change');
                    $('#update_pemasok_id').val(data.pemasok.id).trigger('change');
                    $('#update_harga').val(data.harga);
                    $('#update_sku').val(data.sku);
                    $('#update_total_masuk').val(data.total_masuk);
                    $('#update_total_terjual').val(data.total_terjual);
                    $('#update_total_stok').val(data.total_stok);
                    $('#update-modal').modal('show');

                }
            });
            //end populate form
        });

        //update ajax
        $('#form_update_barang').on('submit', function(e) {
            e.preventDefault();
            let id = $('#update_id').val();
            let produk_id = $('#update_produk_id').val();
            let merek_id = $('#update_merek_id').val();
            let pemasok_id = $('#update_pemasok_id').val();
            let harga = $('#update_harga').val();
            let sku = $('#update_sku').val();
            let total_masuk = $('#update_total_masuk').val();
            let total_terjual = $('#update_total_terjual').val();
            let total_stok = $('#update_total_stok').val();

            $.ajax({
                type: 'PUT',
                url: '{{ route('barang.index') }}' + '/' + id,
                data: {
                    id: id,
                    produk_id: produk_id,
                    merek_id: merek_id,
                    pemasok_id: pemasok_id,
                    harga: harga,
                    sku: sku,
                    total_masuk: total_masuk,
                    total_terjual: total_terjual,
                    total_stok: total_stok,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.success != null) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data Berhasil Diubah',
                            icon: 'success',
                            iconColor: '#fff',
                            color: '#fff',
                            toast: true,
                            background: '#8D72E1',
                            position: 'top',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,

                        });
                        $('#barang-table').DataTable().ajax.reload();
                        $('#update-modal').modal('hide');
                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Data Gagal Diubah',
                            icon: 'error',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,

                        });
                    }

                },
                error: function(err) {
                    console.log(err);
                    if (err.status == 404) {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Data Gagal Ditemukan',
                            icon: 'error',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,

                        });
                    }
                    if (err.status == 422) {
                        //send error to adminlte form
                        $.each(err.responseJSON.errors, function(i, error) {
                            var el = $(document).find('[name="update_' + i + '"]');

                            if (el.hasClass('is-invalid')) {
                                el.removeClass('is-invalid');
                                el.next().remove();
                            }

                            el.addClass('is-invalid');
                            el.after($('<span class="error invalid-feedback">' +
                                error[0] + '</span>'));
                        });
                        //swal toast

                    }
                }

            });




        });
        //end update ajax
    </script>

    <script>
        //ajax input form_tambah_barang serialize
        $('#form_tambah_barang').on('submit', function(e) {
            console.log($('#produk_id').val());
            e.preventDefault();
            let produk_id = $('#produk_id').val();
            let merek_id = $('#merek_id').val();
            let pemasok_id = $('#pemasok_id').val();
            let harga = $('#harga').val();
            let sku = $('#sku').val();
            let total_masuk = $('#total_masuk').val();
            let total_terjual = $('#total_terjual').val();
            let total_stok = $('#total_stok').val();


            $.ajax({
                type: 'POST',
                url: '{{ route('barang.store') }}',
                data: {
                    produk_id: produk_id,
                    merek_id: merek_id,
                    pemasok_id: pemasok_id,
                    harga: harga,
                    sku: sku,
                    total_stok: total_stok,

                },
                dataType: 'json',
                success: function(data) {
                    if (data.success != null) {

                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data Berhasil Ditambahkan!',
                            icon: 'success',
                            iconColor: '#fff',
                            color: '#fff',
                            background: '#8D72E1',
                            position: 'center',
                            showCancelButton: true,
                            confirmButtonColor: '#541690',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Kembali Ke Daftar Transaksi',
                            cancelButtonText: 'Tutup',

                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#barang-table').DataTable().ajax.reload();
                                $('#barang-tabs-table-tab').trigger('click').delay(1000);
                                resetForm();

                            } else {
                                $('#barang-table').DataTable().ajax.reload();
                                resetForm();
                            }
                        });

                    } else {
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Data Gagal Ditambahkan',
                            icon: 'error',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,

                        });
                    }


                }, //end success
                error: function(err) {
                    console.log(err);
                    if (err.status == 422) {

                        $('#form_tambah_barang').find('.is-invalid').removeClass('is-invalid');
                         $('#form_tambah_barang').find('.error').remove();

                        //send error to adminlte form
                        $.each(err.responseJSON.errors, function(i, error) {
                            var el = $(document).find('[name="' + i + '"]');

                            if (el.hasClass('is-invalid')) {
                                el.removeClass('is-invalid');
                                el.next().remove();
                            }

                            el.addClass('is-invalid');
                            el.after($('<span class="error invalid-feedback">' +
                                error[0] + '</span>'));
                        });
                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Masukan data dengan benar!',
                            icon: 'error',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,

                        });
                    }
                } //end error
            });
        });

        //end ajax input form_tambah_barang serialize

        //reset form
        function resetForm() {
            $('#form_tambah_barang')[0].reset();

            $('#form_tambah_barang').find('.is-invalid').removeClass('is-invalid');
            $('#form_tambah_barang').find('.error').remove();

            //reset select
            $('#produk_id').val(null).trigger('change');
            $('#merek_id').val(null).trigger('change');
            $('#pemasok_id').val(null).trigger('change');

        }

    </script>
@stop
