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
                <x-adminlte-info-box title="Users" text="{{ $informasi['total_user'] }}" icon="fas fa-lg fa-download"
                    icon-theme="purple" />
            </div>
            <div class="col-12 col-sm-6 col-md-3">


                <x-adminlte-info-box title="{{ $informasi['total_barang'] }}" text="Total Barang"
                    icon="fas fa-lg fa-boxes text-primary" theme="gradient-primary" icon-theme="white" />

            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">


                <x-adminlte-info-box title="{{ $informasi['total_pemasok'] }}" text="Total Pemasok"
                    icon="fas fa-lg fa-dolly-flatbed text-primary" theme="gradient-primary" icon-theme="white" />


            </div>
            <div class="col-12 col-sm-6 col-md-3">

                <x-adminlte-info-box title="Pelanggan" text="{{ $informasi['total_pelanggan'] }}"
                    icon="fas fa-lg fa-user-tag" icon-theme="purple" />

            </div>
            <div class="col-12 col-sm-6 col-md-3">

                <x-adminlte-info-box title="Transaksi Masuk" text="{{ $informasi['total_transaksi_pemasok'] }}"
                    icon="fas fa-lg fa-file-download" icon-theme="purple" />

            </div>
            <div class="col-12 col-sm-6 col-md-3">


                <x-adminlte-info-box title="Transaksi Keluar" text="{{ $informasi['total_transaksi_pelanggan'] }}"
                    icon="fas fa-lg fa-file-upload" icon-theme="purple" />

            </div>

            <div class="col-12 col-sm-6 col-md-3">


                <x-adminlte-info-box title="Total Pengeluaran" text="{{$informasi['total_pengeluaran']}}"
                    icon="fas fa-lg fa-file-invoice-dollar" icon-theme="purple" />


            </div>


            <div class="col-12 col-sm-6 col-md-3">
                <x-adminlte-info-box title="Total Pendapatan" text="@currency($informasi['total_pendapatan'])"
                    icon="fas fa-lg fa-file-invoice-dollar" icon-theme="purple" />

            </div>
        </div>
        <div class="clearfix hidden-md-up"></div>
    </div>
</div>
