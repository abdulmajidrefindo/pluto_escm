
<div class="card card-dark" >
    <div class="card-header border-0" role="button" data-card-widget="collapse">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Penjualan</h3>
            <a class="btn btn-sm btn-primary" href="#">View Report</a>
        </div>
    </div>
    <div class="card-body">
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
            <canvas id="sales-chart" style="display: block; height: 200px; width: 580px;" class="chartjs-render-monitor"
                width="725" height="250"></canvas>
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
</div>

@section('js')
    <script>
        $(function() {
            'use strict'
            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }
            var mode = 'index'
            var intersect = true
            var $salesChart = $('#sales-chart')
            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
                    datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
                    }, {
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                callback: function(value) {
                                    if (value >= 1000) {
                                        value /= 1000
                                        value += 'k'
                                    }
                                    return '$' + value
                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })

        })
    </script>
@endsection
