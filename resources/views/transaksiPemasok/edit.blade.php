@extends('adminlte::page')

@section('content_header')
    <h1>Edit Transaksi</h1>

@stop

@section('content')
    <form action="{{ route('transaksiPemasok.update', $transaksiPemasok->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
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
                    <option data-harga="{{ $barang->harga }}"
                        data-merek="{{ $barang->merek->nama_merek }}"
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
                type="number" min=0 max=10 disabled>
                <x-slot name="appendSlot">
                    <div id="unitBarang" class="input-group-text text-blue">
                        Kg
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input id="merek" name="merek" placeholder="Merek" fgroup-class="col-3"
                disabled />



            <x-adminlte-input id="harga" name="harga" placeholder="Harga" fgroup-class="col-3"
                disabled>
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
                <button id="submitTransaksi" type="submit"
                    class="btn btn-primary btn-block">Simpan</button>
            </div>
        </div>


    </form>


    <table>

@stop


@section('js')
<script>
    $(document).on('click', '#showData', function() {
        let id = $(this).attr('data-id');
        let total_harga = $(this).attr('data-total-harga');
        let created_at = $(this).attr('data-created-at');

        $('#showForm').attr('action', '/transaksiPemasok/' + id);
        document.getElementById("idTransaksiPemasok").innerHTML = id;
        document.getElementById("total_harga").innerHTML = total_harga;
        document.getElementById("created_at").innerHTML = created_at;
    });

    $(document).on('click', '#deleteData', function() {
        let id = $(this).attr('data-id');
        let total_harga = $(this).attr('data-nama-transaksiPemasok');
        let created_at = $(this).attr('data-keterangan-transaksiPemasok');

        $('#deleteForm').attr('action', '/transaksiPemasok/' + id);
        document.getElementById("idTransaksiPemasok").innerHTML = id;
        document.getElementById("total_harga").innerHTML = total_harga;
        document.getElementById("created_at").innerHTML = created_at;
    });
</script>

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

            if ($('#kuantitas').val() == '') {
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
                    if(data != null && data.success){
                        console.log(data);
                        Swal.fire({
                            title: 'Berhasil!',
                            text: data.message,
                            icon: 'success',
                            iconColor: '#fff',
                            toast: true,
                            background: '#a5dc86',
                            position: 'center-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                    } else {
                        Swal.fire({
                            title: 'Peringatan!',
                            text: data.message,
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
                },
                errors: function(data) {
                   if(data.status === 422){
                    var errors = $.parseJson(data.responseText);
                    $.each(errors.errors, function(key, value){
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
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
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
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                   }

                }
            });



        });



    });
</script>



@stop


