@extends('adminlte::page')

@section('content_header')

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">Rincian Transaksi Pelanggan</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            {{ Breadcrumbs::render('transaksiPelanggan.show', $transaksiPelanggan) }}
        </ol>
    </div>
</div>

@stop

@section('content')

    <div class="card card-dark card">
        <div class="card-header">

            <h3 class="card-title  text-bold">Rincian Transaksi</h3>
            <!-- tanggal for pringting -->
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" name="tanggal" class="form-control float-right" id="reservation"
                        value="{{ $transaksiPelanggan->created_at->format('d/m/Y') }}" disabled="disabled">
                </div>
            </div>
        </div>
        <div class="card-body">
            <form>
                <div class="row">

                    <div class="form-group col-6">
                        <label for="selectPemasok" class="text-purple">
                            Kode Transaksi
                        </label>
                        <div class="input-group">
                            <input id="transaksi_id" name="id_transaksi" value="{{ $transaksiPelanggan->id }}"
                                class="form-control" placeholder="ID" disabled="disabled">
                        </div>
                    </div>



                    <div class="form-group col-6">
                        <label class="text-purple">
                            Pemasok
                        </label>
                        <div class="input-group">
                            <input id="transaksi_id" name="id_transaksi" value="{{ $transaksiPelanggan->pelanggan->nama_pelanggan }}"
                                class="form-control" placeholder="ID" disabled="disabled">
                        </div>
                    </div>



                </div>
                <hr />


                <div class="row">
                    <div class="col-12">
                        <table id="tabelAddBarang" class="table table-striped">
                            <thead>
                                <tr>

                                    <th style="width: 10px">ID</th>
                                    <th>Produk</th>
                                    <th>Merek</th>
                                    <th>Kuantitas</th>

                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksiPelanggan->barang as $barang)
                                    <tr>

                                        <td>{{ $barang->id }}</td>
                                        <td>{{ $barang->produk->nama_produk }}</td>
                                        <td>{{ $barang->merek->nama_merek }}</td>
                                        <td data-stok="{{ $barang->total_stok }}">{{ $barang->pivot->kuantitas }} {{ $barang->produk->unit }}</td>

                                        <td>@currency($barang->harga)</td>
                                        <td>@currency($barang->pivot->total_harga)</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-right" colspan="5">
                                        Total :
                                    </th>
                                    <th class="total-harga">
                                        @currency($transaksiPelanggan->total_harga)
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-12">
                        <button id="printTransaksi" type="submit" class="btn bg-purple btn-block round-0">Print</button>
                    </div>
                </div>


            </form>


            <table>
        </div>

    </div>

@stop


@section('js')

<script>

    $(document).ready(function () {
        //print transaksi ignore unimportan component
        $('#printTransaksi').click(function (e) {
            e.preventDefault();
            window.print();
        });
    });
</script>

@stop


@section('css')
    <style>
        /*hide button when printing*/
        @media print {
            #printTransaksi {
                display: none;
            }
            /*turn all text to black*/
            * {
                color: black !important;
                background-color: white !important;
            }
        }


    </style>
@stop
