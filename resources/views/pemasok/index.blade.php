@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Pemasok</h1>
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

            <ul class="nav nav-tabs" id="pemasok-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pemasok-tabs-table-tab" data-toggle="pill" href="#pemasok-tabs-table"
                        role="tab" aria-controls="pemasok-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Pemasok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pemasok-tabs-add-tab" data-toggle="pill" href="#pemasok-tabs-add" role="tab"
                        aria-controls="pemasok-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Pemasok
                        Baru</a>
                </li>
            </ul>

        </div>

        <div class="card-body">
            <div class="tab-content" id="pemasokTabContent">
                <div class="tab-pane active show" id="pemasok-tabs-table" role="tabpanel"
                    aria-labelledby="pemasok-tabs-table-tab">
                    <div class="table-responsive">
                        <table id="pemasok-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama pemasok</th>
                                    <th>Alamat</th>
                                    <th>Kontak</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="pemasok-tabs-add" role="tabpanel" aria-labelledby="pemasok-tabs-add-tab">

                    <form id="form_tambah_pemasok">

                        <div class="row">
                            <div class="col-sm-6">
                                <x-adminlte-input name="nama_pemasok" label="Nama Pemasok" placeholder="Contoh : Ivan"
                                    fgroup-class="col-md-12" />

                                <x-adminlte-textarea name="alamat_pemasok" label="Alamat Pemasok" rows=5 igroup-size="sm"
                                    placeholder="Masukan alamat pemasok..." fgroup-class="col-md-12">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-purple">
                                            <i class="fas fa-lg fa-location-dot text-light"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-textarea>

                                <x-adminlte-input name="kontak_pemasok" label="Kontak Pemasok" placeholder="083xxxxxxx"
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

<div class="modal fade" id="modal_update_pemasok" tabindex="-1" role="dialog" aria-labelledby="updateModal"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_update_pemasok">

                        <div class="row">
                            <div class="col-sm-12">

                                <x-adminlte-input name="update_id" label="ID Pemasok" placeholder="ID"
                                    fgroup-class="col-md-12" disabled />
                                <x-adminlte-input name="update_nama_pemasok" label="Nama Pemasok" placeholder="Contoh : Ivan"
                                    fgroup-class="col-md-12" />

                                <x-adminlte-textarea name="update_alamat_pemasok" label="Alamat Pemasok" rows=5 igroup-size="sm"
                                    placeholder="Masukan alamat pemasok..." fgroup-class="col-md-12">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-purple">
                                            <i class="fas fa-lg fa-location-dot text-light"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-textarea>

                                <x-adminlte-input name="update_kontak_pemasok" label="Kontak Pemasok" placeholder="083xxxxxxx"
                                    fgroup-class="col-md-12" />

                            </div>

                        </div>
                        <div class="row d-grid gap-2">
                            <div class="col-md-6 d-grid gap-2">
                                <x-adminlte-button class="btn col-12 bg-purple rounded-0" name="update_pemasok"
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
            $('#form_tambah_pemasok')[0].reset();
            $('#form_tambah_pemasok').find('.is-invalid').removeClass('is-invalid');
            $('#form_tambah_pemasok').find('.error').remove();
        }
    </script>

    <script>
        //make datatable for pemasok
        $(document).ready(function() {
            $('#pemasok-table').DataTable({ //id table
                processing: true,
                serverSide: true,
                width: '100%',
                ajax: {
                    url: "{{ route('pemasok.getTable') }}",
                    type: 'GET',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        sClass: 'text-center',
                        width: '5%'
                    },
                    {
                        data: 'nama_pemasok',
                        name: 'nama_pemasok',
                    },
                    {
                        data: 'alamat_pemasok',
                        name: 'alamat_pemasok',
                        width: '30%'
                    },
                    {
                        data: 'kontak_pemasok',
                        name: 'kontak_pemasok'
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
    //ajax tambah pemasok
    $(document).ready(function() {
        $('#form_tambah_pemasok').on('submit', function(e) {
            e.preventDefault();
            let nama_pemasok = $('#nama_pemasok').val();
            let alamat_pemasok = $('#alamat_pemasok').val();
            let kontak_pemasok = $('#kontak_pemasok').val();
            $.ajax({
                type: "POST",
                url: "{{ route('pemasok.store') }}",
                data: {
                    nama_pemasok: nama_pemasok,
                    alamat_pemasok: alamat_pemasok,
                    kontak_pemasok: kontak_pemasok
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.success != null) {
                        $('#pemasok-table').DataTable().ajax.reload();
                        $('#form_tambah_pemasok')[0].reset();
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
                                $('#pemasok-table').DataTable().ajax.reload();
                                $('#pemasok-tabs-table-tab').trigger('click')
                                    .delay(
                                        1000);
                                resetForm();

                            } else {
                                $('#pemasok-table').DataTable().ajax.reload();
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
                        $('#form_tambah_pemasok').find(".is-invalid").removeClass(
                            "is-invalid");
                        $('#form_tambah_pemasok').find('.error').remove();

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
            url: "{{ route('pemasok.index') }}/" + id + "/edit",
            dataType: "json",
            success: function(data) {
                $('#update_id').val(data.id);
                $('#update_nama_pemasok').val(data.nama_pemasok);
                $('#update_alamat_pemasok').val(data.alamat_pemasok);
                $('#update_kontak_pemasok').val(data.kontak_pemasok);
                $('#modal_update_pemasok').modal('show');
            }
        })
    });
</script>

<script>
    // update form by ajax
    $(document).ready(function() {
        $('#form_update_pemasok').on('submit', function(e) {
            e.preventDefault();
            let id = $('#update_id').val();
            let nama_pemasok = $('#update_nama_pemasok').val();
            let alamat_pemasok = $('#update_alamat_pemasok').val();
            let kontak_pemasok = $('#update_kontak_pemasok').val();

            $.ajax({
                type: "PUT",
                url: '{{ route('pemasok.index') }}' + '/' + id,
                data: {
                    nama_pemasok: nama_pemasok,
                    alamat_pemasok: alamat_pemasok,
                    kontak_pemasok: kontak_pemasok
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.success != null) {
                        $('#pemasok-table').DataTable().ajax.reload();
                        $('#modal_update_pemasok').modal('hide');
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

                                $('#pemasok-tabs-table-tab').trigger('click').delay(
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
                        $('#form_update_pemasok').find(".is-invalid").removeClass(
                            "is-invalid");
                        $('#form_update_pemasok').find('.error').remove();

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
                    url: "{{ route('pemasok.index') }}" + "/" + id,
                    success: function(response) {
                        if (response.success != null) {
                            $('#pemasok-table').DataTable().ajax.reload();
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
