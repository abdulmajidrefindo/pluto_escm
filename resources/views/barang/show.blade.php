 @extends('adminlte::page')

 @section('content_header')
     <h1>Rincian Barang</h1>
 @stop

 @section('content')

     <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
             <div class="card card-dark">
                 <div class="card-header border-transparent" role="button" data-card-widget="collapse">
                     <h3 class="card-title">Transaksi Terbaru</h3>
                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                             <i class="fas fa-minus"></i>
                         </button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove">
                             <i class="fas fa-times"></i>
                         </button>
                     </div>
                 </div>
                 <div class="card-body p-0">
                     <div class="table-responsive">
                         <table class="table table-striped">

                            <tbody>
                                <tr>

                                    <td class="col-md-4">ID</td>
                                    <td>
                                        {{ $barang->id }}
                                    </td>

                                </tr>
                                <tr>

                                    <td>SKU Barang</td>
                                    <td>
                                        {{ $barang->sku }}
                                    </td>

                                </tr>
                                <tr>

                                    <td>Harga Barang</td>
                                    <td>
                                        {{ $barang->harga }}
                                    </td>

                                </tr>


                                <tr>

                                    <td>Total Stok Barang</td>
                                    <td>
                                        {{ $barang->total_stok }}
                                    </td>

                                </tr>
                                <tr>

                                    <td>Waktu dibuat</td>
                                    <td>
                                        {{ $barang->created_at }}
                                    </td>

                                </tr>
                                <tr>

                                    <td>Terakhir diubah</td>
                                    <td>
                                        {{ $barang->updated_at }}
                                    </td>

                                </tr>
                            </tbody>
                         </table>
                     </div>
                 </div>

             </div>
         </div>

         <div class="col-md-6">

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
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="small-box bg-purple">
                              <div class="inner">
                                <h3> {{ $barang->total_terjual }}</h3>
                                <h4>Total Terjual</h4>
                              </div>
                              <div class="icon">
                                <i class="fas fa-dolly-flatbed"></i>
                              </div>
                              <a href="#" class="small-box-footer">  </i>
                              </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="small-box bg-purple">
                              <div class="inner">
                                <h3> {{ $barang->total_masuk }}</h3>
                                <h4>Total Diterima</h4>
                              </div>
                              <div class="icon">
                                <i class="fas fa-dolly-flatbed"></i>
                              </div>
                              <a href="#" class="small-box-footer">  </i>
                              </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="small-box bg-purple">
                              <div class="inner">
                                <h3>@currency($informasi['pengeluaran'])</h3>
                                <h4>Total Pengeluaran</h4>
                              </div>
                              <div class="icon">
                                <i class="fas fa-dolly-flatbed"></i>
                              </div>
                              <a href="#" class="small-box-footer">  </i>
                              </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="small-box bg-purple">
                              <div class="inner">
                                <h3>@currency($informasi['pemasukan'])</h3>
                                <h4>Total Pemasukan</h4>
                              </div>
                              <div class="icon">
                                <i class="fas fa-dolly-flatbed"></i>
                              </div>
                              <a href="#" class="small-box-footer">  </i>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

         </div>

     </div>

 @stop
