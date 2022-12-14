<div class="card card-dark">
    <div class="card-header" role="button" data-card-widget="collapse">
      <h3 class="card-title">
        <i class="fas fa-sm fa-exclamation-triangle fa-fw"></i> Informasi
      </h3>
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
      <div class="row row d-flex">
        <div class="p-2 col-12 col-sm-6 col-md-3">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3> {{ $informasi['total_user'] }}</h3>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fas fa-id-badge"></i>
            </div>
            <a href="#" class="small-box-footer"> .
            </a>
          </div>
        </div>
        <div class="p-2 col-12 col-sm-6 col-md-3">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3> {{ $informasi['total_barang'] }}</h3>
              <p>Total Item</p>
            </div>
            <div class="icon">
              <i class="fas fa-boxes"></i>
            </div>
            <a href="{{ route('barang.index') }}" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        <div class="p-2 col-12 col-sm-6 col-md-3">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3> {{ $informasi['total_pemasok'] }}</h3>
              <p>Total Pemasok</p>
            </div>
            <div class="icon">
              <i class="fas fa-dolly-flatbed"></i>
            </div>
            <a href="{{ route('pemasok.index') }}" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="p-2 col-12 col-sm-6 col-md-3">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3> {{ $informasi['total_pelanggan'] }}</h3>
              <p>Total Pelanggan</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-tag"></i>
            </div>
            <a href="{{ route('pelanggan.index') }}" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="p-2 col-12 col-sm-6 col-md-3">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3> {{ $informasi['total_transaksi_pemasok'] }}</h3>
              <p>Transaksi Masuk</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-download"></i>
            </div>
            <a href="{{ route('transaksiPemasok.index') }}" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="p-2 col-12 col-sm-6 col-md-3">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3> {{ $informasi['total_transaksi_pelanggan'] }}</h3>
              <p>Transaksi Keluar</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-upload"></i>
            </div>
            <a href="{{ route('transaksiPelanggan.index') }}" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="p-2 flex-fill bd-highlight">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>@currency($informasi['total_pengeluaran'])</h3>
              <p>Total Pengeluaran</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> .
            </a>
          </div>
        </div>


        <div class="p-2 flex-fill bd-highlight">
          <div class="small-box bg-purple">
            <div class="inner">
              <h3> @currency($informasi['total_pendapatan']['total'])</h3>
              <p>Total Pendapatan</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> .
            </a>
          </div>
        </div>
      </div>
      <div class="clearfix hidden-md-up"></div>
    </div>
  </div>
