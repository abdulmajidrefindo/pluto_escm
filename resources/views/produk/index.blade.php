@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Produk</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        {{ Breadcrumbs::render('produk') }}
        </ol>
    </div>
</div>

@stop

@section('content')
    <!-- This is the card that will contain the table and the form -->
    <div class="card card-dark card-tabs">
        <div class="card-header p-0 pt-1">
            <div class="card-tools">

                <!-- This will cause the card to maximize when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <!-- This will cause the card to collapse when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

            </div>

            <ul class="nav nav-tabs" id="produk-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="produk-tabs-table-tab" data-toggle="pill" href="#produk-tabs-table"
                        role="tab" aria-controls="produk-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="produk-tabs-add-tab" data-toggle="pill" href="#produk-tabs-add" role="tab"
                        aria-controls="produk-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Produk Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="produkTabContent">
                <div class="tab-pane active show" id="produk-tabs-table" role="tabpanel"
                    aria-labelledby="produk-tabs-table-tab">

                    <!-- Table barang -->
                    <div class="table-responsive">
                        <table id="produk-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Produk</th>
                                    <th>Unit</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>

                <div class="tab-pane fade" id="produk-tabs-add" role="tabpanel" aria-labelledby="produk-tabs-add-tab">
                    <form id="form_tambah_produk">

                        <div class="row">
                            <div class="col-sm-6">
                                <x-adminlte-input name="nama_produk" label="Nama Produk"
                                    placeholder="Contoh : Aqua, Indomie, dll." fgroup-class="col-md-12"/>
                                <x-adminlte-input name="unit" label="Unit"
                                    placeholder="Contoh : pcs, lusin, botol, dll.   " fgroup-class="col-md-12"
                                    />
                                <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Contoh : Apa saja "
                                    fgroup-class="col-md-12" />
                                <x-adminlte-select2 name="kategori_id" label="Kategori Produk" label-class=""
                                    fgroup-class="col-md-12" data-placeholder="Pilih kategori..." multiple>
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

                                <x-adminlte-select2 id="jenis_produk" name="jenis_produk" label="Jenis Produk"
                                    label-class="" fgroup-class="col-md-12" data-placeholder="Pilih jenis produk...">
                                    <option />
                                    <option value="Barang Jadi">Barang Jadi</option>
                                    <option value="Bahan Baku">Bahan Baku</option>
                                    <option value="Produk Olahan">Produk Olahan</option>
                                </x-adminlte-select2>


                                <x-adminlte-button class="btn bg-purple col-12" type="submit" label="Simpan Data"
                                    icon="fas fa-sm fa-fw fa-save" />
                            </div>

                            <div class="col-sm-6 border-left d-flex align-items-center justify-content-center">
                                <span class="d-none d-sm-block fa-stack fa-10x">
                                    <i class="fas fa-boxes fa-beat fa-stack-1x text-purple" style="--fa-beat-scale: 1.1;"></i>
                                </span>

                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>
    <!-- /.card -->

    <!-- Modal -->
    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="updateModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_update_produk">

                        <div class="row">
                            <div class="col-sm-12">
                                <x-adminlte-input name="update_id" label="ID Produk" placeholder="ID"
                                    fgroup-class="col-md-12" disabled />
                                <x-adminlte-input name="update_nama_produk" label="Nama Produk"
                                    placeholder="Contoh : Aqua, Indomie, dll." fgroup-class="col-md-12"
                                    />
                                <x-adminlte-input name="update_unit" label="Unit"
                                    placeholder="Contoh : pcs, lusin, botol, dll.   " fgroup-class="col-md-12"
                                    />
                                <x-adminlte-input name="update_keterangan" label="Keterangan"
                                    placeholder="Contoh : Apa saja " fgroup-class="col-md-12" />
                                <x-adminlte-select2 name="update_kategori_id" label="Kategori Produk" label-class=""
                                    fgroup-class="col-md-12" data-placeholder="Pilih kategori..." multiple>
                                    <option />
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-purple">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                    </x-slot>
                                    <x-slot name="appendSlot">
                                        <x-adminlte-button theme="outline-dark" label="Clear" />
                                    </x-slot>
                                    @foreach ($kategori as $update_kategori)
                                        <option value="{{ $update_kategori->id }}">{{ $update_kategori->nama_kategori }}
                                        </option>
                                    @endforeach

                                </x-adminlte-select2>

                                <x-adminlte-select2 id="update_jenis_produk" name="update_jenis_produk"
                                    label="Jenis Produk" label-class="" fgroup-class="col-md-12"
                                    data-placeholder="Pilih jenis produk...">
                                    <option />
                                    <option value="Barang Jadi">Barang Jadi</option>
                                    <option value="Bahan Baku">Bahan Baku</option>
                                    <option value="Produk Olahan">Produk Olahan</option>
                                </x-adminlte-select2>



                            </div>
                        </div>
                        <div class="row d-grid gap-2">
                            <div class="col-md-6 d-grid gap-2">
                                <x-adminlte-button class="btn col-12 bg-purple rounded-0" name="update_produk" type="submit"
                                    label="Simpan Data" theme="primary" icon="fas fa-fw fa-sm fa-save" />
                            </div>
                            <div class="col-md-6">
                                <x-adminlte-button data-dismiss="modal" class="btn btn-block col-12 rounded-0 bg-maroon"
                                    name="close_produk" type="button" label="Cancel"
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
            //set csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    <script>
        //document ready
        $(document).ready(function() {
            //datatable
            $('#produk-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: "{{ route('produk.getTable') }}",
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                    },

                    {
                        data: 'nama_produk',
                        name: 'nama_produk'
                    },
                    {
                        data: 'unit',
                        name: 'unit'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                ]
            }); //end of datatable

            $(document).on('click', '.delete', function() {
                Swal.fire({
                    title: 'SEMUA ITEM BARANG dan TRANSAKSI yang berkaitan akan terhapus!!',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        let id = $(this).attr('data-id');
                        deleteData(id);
                    }
                });
            });


        });

        //delete data with ajax
        function deleteData(id) {
            $.ajax({
                url: "{{ route('produk.index') }}" + '/' + id,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(response) {
                    if (response.success != null) {
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
                        $('#produk-table').DataTable().ajax.reload();
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
                error: function(response) {
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


        //end of document ready
    </script>
    <script>
        $(document).ready(function() {
            //input data ajax
            $('#form_tambah_produk').on('submit', function(e) {
                e.preventDefault();
                //csrf token
                let token = $('meta[name="csrf-token"]').attr('content');
                let nama_produk = $('#nama_produk').val();
                let unit = $('#unit').val();
                let keterangan = $('#keterangan').val();
                let jenis_produk = $('#jenis_produk').val();
                let kategori_id = $('#kategori_id').val();

                $.ajax({
                    url: "{{ route('produk.store') }}",
                    type: "POST",
                    data: {

                        nama_produk: nama_produk,
                        unit: unit,
                        keterangan: keterangan,
                        jenis_produk: jenis_produk,
                        kategori_id: kategori_id,
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success != null) {
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
                                    $('#produk-table').DataTable().ajax.reload();
                                    $('#produk-tabs-table-tab').trigger('click').delay(
                                        1000);
                                    resetForm();

                                } else {
                                    $('#produk-table').DataTable().ajax.reload();
                                    resetForm();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Data Gagal Disimpan',
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
                        if (err.status == 422) {

                            $('#form_tambah_produk').find('.is-invalid').removeClass(
                                'is-invalid');
                            $('#form_tambah_produk').find('.error').remove();

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
        });
    </script>

    <script>
        //ajax populate form from id
        $(document).on('click', '.edit', function() {
            var id = $(this).attr('data-id');

            $.ajax({
                url: "{{ route('produk.index') }}" + "/" + id + "/edit",
                dataType: "json",
                success: function(data) {
                    let kategori = [];
                    $.each(data.kategori, function(key, value) {
                        kategori.push(value.id);
                    });
                    $('#update_nama_produk').val(data.nama_produk);
                    $('#update_unit').val(data.unit);
                    $('#update_keterangan').val(data.keterangan);
                    $('#update_kategori_id').val(kategori).trigger('change');
                    $('#update_id').val(data.id);
                    $('#update_jenis_produk').val(data.jenis_produk).trigger('change');
                    $('#update-modal').modal('show');
                }
            })
        });
    </script>

<script>
    //ajax update form
    $(document).ready(function() {
        $('#form_update_produk').on('submit', function(e) {
            e.preventDefault();
            let id = $('#update_id').val();
            let nama_produk = $('#update_nama_produk').val();
            let unit = $('#update_unit').val();
            let keterangan = $('#update_keterangan').val();
            let jenis_produk = $('#update_jenis_produk').val();
            let kategori_id = $('#update_kategori_id').val();

            $.ajax({
                url: "{{ route('produk.index') }}" + "/" + id,
                type: "PUT",
                data: {
                    nama_produk: nama_produk,
                    unit: unit,
                    keterangan: keterangan,
                    jenis_produk: jenis_produk,
                    kategori_id: kategori_id,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success != null) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data Berhasil Diubah!',
                            icon: 'success',
                            iconColor: '#fff',
                            color: '#fff',
                            background: '#8D72E1',
                            position: 'center',
                            showCancelButton: true,
                            confirmButtonColor: '#541690',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Lihat Data',
                            cancelButtonText: 'Tutup',
                        }).then((result) => { //result is boolean
                            $('#produk-table').DataTable().ajax.reload();
                            resetForm();
                            if (result.isConfirmed) {
                                $('#produk-tabs-table-tab').trigger('click').delay(
                                    1000);
                            }
                            $('#update-modal').modal('hide');
                        });
                    }
                },
                error: function(err) {
                    console.log(err);
                    if (err.status == 422) {

                        $('#form_update_produk').find('.is-invalid').removeClass(
                            'is-invalid');
                        $('#form_update_produk').find('.error').remove();

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
                        }
                    }
            });
        });




    });

</script>

    <script>
        function resetForm() {
            $('#form_tambah_produk')[0].reset();

            $('#form_tambah_produk').find('.is-invalid').removeClass('is-invalid');
            $('#form_tambah_produk').find('.error').remove();

            //reset select
            $('#kategori_id').val(null).trigger('change');


        }
    </script>
@stop
