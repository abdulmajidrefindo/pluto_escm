 @extends('adminlte::page')

 @section('title', 'Detail Barang')

 @section('content_header')

     <h1>Barang</h1>
 @stop

 @section('content')

    <div class="row">
        <div class="col-md-12">

            <div class="card card-dark">
                <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                    <h3 class="card-title">Informasi Barang</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row d-flex">

                        <div class="p-2 flex-fill bd-highlight">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3> {{ $barang->total_stok }}</h3>
                                    <h4>Total Stok</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dolly-flatbed"></i>
                                </div>
                                <a href="#" class="small-box-footer"> </i>
                                </a>
                            </div>
                        </div>

                        <div class="p-2 flex-fill bd-highlight">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3> {{ $barang->total_terjual }}</h3>
                                    <h4>Total Terjual</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dolly-flatbed"></i>
                                </div>
                                <a href="#" class="small-box-footer"> </i>
                                </a>
                            </div>
                        </div>

                        <div class="p-2 flex-fill bd-highlight">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3> {{ $barang->total_masuk }}</h3>
                                    <h4>Total Diterima</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dolly-flatbed"></i>
                                </div>
                                <a href="#" class="small-box-footer"> </i>
                                </a>
                            </div>
                        </div>

                        <div class="p-2 flex-fill bd-highlight">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>@currency($informasi['pengeluaran'])</h3>
                                    <h4>Total Pengeluaran</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dolly-flatbed"></i>
                                </div>
                                <a href="#" class="small-box-footer"> </i>
                                </a>
                            </div>
                        </div>

                        <div class="p-2 flex-fill bd-highlight">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>@currency($informasi['pemasukan'])</h3>
                                    <h4>Total Pemasukan</h4>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-dolly-flatbed"></i>
                                </div>
                                <a href="#" class="small-box-footer"> </i>
                                </a>
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>
    </div>


     <div class="row">
         <div class="col-12 col-sm-12 col-md-6">
             <div class="card card-dark">
                 <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                     <h3 class="card-title">Detail Penjualan</h3>
                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove">
                             <i class="fas fa-times"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body">

                         <div class="row">
                             <div class="col-sm-12">

                                 <div class="form-group col-md-12">
                                     <label class="text-lightdark">
                                         ID Barang
                                     </label>
                                     <div class="input-group">
                                         <input id="id" name="id" value="{{ $barang->id }}"
                                             class="form-control" disabled>
                                     </div>
                                 </div>

                                 <div class="form-group col-md-12">
                                    <label for="produk" class="text-lightdark">
                                        Produk
                                    </label>
                                    <div class="input-group">
                                        <input id="group" name="group" value="{{ $barang->produk->nama_produk }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="merek" class="text-lightdark">
                                        Merek
                                    </label>
                                    <div class="input-group">
                                        <input id="merek" name="merek" value="{{ $barang->merek->nama_merek }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="pemasok" class="text-lightdark">
                                        Pemasok
                                    </label>
                                    <div class="input-group">
                                        <input id="pemasok" name="pemasok" value="{{ $barang->pemasok->nama_pemasok }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="sku" class="text-lightdark">
                                        Nomor SKU Barang
                                    </label>
                                    <div class="input-group">
                                        <input id="sku" name="sku" value="{{ $barang->sku }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>

                                <x-adminlte-input name="keterangan" type="text" value="{{ $barang->harga }}" label="Harga" placeholder="Contoh : Apa saja "
                                    fgroup-class="col-md-12" disabled>

                                    <x-slot name="prependSlot">
                                        <div class="input-group-text bg-purple">
                                            Rp.
                                        </div>
                                    </x-slot>

                                </x-adminlte-input>





                             </div>
                         </div>

                 </div>
                 <div class="card-footer">
                     <div class="row">
                         <div class="col-12">


                            <div id="daftar-kategori" class="float-right">

                            </div>

                         </div>
                     </div>

                 </div>

             </div>
         </div>

         <div class="col-12 col-sm-12 col-md-6">
            <div class="card card-dark">
                <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                    <h3 class="card-title">Grafik Penjualan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                </div>

            </div>
        </div>

     </div>

     <div class="row">
         <div class="col-12 col-sm-12 col-md-12">
             <div class="card card-dark">
                 <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                     <h3 class="card-title">Transaksi Penjualan</h3>
                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove">
                             <i class="fas fa-times"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <div class="table-responsive">
                             <table id="tabel-transaksi-pelanggan" class="table table-striped table-hover table-bordered">
                                 <thead>
                                     <tr>
                                         <th>ID</th>
                                         <th>Tanggal</th>
                                         <th>Pelanggan</th>
                                         <th>Kuantitas</th>
                                         <th>Total Harga</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                             </table>
                         </div>
                     </div>
                 </div>

             </div>
         </div>

         <div class="col-12 col-sm-12 col-md-12">
             <div class="card card-dark">
                 <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                     <h3 class="card-title">Transaksi Pemasok</h3>
                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove">
                             <i class="fas fa-times"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body">
                     <div class="table-responsive">
                         <div class="table-responsive">
                             <table id="tabel-transaksi-pemasok" class="table table-striped table-hover table-bordered">
                                 <thead>
                                     <tr>
                                         <th>ID</th>
                                         <th>Tanggal</th>
                                         <th>Pemasok</th>
                                         <th>Kuantitas</th>
                                         <th>Total Harga</th>
                                         <th>Aksi</th>
                                     </tr>
                                 </thead>
                             </table>
                         </div>
                     </div>
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

             //change color of disabled form
                $('input[disabled]').css('background-color', '#FFFFFF');

            //add border to disabled form
                $('input[disabled]').css('border-bottom', '1px solid #605ca8');



         });



     </script>

     <script>
         $(document).ready(function() {
             //data table tabel-transaksi-pelanggan

             var tabelTransaksiPelanggan = $('#tabel-transaksi-pelanggan').DataTable({
                 processing: true,
                 serverSide: true,
                 ajax: {
                     url: "{{ route('barang.getTransaksiPelanggan', $barang->id) }}",
                     type: 'GET',
                 },
                 columns: [{
                         data: 'id',
                         name: 'id',
                         sClass: 'text-center'
                     },
                     {
                         data: 'created_at',
                         name: 'created_at'
                     },
                     {
                         data: 'transaksi_pelanggan.pelanggan.nama_pelanggan',
                         name: 'transaksi_pelanggan.pelanggan.nama_pelanggan'
                     },
                     {
                         data: 'kuantitas',
                         name: 'kuantitas'
                     },
                     {
                         data: 'total_harga',
                         name: 'total_harga'
                     },
                     {
                         data: 'action',
                         name: 'action',
                         orderable: false,
                         searchable: false,
                         sClass: 'text-center'
                     },
                 ],
                 order: [
                     [1, 'desc']
                 ]
             });


         });
     </script>

     <script>
         $(document).ready(function() {
             //data table tabel-transaksi-pemasok

             var tabelTransaksiPemasok = $('#tabel-transaksi-pemasok').DataTable({
                 processing: true,
                 serverSide: true,
                 ajax: {
                     url: "{{ route('barang.getTransaksiPemasok', $barang->id) }}",
                     type: 'GET',
                 },
                 columns: [{
                         data: 'id',
                         name: 'id',
                         sClass: 'text-center'
                     },
                     {
                         data: 'created_at',
                         name: 'created_at'
                     },
                     {
                         data: 'transaksi_pemasok.pemasok.nama_pemasok',
                         name: 'transaksi_pemasok.pemasok.nama_pemasok'
                     },
                     {
                         data: 'kuantitas',
                         name: 'kuantitas'
                     },
                     {
                         data: 'total_harga',
                         name: 'total_harga'
                     },
                     {
                         data: 'action',
                         name: 'action',
                         orderable: false,
                         searchable: false,
                         sClass: 'text-center'
                     },
                 ],
                 order: [
                     [1, 'desc']
                 ]
             });


         });
     </script>

     <script>
            $(document).ready(function() {

                //append bootstrap badge to #id kategori with random color from object
                var kategori = {!! json_encode($barang->produk->kategori->toArray()) !!};
                var colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark','indigo','purple','pink','navy','lightblue','teal','olive','lime','orange','fuchsia','maroon','gray'];

                for (var i = 0; i < kategori.length; i++) {
                    var randomColor = colors[Math.floor(Math.random() * colors.length)];
                    //as link to kategori.show
                    $('#daftar-kategori').append('<a href="/kategori/' + kategori[i].id + '" class="badge bg-' + randomColor + '">' + kategori[i].nama_kategori + '</a> ');

                }



            });
    </script>

 @stop
