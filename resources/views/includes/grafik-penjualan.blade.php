<div class="card card-dark card-tabs">
    <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
            <li class="pt-2 px-3">
                <h3 class="card-title">Grafik Penjualan</h3>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill" href="#custom-tabs-two-home"
                    role="tab" aria-controls="custom-tabs-two-home" aria-selected="true">Harian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-profile-tab" data-toggle="pill" href="#custom-tabs-two-profile"
                    role="tab" aria-controls="custom-tabs-two-profile" aria-selected="false">Mingguan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="custom-tabs-two-messages-tab" data-toggle="pill"
                    href="#custom-tabs-two-messages" role="tab" aria-controls="custom-tabs-two-messages"
                    aria-selected="false">Bulanan</a>
            </li>

        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-two-tabContent">
            <div class="tab-pane fade active show" id="custom-tabs-two-home" role="tabpanel"
                aria-labelledby="custom-tabs-two-home-tab">

                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">$18,230.00</span>
                        <span>Sales Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 33.1%
                        </span>
                        <span class="text-muted">Since last month</span>
                    </p>
                </div>

                <div class="position-relative mb-4">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>


                    <canvas id="daily-sales-chart"
                        class="chartjs-render-monitor" width="725" height="350"></canvas>

                </div>

                <div class="d-flex flex-row justify-content-end">

                    <a class="btn btn-sm btn-primary" href="#">View Report</a>
                </div>


            </div>
            <div class="tab-pane fade" id="custom-tabs-two-profile" role="tabpanel"
                aria-labelledby="custom-tabs-two-profile-tab">

                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">$18,230.00</span>
                        <span>Sales Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 33.1%
                        </span>
                        <span class="text-muted">Since last month</span>
                    </p>
                </div>

                <div class="position-relative mb-4">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="weekly-sales-chart" style="display: block; height: 200px; width: 580px;"
                        class="chartjs-render-monitor" width="725" height="350"></canvas>

                </div>



                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> This year
                    </span>
                    <span>
                        <i class="fas fa-square text-gray"></i> Last year
                    </span>
                </div>

            </div>
            <div class="tab-pane fade" id="custom-tabs-two-messages" role="tabpanel"
                aria-labelledby="custom-tabs-two-messages-tab">
                Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi
                placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique
                nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna
                a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus
                efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex
                vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget
                sem eu risus tincidunt eleifend ac ornare magna.
            </div>

        </div>
    </div>

</div>

<div class="card card-dark">
    <div class="card-header border-0" role="button" data-card-widget="collapse">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Penjualan</h3>
            <a class="btn btn-sm btn-primary" href="#">View Report</a>
        </div>
    </div>
    <div class="card-body">

    </div>
</div>
