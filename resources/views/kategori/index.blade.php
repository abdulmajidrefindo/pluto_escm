

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Daftar Kategori</h1>
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
            <ul class="nav nav-tabs" id="katefori-tabs" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="kategori-tabs-table-tab" data-toggle="pill" href="#kategori-tabs-table"
                        role="tab" aria-controls="kategori-tabs-table" aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="kategori-tabs-add-tab" data-toggle="pill" href="#kategori-tabs-add"
                        role="tab" aria-controls="kategori-tabs-add" aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Kategori
                        Baru</a>
                </li>
            </ul>

        </div>
        <div class="card-body">
            <div class="tab-content" id="kategoriTabContent">
                <div class="tab-pane active show" id="kategori-tabs-table" role="tabpanel"
                    aria-labelledby="kategori-tabs-table-tab">
                    <div class="table-responsive">
                        <table id="kategori-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="kategori-tabs-add" role="tabpanel"
                    aria-labelledby="kategori-tabs-add-tab">
                    <form id ="form_tambah_kategori">

                        <div class="row">
                            <div class="col-sm-6">
                                <x-adminlte-input name="nama_kategori" label="Nama Kategori" placeholder="Contoh : Minuman"
                                    fgroup-class="col-md-12" disable-feedback />
                                <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Contoh : Detail Kategori"
                                    fgroup-class="col-md-12" disable-feedback />
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

    <div class="modal fade" id="modal_update_kategori" tabindex="-1" role="dialog" aria-labelledby="updateModal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form>

                        <div class="row">
                            <div class="col-sm-12">
                                <x-adminlte-input name="update_id" label="ID Kategori" placeholder="ID"
                                    fgroup-class="col-md-12" disabled />
                                <x-adminlte-input name="update_nama_kategori" label="Nama Kategori" placeholder="Contoh : Minuman"
                                    fgroup-class="col-md-12" disable-feedback />
                                <x-adminlte-input name="keterangan" label="Keterangan" placeholder="Detail Kategori"
                                    fgroup-class="col-md-12" disable-feedback />
                                    <x-adminlte-button class="btn bg-purple col-12" type="submit" label="Simpan Data"
                                    icon="fas fa fa-fw fa-save" />
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
    //make datatable for kategori
    $(document).ready(function() {
        $('#kategori-table').DataTable({ //id table
            processing: true,
            serverSide: true,
            width: '100%',
            ajax: {
                url: "{{ route('kategori.getTable') }}",
                type: 'GET',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    sClass: 'text-center',
                    width: '5%'
                },
                {
                    data: 'nama_kategori',
                    name: 'nama_kategori'
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
    //ajax tambah kategori
    $(document).ready(function() {
        $('#form_tambah_kategori').on('submit', function(e) {
            e.preventDefault();
            let nama_kategori = $('#nama_kategori').val();
            let keterangan = $('#keterangan').val();
            $.ajax({
                type: "POST",
                url: "{{ route('kategori.store') }}",
                data: {
                    nama_kategori: nama_kategori,
                    keterangan: keterangan
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.success != null) {
                        $('#kategori-table').DataTable().ajax.reload();
                        $('#form_tambah_kategori')[0].reset();
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
                                $('#kategori-table').DataTable().ajax.reload();
                                $('#kategori-tabs-table-tab').trigger('click').delay(
                                    1000);
                                resetForm();

                            } else {
                                $('#kategori-table').DataTable().ajax.reload();
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
                        $('#form_tambah_kategori').find(".is-invalid").removeClass(
                            "is-invalid");
                        $('#form_tambah_kategori').find('.error').remove();

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

@stop
