@extends('adminlte::page')

@section('content_header')
    <h1>Edit Transaksi</h1>

@stop

@section('content')

    <div class="card card-dark card">
        <div class="card-header">
            <i class="fas fa-fw fa-edit"></i>
            <h3 class="card-title  text-bold">Edit Transaksi</h3>
        </div>
        <div class="card-body">
            <form>
                <div class="row">

                    <div class="form-group col-6">
                        <label for="selectPemasok" class="text-lightblue">
                            Kode Transaksi
                        </label>
                        <div class="input-group">
                            <input id="transaksi_id" name="id_transaksi" value="{{ $transaksiPemasok->id }}"
                                class="form-control" placeholder="ID" disabled="disabled">
                        </div>
                    </div>

                    <x-adminlte-select2 id="selectPemasok" name="pemasok_id" label="Pemasok" label-class="text-lightblue"
                        fgroup-class="col-6" data-placeholder="Pilih pemasok...">
                        <option />
                        @foreach ($pemasok as $pemasok)
                            <option value="{{ $pemasok->id }}"
                                {{ $transaksiPemasok->pemasok_id == $pemasok->id ? 'selected' : '' }}>
                                {{ $pemasok->nama_pemasok }}
                            </option>
                        @endforeach
                    </x-adminlte-select2>



                </div>
                <hr />
                <h4 class="text-lightblue"> Form Barang </h4>
                <div class="row">




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

                    <x-adminlte-input name="kuantitas" placeholder="Jumlah Barang" fgroup-class="col-3" type="number" min=0
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
                                @foreach ($transaksiPemasok->barang as $barang)
                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-sm btn-hapus-barang"
                                                data-id="{{ $transaksiPemasok->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                        <td>{{ $barang->id }}</td>
                                        <td>{{ $barang->produk->nama_produk }}</td>
                                        <td>{{ $barang->merek->nama_merek }}</td>
                                        <td data-stok="{{ $barang->total_stok }}">{{ $barang->pivot->kuantitas }}</td>
                                        <td>{{ $barang->produk->unit }}</td>
                                        <td>{{ $barang->harga }}</td>
                                        <td>{{ $barang->pivot->total_harga }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-right" colspan="7">
                                        Total :
                                    </th>
                                    <th class="total-harga">
                                        {{ $transaksiPemasok->total_harga }}
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
                let stok = $('#selectBarang').find(":selected").data('stok');
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

                $('#kuantitas').attr('placeholder', 'Stok ' + stok);
                $('#kuantitas').attr('disabled', false);
                $('#harga').val(harga);
                $('#unitBarang').html(unit);
                $('#merek').val(merek);
            });
            //end mengambil data barang


            //fungsi ajax submit data
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
                let transaksi_id = $('#transaksi_id').val();
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
                    type: 'PUT',
                    url: '{{ route('transaksiPemasok.index') }}' + '/' + transaksi_id,
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
                                text: 'Data Berhasil Diperbaharui',
                                icon: 'success',
                                iconColor: '#fff',
                                color: '#fff',
                                background: '#8D72E1',
                                position: 'center',
                                showCancelButton: true,
                                confirmButtonColor: '#F3CCFF',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Kembali Ke Daftar Transaksi',
                                cancelButtonText: 'Tutup',
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.open('{{ route('transaksiPemasok.index') }}', '_self');
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
            }); //end button simpan data
        }); //end document ready
        //Submit Data


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
                        html += '>';
                        html += value.produk.nama_produk;
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
