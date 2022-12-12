@php

    $heads = ['ID', 'Pelanggan', 'Total Harga', 'Taggal Transaksi', ['label' => 'Aksi', 'no-export' => true]];
    $config = [
        'order' => [[1, 'asc']],
        'columns' => [null, null, null, null, ['orderable' => false]],
    ];
@endphp

@extends('adminlte::page')

@section('title', 'Transaksi')

@section('content_header')
    <h1>Daftar Transaksi</h1>
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
                    <a class="nav-link active" id="transaksiPelanggan-tabs-table-tab" data-toggle="pill"
                        href="#transaksiPelanggan-tabs-table" role="tab" aria-controls="transaksiPelanggan-tabs-table"
                        aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Transaksi Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="transaksiPelanggan-tabs-add-tab" data-toggle="pill"
                        href="#transaksiPelanggan-tabs-add" role="tab" aria-controls="transaksiPelanggan-tabs-add"
                        aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Transaksi Pelanggan Baru</a>
                </li>
            </ul>

        </div>
        <div class="card-body">
            <div class="tab-content" id="transaksiPelangganTabContent">
                <div class="tab-pane active show" id="transaksiPelanggan-tabs-table" role="tabpanel"
                    aria-labelledby="transaksiPelanggan-tabs-table-tab">

                    <div class="table-responsive">
                        <table id="transaksiPelanggan-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>


                </div>
                <div class="tab-pane fade" id="transaksiPelanggan-tabs-add" role="tabpanel"
                    aria-labelledby="transaksiPelanggan-tabs-add-tab">

                    <form>
                        @csrf

                        <div class="row">
                            <x-adminlte-input id="idTransaksi" name="transaksi_id" label="Kode Transaksi"
                                label-class="text-lightblue" fgroup-class="col-6" data-placeholder="Pilih pelanggan..."
                                disabled>

                            </x-adminlte-input>
                            <x-adminlte-select2 id="selectPelanggan" name="pelanggan_id" label="Pelanggan"
                                label-class="text-lightblue" fgroup-class="col-6" data-placeholder="Pilih pelanggan...">
                                <option />
                                @foreach ($pelanggan as $pelanggan)
                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                                @endforeach
                            </x-adminlte-select2>



                        </div>
                        <hr />
                        <h4 class="text-lightblue"> Form Barang </h4>
                        <div class="row">

                            <input type="hidden" name="data_barang" id="dataBarang" value="" />


                            <x-adminlte-select2 id="selectBarang" name="barang_id" label-class="text-lightblue"
                                fgroup-class="col-3" data-placeholder="Pilih produk...">
                                <option />

                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-blue">
                                        <i class="fas fa-box"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-select2>

                            <x-adminlte-input name="kuantitas" placeholder="Jumlah Barang" fgroup-class="col-3"
                                type="number" min=0 max=10 disabled>
                                <x-slot name="appendSlot">
                                    <div id="unitBarang" class="input-group-text text-blue">
                                        Kg
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                            <x-adminlte-input id="harga" name="harga" placeholder="Harga" fgroup-class="col-2"
                                disabled>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-blue">
                                        Rp.
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                            <x-adminlte-input id="stok" name="stok" placeholder="Stok" fgroup-class="col-2"
                                disabled>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-blue">
                                        Tersisa
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                            <x-adminlte-input id="merek" name="merek" placeholder="Merek" fgroup-class="col-2"
                                disabled>

                            </x-adminlte-input>

                        </div>

                        <div class="row">
                            <div class="col-12">

                                <x-adminlte-button class="col-12 btn-block" id="tambahBarang" theme="outline-primary"
                                    label="Tambahkan Ke Daftar" disabled />

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table id="tabelAddBarang" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 40px">#</th>
                                            <th style="width: 10px">ID</th>
                                            <th>Produk</th>
                                            <th>Merek</th>
                                            <th>Kuantitas</th>
                                            <th>Unit</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-right" colspan="7">
                                                Total :
                                            </th>
                                            <th class="total-harga">
                                                Rp.,-
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <hr />

                        <div class="row">
                            <div class="col-12">
                                <button id="submitTransaksi" type="submit"
                                    class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>



    @stop


    @section('js')

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                populateSelectBarang();
                var totalHarga = 0;

                $('#tambahBarang').text('Mohon Isi Data Barang Terlebih Dahulu');

                //Tambah Barang Ke Table
                $('#tambahBarang').click(function() {
                    totalHarga = 0;

                    if ($('#kuantitas').val() == '' || $('#kuantitas').val() == 0) {
                        Swal.fire({
                            title: 'Peringatan! Kuantitas Barang Tidak Boleh Kosong',
                            icon: 'warning',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                        return; //Jika Kuantitas Kosong, Maka Tidak Melanjutkan
                    }

                    let id = $('#selectBarang').val();
                    let produk = $('#selectBarang').find(":selected").text();
                    let merek = $('#merek').val();
                    let kuantitas = $('#kuantitas').val();
                    let stok = $('#selectBarang').find(":selected").attr('data-stok');
                    let unit = $('#unitBarang').text();
                    let harga = $('#harga').val();
                    let total = kuantitas * harga;
                    let html = '';
                    html += '<tr>';
                    html +=
                        '<td><button type="button" class="btn btn-danger btn-sm" value="Delete"><i class="fas fa-trash"></i></button></td>';
                    html += '<td>' + id + '</td>';
                    html += '<td>' + produk + '</td>';
                    html += '<td>' + merek + '</td>';
                    html += '<td data-stok = "' + stok + '">' + kuantitas + '</td>';
                    html += '<td>' + unit + '</td>';
                    html += '<td>' + harga + '</td>';
                    html += '<td class = "total">' + total + '</td>';
                    html += '</tr>';
                    $('#selectBarang').val('');
                    $('#kuantitas').val('');
                    $('#tabelAddBarang').append(html);
                    $('#tabelAddBarang').find('.total').each(function() {
                        totalHarga += parseInt($(this).text());
                    });
                    $('.total-harga').text(totalHarga);
                    //Hapus Barang Dari Select
                    $('#selectBarang option[value="' + id + '"]').remove();

                    $('#tambahBarang').text('Mohon Isi Data Barang Terlebih Dahulu');
                    $('#tambahBarang').attr('disabled', 'true');


                });

                //Hapus Barang Dari Table
                $('#tabelAddBarang').on('click', '.btn-danger', function() {
                    $(this).closest('tr').remove();
                    $(this).closest('tr').find('td').each(function() {
                        //Kembalikan Barang Ke Select
                        if ($(this).index() == 1) {
                            let id = $(this).text();
                            let produk = $(this).closest('tr').find('td').eq(2).text();
                            let merek = $(this).closest('tr').find('td').eq(3).text();
                            let stok = $(this).closest('tr').find('td').eq(4).attr('data-stok');
                            let unit = $(this).closest('tr').find('td').eq(5).text();
                            let harga = $(this).closest('tr').find('td').eq(6).text();
                            totalHarga -= parseInt($(this).closest('tr').find('td').eq(7).text());

                            let html = '';
                            html += '<option value="' + id + '" data-stok="' + stok + '" data-merek="' +
                                merek + '" data-unit="' + unit + '" data-harga="' + harga + '">' +
                                produk + '</option>';
                            $('#selectBarang').append(html);

                        }
                    });
                    $('.total-harga').text(totalHarga);
                });



                //Mengambil Data Barang
                $('#selectBarang').change(function() {

                    $('#tambahBarang').text('Tambah Barang Ke Table');
                    $('#tambahBarang').attr('disabled', false);

                    let id = $(this).find(":selected").val();
                    let harga = $(this).find(":selected").attr('data-harga');
                    let unit = $(this).find(":selected").attr('data-unit');
                    let merek = $(this).find(":selected").attr('data-merek');
                    let stok = $(this).find(":selected").attr('data-stok');

                    $('#kuantitas').attr('max', stok);
                    $('#kuantitas').attr('placeholder', 'Maksimal ' + stok);
                    $('#kuantitas').attr('disabled', false);

                    $('#kuantitas').val('');

                    $('#stok').val(stok);

                    $('#harga').val(harga);
                    $('#unitBarang').html(unit);
                    $('#merek').val(merek);

                });



                //prevent input number outside range
                $('#kuantitas').on('input', function() {
                    if (parseInt(this.value) > this.max) {
                        this.value = this.max;
                        Swal.fire({
                            title: 'Peringatan! Sisa stok hanya tersedia ' + this.max + ' ' + $(
                                '#unitBarang').text(),
                            icon: 'warning',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    }
                    $('#stok').val(this.max - this.value);
                });



                //fungsi ajax submit data
                //Submit Data
                $('#submitTransaksi').click(function(e) {
                    e.preventDefault();

                    //periksa apakah tabel kosong
                    if ($('#tabelAddBarang tbody').find('tr').length == 0) {

                        Swal.fire({
                            title: 'Peringatan! Tidak Ada Barang Yang Ditambahkan',
                            icon: 'warning',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                        return; //Jika Tidak Ada Barang, Maka Tidak Melanjutkan
                    }


                    //periksa apakah pelanggan sudah dipilih
                    if ($('#selectPelanggan').val() == '') {
                        Swal.fire({
                            title: 'Peringatan! Pelanggan Belum Dipilih',
                            icon: 'warning',
                            iconColor: '#fff',
                            toast: true,
                            background: '#f8bb86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                        return; //Jika Tidak Ada Barang, Maka Tidak Melanjutkan
                    }

                    let data_barang = [];
                    let pelanggan_id = $('#selectPelanggan').val();
                    $('#tabelAddBarang').find('tr').each(function() {
                        $(this).find('td').each(function() {
                            if ($(this).index() == 1) {
                                let id = $(this).text();
                                let kuantitas = $(this).closest('tr').find('td').eq(4).text();
                                let harga = $(this).closest('tr').find('td').eq(6).text();
                                let total = $(this).closest('tr').find('td').eq(7).text();
                                let obj = {
                                    id: id,
                                    kuantitas: kuantitas,
                                    harga: harga,
                                    total: total
                                };
                                data_barang.push(obj);
                            }
                        });
                    });
                    $('#dataBarang').val(JSON.stringify(data_barang));
                    $('#totalHarga').val(totalHarga);
                    console.log(data_barang);

                    //ajax submit data

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('transaksiPelanggan.store') }}',
                        data: {
                            pelanggan_id: pelanggan_id,
                            data_barang: data_barang,
                            total_harga: totalHarga
                        },
                        dataType: 'json',
                        success: function(data) {
                            if (data.errors) {
                                $.each(data.errors, function(key, value) {
                                    $(document).Toasts('create', {
                                        title: 'Harap isi data dengan benar!',
                                        body: value,
                                        class: 'bg-danger',
                                        autohide: true,
                                        delay: 5000,
                                        icon: 'fas fa-exclamation-triangle fa-lg',
                                        position: 'bottomRight'

                                    });

                                });
                            } else {
                                Swal.fire({
                                    title: 'Berhasil!',
                                    text: 'Data Berhasil Disimpan',
                                    icon: 'success',
                                    iconColor: '#fff',
                                    toast: true,
                                    color: '#fff',
                                    background: '#8D72E1',
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,

                                });

                                //populate select barang


                                populateSelectBarang();
                                $('#transaksiPelanggan-table').DataTable().ajax
                                        .reload();
                                resetForm();


                            }
                        },
                        errors: function(data) {
                            if (data.status === 422) {
                                var errors = $.parseJson(data.responseText);
                                $.each(errors.errors, function(key, value) {
                                    Swal.fire({
                                        title: 'Peringatan!',
                                        text: value,
                                        icon: 'warning',
                                        iconColor: '#fff',
                                        toast: true,
                                        background: '#f8bb86',
                                        position: 'center-end',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter',
                                                Swal.stopTimer)
                                            toast.addEventListener('mouseleave',
                                                Swal.resumeTimer)
                                        }
                                    });
                                });
                            } else {
                                Swal.fire({
                                    title: 'Peringatan!',
                                    text: 'Data Gagal Disimpan',
                                    icon: 'warning',
                                    iconColor: '#fff',
                                    toast: true,
                                    background: '#f8bb86',
                                    position: 'center-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal
                                            .stopTimer)
                                        toast.addEventListener('mouseleave', Swal
                                            .resumeTimer)
                                    }
                                });
                            }

                        }
                    });



                });



            });

            function populateSelectBarang() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('fetchAllBarang') }}',
                    dataType: 'json',
                    success: function(data) {
                        let html = '';
                        html += '<option/>';
                        $('#selectBarang').append(html);
                        $.each(data, function(key, value) {

                            let html = '';
                            html += '<option ';
                            html += 'value="' + value.id + '"';
                            html += 'data-merek="' + value.merek.nama_merek + '"';
                            html += 'data-unit="' + value.produk.unit + '"';
                            html += 'data-harga="' + value.harga + '"';
                            html += 'data-stok="' + value.total_stok + '"';
                            if(value.total_stok == 0){
                                html += 'disabled = "disabled"';
                            }
                            html += '>';
                            html += value.produk.nama_produk;
                            if(value.total_stok == 0){
                                html += ' (Stok Habis)';
                            }
                            html += '</option>';
                            $('#selectBarang').append(html);


                        });
                    }
                });
            }

            function resetForm() {
                //kosongkan form
                $('#tabelAddBarang tbody').empty();
                $('#selectBarang').empty();
                $('#selectPemasok').val('');
                $('#totalHarga').val('');
                $('#tambahBarang').attr('disabled', true);
                $('#tambahBarang').text('Tambahkan Ke Daftar');
                $('#kuantitas').attr('disabled', true);
                $('#kuantitas').val('');
                $('#harga').val('');
                $('#unitBarang').html('');
                $('#merek').val('');
                totalHarga = 0;
                $('.total-harga').text(totalHarga);
            }

        </script>

        <!-- datatable -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#transaksiPelanggan-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('transaksiPelanggan.getTableTransaksiPelanggan') }}",
                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'pelanggan.nama_pelanggan',
                            name: 'pelanggan.nama_pelanggan'
                        },
                        {
                            data: 'total_harga',
                            name: 'total_harga',
                            render: $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ]
                });

                //delete data pelanggan
                $(document).on('click', '.delete', function() {
                    let id = $(this).attr('data-id');
                    deleteData(id);
                });

                //function delete data transaksi
                //delete data
                function deleteData(id) {
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data yang di hapus tidak dapat dikembalikan!",
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
                                url: '{{ route('transaksiPelanggan.index') }}' + '/' + id,
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
                                        $('#transaksiPelanggan-table').DataTable().ajax
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
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal
                                                .stopTimer)
                                            toast.addEventListener('mouseleave', Swal
                                                .resumeTimer)
                                        }
                                    });
                                }

                            });

                        }
                    })
                }



            });
        </script>



    @stop
