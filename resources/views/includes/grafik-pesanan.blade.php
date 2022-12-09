<div class="card card-dark">
    <div class="card-header border-0" role="button" data-card-widget="collapse">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Online Store Visitors</h3>
            <a class="btn btn-sm btn-primary" href="#">View Report</a>
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex">
            <p class="d-flex flex-column">
                <span class="text-bold text-lg">820</span>
                <span>Visitors Over Time</span>
            </p>
            <p class="ml-auto d-flex flex-column text-right">
                <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                </span>
                <span class="text-muted">Since last week</span>
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
            <canvas id="visitors-chart" height="250" style="display: block; height: 200px; width: 846px;"
                width="1057" class="chartjs-render-monitor"></canvas>
        </div>
        <div class="d-flex flex-row justify-content-end">
            <span class="mr-2">
                <i class="fas fa-square text-primary"></i> This Week
            </span>
            <span>
                <i class="fas fa-square text-gray"></i> Last Week
            </span>
        </div>
    </div>
</div>
