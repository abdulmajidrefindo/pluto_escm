@extends('adminlte::page')

@section('title', 'Transaksi')

@section('content_header')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Transaksi Pemasok</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('transaksiPemasok') }}
        </ol>
    </div>
</div>
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
                    <a class="nav-link active" id="transaksiPemasok-tabs-table-tab" data-toggle="pill"
                        href="#transaksiPemasok-tabs-table" role="tab" aria-controls="transaksiPemasok-tabs-table"
                        aria-selected="true">
                        <i class="fas fa-xs fa-table fa-fw"></i>
                        Daftar Transaksi Pemasok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="transaksiPemasok-tabs-add-tab" data-toggle="pill"
                        href="#transaksiPemasok-tabs-add" role="tab" aria-controls="transaksiPemasok-tabs-add"
                        aria-selected="false">
                        <i class="fas fa-xs fa-plus fa-fw"></i>
                        Tambah Transaksi Pemasok Baru</a>
                </li>
            </ul>

        </div>
        <div class="card-body">
            <div class="tab-content" id="transaksiPemasokTabContent">
                <div class="tab-pane active show" id="transaksiPemasok-tabs-table" role="tabpanel"
                    aria-labelledby="transaksiPemasok-tabs-table-tab">

                    <!-- table from yajra datatable -->
                    <div class="table-responsive">
                        <table id="transaksiPemasok-table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Pemasok</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>



                </div>
                <div class="tab-pane fade" id="transaksiPemasok-tabs-add" role="tabpanel"
                    aria-labelledby="transaksiPemasok-tabs-add-tab">

                    <form>
                        @csrf

                        <div class="row">
                            <x-adminlte-input id="idTransaksi" name="transaksi_id" label="Kode Transaksi"
                                label-class="text-lightblue" fgroup-class="col-6" data-placeholder="Pilih pemasok..."
                                disabled>

                            </x-adminlte-input>
                            <x-adminlte-select2 id="selectPemasok" name="pemasok_id" label="Pemasok"
                                label-class="text-lightblue" fgroup-class="col-6" data-placeholder="Pilih pemasok...">
                                <option />
                                @foreach ($pemasok as $pemasok)
                                    <option value="{{ $pemasok->id }}">{{ $pemasok->nama_pemasok }}</option>
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
                                @foreach ($barang as $barang)
                                    <option data-harga="{{ $barang->harga }}" data-merek="{{ $barang->merek->nama_merek }}"
                                        data-unit="{{ $barang->produk->unit }}" data-stok="{{ $barang->total_stok }}"
                                        value="{{ $barang->id }}">
                                        {{ $barang->produk->nama_produk }}
                                    </option>
                                @endforeach
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-blue">
                                        <i class="fas fa-box"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-select2>

                            <x-adminlte-input name="kuantitas" placeholder="Jumlah Barang" fgroup-class="col-3"
                                type="number" min=0 disabled>
                                <x-slot name="appendSlot">
                                    <div id="unitBarang" class="input-group-text text-blue">
                                        Kg
                                    </div>
                                </x-slot>
                            </x-adminlte-input>

                            <x-adminlte-input id="harga" name="harga" placeholder="Harga" fgroup-class="col-3"
                                disabled>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text text-blue">
                                        Rp.
                                    </div>
                                </x-slot>
                            </x-adminlte-input>


                            <x-adminlte-input id="merek" name="merek" placeholder="Merek" fgroup-class="col-3"
                                disabled />









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

        <x-adminlte-modal id="modalTransaksiPemasok" title="Hapus Data" theme="danger" icon="fas fa-trash"
            size='lg'>
            Anda yakin ingin menghapus data berikut?
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td id="idTransaksiPemasok">Mark</td>
                    </tr>
                    <tr>
                        <th scope="row">Total Harga</th>
                        <td id="total_harga">7000</td>

                    </tr>
                    <tr>
                        <th scope="row">Tanggal Transaksi</th>
                        <td id="created_at">08/09/2022/td>
                    </tr>
                </tbody>
            </table>
            <x-slot name="footerSlot">
                <form id="deleteForm" method="post">
                    @csrf
                    @method('DELETE')

                    <input id="id" name="id" hidden value="">
                    <x-adminlte-button type="submit" class="mr-auto" theme="danger" label="Iya, hapus data." />

                    <x-adminlte-button theme="success" label="Tidak" data-dismiss="modal" />
                </form>
            </x-slot>

        </x-adminlte-modal>

        <x-adminlte-modal id="modalTransaksiPemasokDetail" title="Rincian Data" theme="teal" icon="fas fa-eye"
            size='lg'>
            Berikut rincian transaksiPemasok
            <table class="table">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <td id="idTransaksiPemasok">Mark</td>
                        </tr>
                        <tr>
                            <th scope="row">Total Harga</th>
                            <td id="total_harga">7000</td>

                        </tr>
                        <tr>
                            <th scope="row">Tanggal Transaksi</th>
                            <td id="created_at">08/09/2022/td>
                        </tr>

                    </tbody>
                </table>

        </x-adminlte-modal>

    @stop


    @section('js')

        <script>
            $(document).ready(function() {
                // CSRF Token
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
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
                            color: '#fff',
                            toast: true,
                            background: '#CB1C8D',
                            position: 'top',
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
                    html += '<td>' + kuantitas + '</td>';
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
                            let unit = $(this).closest('tr').find('td').eq(5).text();
                            let harga = $(this).closest('tr').find('td').eq(6).text();
                            totalHarga -= parseInt($(this).closest('tr').find('td').eq(7).text());

                            let html = '';
                            html += '<option value="' + id + '" data-merek="' + merek +
                                '" data-harga="' + harga +
                                '" data-unit="' + unit + '">' + produk + '</option>';
                            $('#selectBarang').append(html);
                        }
                    });
                    $('.total-harga').text(totalHarga);
                });



                //Mengambil Data Barang
                $('#selectBarang').change(function() {

                    $('#tambahBarang').text('Tambahkan Ke Daftar');
                    $('#tambahBarang').attr('disabled', false);
                    let id = $(this).find(":selected").val();
                    let harga = $(this).find(":selected").attr('data-harga');
                    let unit = $(this).find(":selected").attr('data-unit');
                    let merek = $(this).find(":selected").attr('data-merek');
                    let stok = $(this).find(":selected").attr('data-stok');
                    $('#kuantitas').attr('disabled', false);
                    $('#harga').val(harga);
                    $('#unitBarang').html(unit);
                    $('#merek').val(merek);
                });
                //end Mengambil Data Barang

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
                            color: '#fff',
                            toast: true,
                            background: '#CB1C8D',
                            position: 'top',
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


                    //periksa apakah pemasok sudah dipilih
                    if ($('#selectPemasok').val() == '') {
                        Swal.fire({
                            title: 'Peringatan! Pemasok Belum Dipilih',
                            icon: 'warning',
                            iconColor: '#fff',
                            color: '#fff',
                            toast: true,
                            background: '#CB1C8D',
                            position: 'top',
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
                    // end periksa apakah pemasok sudah dipilih

                    // isi data barang dari tabel ke array
                    let data_barang = [];
                    let pemasok_id = $('#selectPemasok').val();
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
                    // end isi data barang dari tabel ke array

                    //ajax submit data
                    console.log(totalHarga);
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('transaksiPemasok.store') }}',
                        data: {
                            pemasok_id: pemasok_id,
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
                                        $('#transaksiPemasok-table').DataTable().ajax
                                            .reload();

                                        $('#transaksiPemasok-tabs-table-tab').trigger(
                                            'click').delay(1200);
                                        populateSelectBarang();
                                        resetForm();

                                    } else {
                                        $('#transaksiPemasok-table').DataTable().ajax
                                            .reload();
                                        populateSelectBarang();
                                        resetForm();
                                    }
                                });
                            }
                        },
                        errors: function(data) {
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
                    });
                    //end ajax submit data



                }); //end btn simpan click



            }); //end document ready

            //populate select barang
            function populateSelectBarang() {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('barang.fetchAll') }}',
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
                            if (value.total_stok == 0) {
                                html += 'disabled = "disabled"';
                            }
                            html += '>';
                            html += value.produk.nama_produk;
                            if (value.total_stok == 0) {
                                html += ' (Stok Habis)';
                            }
                            html += '</option>';
                            $('#selectBarang').append(html);
                        });
                    }
                });
            }
            //end populate select barang

            // fungsi rest form
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
            } //end fungsi reset form
        </script>

        <!-- data table -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#transaksiPemasok-table').DataTable({
                    processing: true,
                    serverSide: false,
                    ajax: "{{ route('transaksiPemasok.getTable') }}",
                    columns: [{
                            data: 'id',
                            name: 'id',
                            sClass: 'text-center',
                            width: '5%'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'pemasok.nama_pemasok',
                            name: 'pemasok.nama_pemasok',
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
                            searchable: false,
                            sClass: 'text-center'
                        },

                    ]
                })
            });

            //delete button click
            $(document).on('click', '.delete', function() {
                let id = $(this).attr('data-id');
                deleteData(id);
            });



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
                            url: '{{ route('transaksiPemasok.index') }}' + '/' + id,
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
                                    $('#transaksiPemasok-table').DataTable().ajax
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
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal
                                            .resumeTimer)
                                    }
                                });
                            }

                        });

                    }
                })
            }
        </script>




    @stop
