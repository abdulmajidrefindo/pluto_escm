@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Pelanggan</h1>
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

            <ul class="nav nav-tabs" id="pelanggan-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pelanggan-tabs-table-tab" data-toggle="pill" href="#pelanggan-tabs-table"
                        role="tab" aria-controls="pelanggan-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pelanggan-tabs-add-tab" data-toggle="pill" href="#pelanggan-tabs-add" role="tab"
                        aria-controls="pelanggan-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah pelanggan
                        Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="pelangganTabContent">
                <div class="tab-pane active show" id="pelanggan-tabs-table" role="tabpanel"
                    aria-labelledby="pelanggan-tabs-table-tab">
                    <div class="table-responsive">
                        <table id="pelanggan-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="pelanggan-tabs-add" role="tabpanel" aria-labelledby="pelanggan-tabs-add-tab">

                    <form id="form_tambah_pelanggan">

                        <div class="row">
                            <div class="col-sm-6">
                                <x-adminlte-input name="nama_pelanggan" label="Nama pelanggan" placeholder="Contoh : Ivan"
                                    fgroup-class="col-md-12" />

                                <x-adminlte-textarea name="alamat_pelanggan" label="Alamat pelanggan" rows=5 igroup-size="sm"
                                    placeholder="Masukan alamat pelanggan..." fgroup-class="col-md-12">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-purple">
                                            <i class="fas fa-lg fa-location-dot text-light"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-textarea>

                                <x-adminlte-input name="kontak_pelanggan" label="Kontak pelanggan" placeholder="083xxxxxxx"
                                    fgroup-class="col-md-12" />
                                    <x-adminlte-button class="btn bg-purple col-12" type="submit" label="Simpan Data"
                                    icon="fas fa fa-fw fa-save" />
                            </div>
                            <div class="col-sm-6 border-left d-flex align-items-center justify-content-center">
                                <span class="fa-stack fa-8x">

                                    <i class="d-none d-sm-block fas fa-tags fa-shake text-purple disabled fa-stack-1x"
                                        style="--fa-beat-scale: 1.1;"></i>

                                </span>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>

    </div>

<!-- modal -->

<div class="modal fade" id="modal_update_pelanggan" tabindex="-1" role="dialog" aria-labelledby="updateModal"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_update_pelanggan">

                        <div class="row">
                            <div class="col-sm-12">

                                <x-adminlte-input name="update_id" label="ID pelanggan" placeholder="ID"
                                    fgroup-class="col-md-12" disabled />
                                <x-adminlte-input name="update_nama_pelanggan" label="Nama pelanggan" placeholder="Contoh : Ivan"
                                    fgroup-class="col-md-12" />

                                <x-adminlte-textarea name="update_alamat_pelanggan" label="Alamat pelanggan" rows=5 igroup-size="sm"
                                    placeholder="Masukan alamat pelanggan..." fgroup-class="col-md-12">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-purple">
                                            <i class="fas fa-lg fa-location-dot text-light"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-textarea>

                                <x-adminlte-input name="update_kontak_pelanggan" label="Kontak pelanggan" placeholder="083xxxxxxx"
                                    fgroup-class="col-md-12" />

                            </div>

                        </div>
                        <div class="row d-grid gap-2">
                            <div class="col-md-6 d-grid gap-2">
                                <x-adminlte-button class="btn col-12 bg-purple rounded-0" name="update_pelanggan"
                                    type="submit" label="Simpan Data" theme="primary" icon="fas fa-fw fa-sm fa-save" />
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

        function resetForm() {
            $('#form_tambah_pelanggan')[0].reset();
            $('#form_tambah_pelanggan').find('.is-invalid').removeClass('is-invalid');
            $('#form_tambah_pelanggan').find('.error').remove();
        }
    </script>

    <script>
        //make datatable for pelanggan
        $(document).ready(function() {
            $('#pelanggan-table').DataTable({ //id table
                processing: true,
                serverSide: true,
                width: '100%',
                ajax: {
                    url: "{{ route('pelanggan.getTable') }}",
                    type: 'GET',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        sClass: 'text-center',
                        width: '5%'
                    },
                    {
                        data: 'nama_pelanggan',
                        name: 'nama_pelanggan',
                    },
                    {
                        data: 'alamat_pelanggan',
                        name: 'alamat_pelanggan',
                        width: '30%'
                    },
                    {
                        data: 'kontak_pelanggan',
                        name: 'kontak_pelanggan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        sClass: 'text-center'
                    }
                ]
            });
        });
    </script>

