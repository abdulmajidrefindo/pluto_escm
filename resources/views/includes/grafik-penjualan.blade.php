<div class="card card-dark">
    <div class="card-header p-0 d-flex">


      <h3 class="card-title p-3">Grafik Penjualan</h3>

        <ul class="nav nav-pills ml-auto p-2" id="custom-tabs-two-tab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home"
                    role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Minggu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile"
                    role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Bulan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill"
                    href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages"
                    aria-selected="false">Tahun</a>
            </li>

            <li class = "d-flex">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>
            </li>

        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel"
                aria-labelledby="custom-tabs-two-home-tab">
                <div class="position-relative mb-4"> {!! $grafik['harian']->container() !!} </div>
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">@currency($informasi['total_pendapatan']['minggu_ini'])</span>
                        <span>Profit Dalam Seminggu</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        @if ($informasi['persentasi_pendapatan']['minggu_ini'] < 0)
                            <span class="text-danger">
                                <i class="fas fa-arrow-down"></i>
                                {{ $informasi['persentasi_pendapatan']['minggu_ini'] }}% </span>
                        @else
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> {{ $informasi['persentasi_pendapatan']['minggu_ini'] }}%
                            </span>
                        @endif
                        <span class="text-muted">Sejak Minggu Lalu</span>
                    </p>
                </div>
                <div class="d-flex flex-row justify-content-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('transaksiPelanggan.index') }}">View Report</a>
                </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                aria-labelledby="custom-tabs-two-profile-tab">
                <div class="position-relative mb-4"> {!! $grafik['mingguan']->container() !!} </div>
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">@currency($informasi['total_pendapatan']['bulan_ini'])</span>
                        <span>Profit Sepanjang Bulan</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">

                        @if ($informasi['persentasi_pendapatan']['bulan_ini'] < 0)
                            <span class="text-danger">
                                <i class="fas fa-arrow-down"></i>
                                {{ $informasi['persentasi_pendapatan']['bulan_ini'] }}% </span>
                        @else
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> {{ $informasi['persentasi_pendapatan']['bulan_ini'] }}%
                            </span>
                        @endif

                        <span class="text-muted">Sejak Bulan Lalu</span>

                    </p>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <a class="btn btn-sm btn-primary" href="{{ route('transaksiPelanggan.index') }}">View Report</a>
              </div>
            </div>
            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel"
                aria-labelledby="custom-tabs-two-messages-tab">
                <div class="position-relative mb-4"> {!! $grafik['bulanan']->container() !!} </div>
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">@currency($informasi['total_pendapatan']['tahun_ini'])</span>
                        <span> Profit Sepanjang Tahun</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        @if ($informasi['persentasi_pendapatan']['tahun_ini'] < 0)
                            <span class="text-danger">
                                <i class="fas fa-arrow-down"></i>
                                {{ $informasi['persentasi_pendapatan']['tahun_ini'] }}% </span>
                        @else
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> {{ $informasi['persentasi_pendapatan']['tahun_ini'] }}%
                            </span>
                        @endif
                        <span class="text-muted">Sejak Tahun Lalu</span>
                    </p>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  <a class="btn btn-sm btn-primary" href="{{ route('transaksiPelanggan.index') }}">View Report</a>
              </div>
            </div>
        </div>
    </div>
</div> @section('js')
    <script src="{{ @asset('vendor/larapex-charts/apexcharts.js') }}"></script>
    {{ $grafik['harian']->script() }}
    {{ $grafik['mingguan']->script() }}
    {{ $grafik['bulanan']->script() }}
@endsection
