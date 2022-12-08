<div class="card card-dark">
    <div class="card-header">
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
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-dark">
            <div class="inner">
              <h3> {{ $informasi['total_user'] }}</h3>
              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fas fa-id-badge"></i>
            </div>
            <a href="#" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-dark">
            <div class="inner">
              <h3> {{ $informasi['total_barang'] }}</h3>
              <p>Total Item</p>
            </div>
            <div class="icon">
              <i class="fas fa-boxes"></i>
            </div>
            <a href="#" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-info">
            <div class="inner">
              <h3> {{ $informasi['total_pemasok'] }}</h3>
              <p>Total Pemasok</p>
            </div>
            <div class="icon">
              <i class="fas fa-dolly-flatbed"></i>
            </div>
            <a href="#" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-info">
            <div class="inner">
              <h3> {{ $informasi['total_pelanggan'] }}</h3>
              <p>Total Pelanggan</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-tag"></i>
            </div>
            <a href="#" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3> {{ $informasi['total_transaksi_pemasok'] }}</h3>
              <p>Transaksi Masuk</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-download"></i>
            </div>
            <a href="#" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3> {{ $informasi['total_transaksi_pelanggan'] }}</h3>
              <p>Transaksi Keluar</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-upload"></i>
            </div>
            <a href="#" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>@currency($informasi['total_pengeluaran'])</h3>
              <p>Total Pengeluaran</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>


        <div class="col-12 col-sm-6 col-md-3">
          <div class="small-box bg-success">
            <div class="inner">
              <h3> @currency($informasi['total_pendapatan'])</h3>
              <p>Total Pendapatan</p>
            </div>
            <div class="icon">
              <i class="fas fa-file-invoice-dollar"></i>
            </div>
            <a href="#" class="small-box-footer"> Detail <i class="fas fa-fw fa-xs fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="clearfix hidden-md-up"></div>
    </div>
  </div>
