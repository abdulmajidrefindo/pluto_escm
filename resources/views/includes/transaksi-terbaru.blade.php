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
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Transaksi</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (  $informasi['transaksi_terbaru'] as $transaksi)
                        @if ($transaksi->jenis_transaksi === 'Masuk')
                            <?php
                            $badge = 'badge-success';

                            $routeTransaksi = route('transaksiPemasok.show', $transaksi->id);
                            ?>
                        @else
                            <?php
                            $badge = 'badge-danger';

                            $routeTransaksi =  route('transaksiPelanggan.show', $transaksi->id);
                            ?>
                        @endif

                        <tr>
                            <td><a href="{{$routeTransaksi}}">{{ $transaksi->id }}</a></td>
                            <td>@datetime($transaksi->created_at)</td>
                            <td>{{ $transaksi->nama }}</td>
                            <td>

                                    <span class="badge {{$badge}}">{{ $transaksi->jenis_transaksi }}</span>

                            </td>
                            <td>@currency($transaksi->total_harga)</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

    </div>

    <div class="card-footer clearfix d-flex justify-content-end">
        <a href="{{route('transaksiPelanggan.index')}}" class="btn btn-sm bg-purple rounded-0">Transaksi Penjualan</a>
        <a href="{{route('transaksiPemasok.index')}}" class="btn btn-sm bg-maroon rounded-0">Transaksi Pemasok</a>
    </div>

</div>
