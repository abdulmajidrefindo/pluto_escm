<div class="card card-dark card-tabs">
    <div class="card-header p-0 pt-1">
      <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
        <li class="pt-2 px-3">
          <h3 class="card-title">Grafik Penjualan</h3>
        </li>
        <li class="nav-item">
          <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home" role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Minggu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile" role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Bulan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill" href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages" aria-selected="false">Tahun</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="custom-tabs-two-tabContent">
        <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel" aria-labelledby="custom-tabs-two-home-tab">
          <div class="position-relative mb-4"> {!! $grafik['harian']->container() !!} </div>
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">$18,230.00</span>
              <span>Sales Over Time</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> 33.1% </span>
              <span class="text-muted">Since last month</span>
            </p>
          </div>
          <div class="d-flex flex-row justify-content-end">
            <a class="btn btn-sm btn-primary" href="#">View Report</a>
          </div>
        </div>
        <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel" aria-labelledby="custom-tabs-two-profile-tab">
          <div class="position-relative mb-4"> {!! $grafik['mingguan']->container() !!} </div>
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">$18,230.00</span>
              <span>Sales Over Time</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> 33.1% </span>
              <span class="text-muted">Since last month</span>
            </p>
          </div>
        </div>
        <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel" aria-labelledby="custom-tabs-two-messages-tab">
          <div class="position-relative mb-4"> {!! $grafik['bulanan']->container() !!} </div>
          <div class="d-flex">
            <p class="d-flex flex-column">
              <span class="text-bold text-lg">$18,230.00</span>
              <span>Sales Over Time</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
              <span class="text-success">
                <i class="fas fa-arrow-up"></i> 33.1% </span>
              <span class="text-muted">Since last month</span>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div> @section('js') <script src="{{ @asset('vendor/larapex-charts/apexcharts.js') }}"></script>
  {{ $grafik['harian']->script() }}
  {{ $grafik['mingguan']->script() }}
  {{ $grafik['bulanan']->script() }} @endsection
