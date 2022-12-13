@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Merek</h1>
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
            <!-- /.card-tools -->
            <ul class="nav nav-tabs" id="merek-tabs" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="merek-tabs-table-tab" data-toggle="pill" href="#merek-tabs-table"
                        role="tab" aria-controls="merek-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Merek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="merek-tabs-add-tab" data-toggle="pill" href="#merek-tabs-add" role="tab"
                        aria-controls="merek-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Merek
                        Baru</a>
                </li>
            </ul>

        </div>
        <div class="card-body">
            <div class="tab-content" id="merekTabContent">
                <div class="tab-pane active show" id="merek-tabs-table" role="tabpanel"
                    aria-labelledby="merek-tabs-table-tab">
                    <div class="table-responsive">
                        <table id="merek-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Merek</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="merek-tabs-add" role="tabpanel" aria-labelledby="merek-tabs-add-tab">
                    <form id="form_tambah_merek">
                        <div class="row">
                            <div class="col-sm-6">
                                <x-adminlte-input name="nama_merek" label="Nama Merek" placeholder="Contoh : Indofood"
                                    fgroup-class="col-md-12" />
                                <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Contoh : Ngga tau"
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

    <div class="modal fade" id="modal_update_merek" tabindex="-1" role="dialog" aria-labelledby="updateModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="form_update_merek">
                        <div class="row">
                            <div class="col-sm-12">
                                <x-adminlte-input name="update_id" label="ID Merek" placeholder="ID"
                                    fgroup-class="col-md-12" disabled />
                                <x-adminlte-input name="update_nama_merek" label="Nama Merek"
                                    placeholder="Contoh : Indofood" fgroup-class="col-md-12" />
                                <x-adminlte-input name="update_keterangan" label="Keterangan"
                                    placeholder="Contoh : Ngga tau" fgroup-class="col-md-12" />

                            </div>

                        </div>
                        <div class="row d-grid gap-2">
                            <div class="col-md-6 d-grid gap-2">
                                <x-adminlte-button class="btn col-12 bg-purple rounded-0" name="update_produk"
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
    </script>


    <script>
        //make datatable for merek
        $(document).ready(function() {
            $('#merek-table').DataTable({ //id table
                processing: true,
                serverSide: true,
                width: '100%',
                ajax: {
                    url: "{{ route('merek.getTable') }}",
                    type: 'GET',
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        sClass: 'text-center',
                        width: '5%'
                    },
                    {
                        data: 'nama_merek',
                        name: 'nama_merek'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
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
        //ajax tambah barang
        $(document).ready(function() {
            $('#form_tambah_merek').on('submit', function(e) {
                e.preventDefault();
                let nama_merek = $('#nama_merek').val();
                let keterangan = $('#keterangan').val();
                $.ajax({
                    type: "POST",
                    url: "{{ route('merek.store') }}",
                    data: {
                        nama_merek: nama_merek,
                        keterangan: keterangan
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.success != null) {
                            $('#merek-table').DataTable().ajax.reload();
                            $('#form_tambah_merek')[0].reset();
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
                                    $('#merek-table').DataTable().ajax.reload();
                                    $('#merek-tabs-table-tab').trigger('click').delay(
                                        1000);
                                    resetForm();

                                } else {
                                    $('#merek-table').DataTable().ajax.reload();
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
                            $('#form_tambah_merek').find(".is-invalid").removeClass(
                                "is-invalid");
                            $('#form_tambah_merek').find('.error').remove();

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
                url: "{{ route('merek.index') }}/" + id + "/edit",
                dataType: "json",
                success: function(data) {
                    $('#update_id').val(data.id);
                    $('#update_nama_merek').val(data.nama_merek);
                    $('#update_keterangan').val(data.keterangan);
                    $('#modal_update_merek').modal('show');
                }
            })
        });
    </script>

    <script>
        //populate update form by ajax
        $(document).ready(function() {
            $('#form_update_merek').on('submit', function(e) {
                e.preventDefault();
                let id = $('#update_id').val();
                let nama_merek = $('#update_nama_merek').val();
                let keterangan = $('#update_keterangan').val();
                $.ajax({
                    type: "PUT",
                    url: "{{ route('merek.index') }}" + "/" + id,
                    data: {
                        nama_merek: nama_merek,
                        keterangan: keterangan
                    },
                    dataType: "JSON",
                    success: function(response) {
                        if (response.success != null) {
                            $('#merek-table').DataTable().ajax.reload();
                            $('#modal_update_merek').modal('hide');
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

                                    $('#merek-tabs-table-tab').trigger('click').delay(
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
                            console.log('aa');
                            $('#form_tambah_merek').find(".is-invalid").removeClass(
                                "is-invalid");
                            $('#form_tambah_merek').find('.error').remove();

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
                    url: "{{ route('merek.index') }}" + "/" + id,
                    success: function(response) {
                        if (response.success != null) {
                            $('#merek-table').DataTable().ajax.reload();
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

    <script>
        function resetForm() {
            $('#form_tambah_merek')[0].reset();
            $('#form_tambah_merek').find('.is-invalid').removeClass('is-invalid');
            $('#form_tambah_merek').find('.error').remove();
        }
    </script>

@stop
