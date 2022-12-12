@extends('adminlte::page')

@section('content_header')
    <h1>Edit Transaksi</h1>

@stop

@section('content')
    <form action="{{ route('transaksiPemasok.update', $transaksiPemasok->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <x-adminlte-input id="idTransaksi" name="transaksi_id" label="Kode Transaksi" label-class="text-lightblue"
                fgroup-class="col-6" data-placeholder="Pilih pemasok..." disabled>

            </x-adminlte-input>
            <x-adminlte-select2 id="selectPemasok" name="pemasok_id" label="Pemasok" label-class="text-lightblue"
                fgroup-class="col-6" data-placeholder="Pilih pemasok...">
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


            <x-adminlte-select2 id="selectBarang" name="barang_id" label-class="text-lightblue" fgroup-class="col-3"
                data-placeholder="Pilih produk...">
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

            <x-adminlte-input name="kuantitas" placeholder="Jumlah Barang" fgroup-class="col-3" type="number" min=0 max=10
                disabled>
                <x-slot name="appendSlot">
                    <div id="unitBarang" class="input-group-text text-blue">
                        Kg
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input id="merek" name="merek" placeholder="Merek" fgroup-class="col-3" disabled />



            <x-adminlte-input id="harga" name="harga" placeholder="Harga" fgroup-class="col-3" disabled>
                <x-slot name="prependSlot">
                    <div class="input-group-text text-blue">
                        Rp.
                    </div>
                </x-slot>
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
                <button id="submitTransaksi" type="submit" class="btn btn-primary btn-block">Simpan</button>
            </div>
        </div>


    </form>


    <table>

    @stop


    @section('js')

        <script>
            $(document).ready(function() {
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
                    //end tambah barang ke table

                    //Mengambil Nilai Dari Inputan
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
                //end tambah barang ke table

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
                // end hapus barang dari table


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
                    $('#harga').val(harga);
                    $('#unitBarang').html(unit);
                    $('#merek').val(merek);
                });
                //end mengambil data barang


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
                    //end periksa apakah tabel kosong


                    //periksa apakah pemasok sudah dipilih
                    if ($('#selectPemasok').val() == '') {
                        Swal.fire({
                            title: 'Peringatan! Pemasok Belum Dipilih',
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
                    //end periksa apakah pemasok sudah dipilih

                    // isi data barang ke array
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
                    // end isi data barang ke array

                    //ajax submit data
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
                                resetForm();
                                $('#transaksiPemasok-table').DataTable().ajax.reload();
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
                }); //end button simpan data
            }); //end document ready

            //fungsi populateSelectBarang
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



    @stop