<script>
    //ajax tambah pelanggan
    $(document).ready(function() {
        $('#form_tambah_pelanggan').on('submit', function(e) {
            e.preventDefault();
            let nama_pelanggan = $('#nama_pelanggan').val();
            let alamat_pelanggan = $('#alamat_pelanggan').val();
            let kontak_pelanggan = $('#kontak_pelanggan').val();
            $.ajax({
                type: "POST",
                url: "{{ route('pelanggan.store') }}",
                data: {
                    nama_pelanggan: nama_pelanggan,
                    alamat_pelanggan: alamat_pelanggan,
                    kontak_pelanggan: kontak_pelanggan
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.success != null) {
                        $('#pelanggan-table').DataTable().ajax.reload();
                        $('#form_tambah_pelanggan')[0].reset();
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
                                $('#pelanggan-table').DataTable().ajax.reload();
                                $('#pelanggan-tabs-table-tab').trigger('click')
                                    .delay(
                                        1000);
                                resetForm();

                            } else {
                                $('#pelanggan-table').DataTable().ajax.reload();
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

                    if (err.status == 422) {
                        console.log('aa');
                        $('#form_tambah_pelanggan').find(".is-invalid").removeClass(
                            "is-invalid");
                        $('#form_tambah_pelanggan').find('.error').remove();

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
                            text: 'Mohon isi data dengan benar!',
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
                }
            });
        });
    });
</script>

<script>
    //populate update form by ajax
    $(document).on('click', '.edit', function() {
        let id = $(this).attr('data-id');
        $.ajax({
            url: "{{ route('pelanggan.index') }}/" + id + "/edit",
            dataType: "json",
            success: function(data) {
                $('#update_id').val(data.id);
                $('#update_nama_pelanggan').val(data.nama_pelanggan);
                $('#update_alamat_pelanggan').val(data.alamat_pelanggan);
                $('#update_kontak_pelanggan').val(data.kontak_pelanggan);
                $('#modal_update_pelanggan').modal('show');
            }
        })
    });
</script>

<script>
    // update form by ajax
    $(document).ready(function() {
        $('#form_update_pelanggan').on('submit', function(e) {
            e.preventDefault();
            let id = $('#update_id').val();
            let nama_pelanggan = $('#update_nama_pelanggan').val();
            let alamat_pelanggan = $('#update_alamat_pelanggan').val();
            let kontak_pelanggan = $('#update_kontak_pelanggan').val();

            $.ajax({
                type: "PUT",
                url: '{{ route('pelanggan.index') }}' + '/' + id,
                data: {
                    nama_pelanggan: nama_pelanggan,
                    alamat_pelanggan: alamat_pelanggan,
                    kontak_pelanggan: kontak_pelanggan
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.success != null) {
                        $('#pelanggan-table').DataTable().ajax.reload();
                        $('#modal_update_pelanggan').modal('hide');
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Data Berhasil Ditambahkan!',
                            icon: 'success',
                            iconColor: '#fff',
                            color: '#fff',
                            background: '#8D72E1',
                            position: 'center',

                            confirmButtonColor: '#541690',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Kembali Ke Daftar Transaksi',


                        }).then((result) => {
                            if (result.isConfirmed) {

                                $('#pelanggan-tabs-table-tab').trigger('click').delay(
                                    1000);
                                resetForm();

                            } else {

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

                    if (err.status == 422) {
                        $('#form_update_pelanggan').find(".is-invalid").removeClass(
                            "is-invalid");
                        $('#form_update_pelanggan').find('.error').remove();

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

                        Swal.fire({
                            title: 'Gagal!',
                            text: 'Mohon isi data dengan benar!',
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
                }

            });
        });
    });
</script>

<script>
    //delete via ajax
    $(document).on('click', '.delete', function() {
        let id = $(this).attr('data-id');
        Swal.fire({
            title: 'Apakah anda yakin?',
                    text: "Data yang dihapus tak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('pelanggan.index') }}" + "/" + id,
                    success: function(response) {
                        if (response.success != null) {
                            $('#pelanggan-table').DataTable().ajax.reload();
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
                    }
                });
            }
        });
    });
</script>

@stop
