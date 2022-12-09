@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Dashboard (pre-Alpha)</h1>
@stop

@section('content')


    <div class="row">
        <div class="col-12 col-sm-12 col-md-4">
            @include('includes.aksi-cepat')
        </div>

        <div class="col-12 col-sm-12 col-md-8">
            @include('includes.peringatan')
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            @include('includes.dashboard')
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @include('includes.transaksi-terbaru')
        </div>
        <div class="col-md-4">
            @include('includes.produk-terlaris')
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            @include('includes.grafik-penjualan')
        </div>
        <div class="col-md-6">
            @include('includes.grafik-pesanan')
        </div>


    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

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


            var $dailySalesChart = document.getElementById('daily-sales-chart').getContext('2d');
            var dailySalesChart = new Chart($dailySalesChart, {
                "type": "bar",
                "data": {
                    "datasets": [{
                            "fill": true,
                            "spanGaps": false,
                            "lineTension": 0.4,
                            "pointRadius": 3,
                            "pointHoverRadius": 3,
                            "pointStyle": "circle",
                            "borderDash": [
                                0,
                                0
                            ],

                            "data": [
                                140,
                                501,
                                382,
                                46,
                                461,
                                55,
                                111
                            ],
                            "type": "bar",
                            "label": "Minggu Ini",
                            "borderColor": "",
                            "backgroundColor": "#007bff",
                            "borderWidth": 3,
                            "hidden": false
                        },
                        {

                            "lineTension": 0.4,
                            "pointRadius": 3,
                            "pointHoverRadius": 3,
                            "pointStyle": "circle",
                            "borderDash": [
                                0,
                                0
                            ],
                            "barPercentage": 0.9,
                            "categoryPercentage": 0.8,
                            "data": [
                                40,
                                284,
                                46,
                                281,
                                802,
                                33,
                                123
                            ],
                            "type": "bar",
                            "label": "Minggu Lalu",
                            "borderColor": "",
                            "backgroundColor": "495057",
                            "borderWidth": 3,
                            "hidden": false
                        }
                    ],
                    "labels": [
                        "Senin",
                        "Selasa",
                        "Rabu",
                        "Kamis",
                        "Jum'at",
                        "Sabtu",
                        "Minggu"
                    ]
                },
                "options": {

                    "layout": {
                        "padding": {
                            "left": 0,
                            "right": 0,
                            "top": 0,
                            "bottom": 0
                        }
                    },
                    "legend": {
                        "display": true,
                        "position": "bottom",
                        "align": "end",
                        "fullWidth": true,
                        "reverse": false,
                        "labels": {
                            "fontSize": 12,
                            "fontFamily": "sans-serif",
                            "fontColor": "#666666",
                            "fontStyle": "normal",
                            "padding": 10
                        }
                    },
                    "scales": {
                        "xAxes": [{
                            "id": "X1",
                            "display": true,
                            "position": "bottom",
                            "type": "category",
                            "stacked": false,

                            "distribution": "linear",
                            "gridLines": {
                                "display": true,
                                "color": "rgba(0, 0, 0, 0.1)",
                                "borderDash": [
                                    0,
                                    0
                                ],
                                "lineWidth": 1,
                                "drawBorder": true,
                                "drawOnChartArea": false,
                                "drawTicks": true,
                                "tickMarkLength": 10,
                                "zeroLineWidth": 1,
                                "zeroLineColor": "rgba(0, 0, 0, 0.25)",
                                "zeroLineBorderDash": [
                                    0,
                                    0
                                ]
                            },


                            "ticks": {
                                "display": true,
                                "fontSize": 12,
                                "fontFamily": "sans-serif",
                                "fontColor": "#666666",
                                "fontStyle": "bold",
                                "padding": 0,
                                "stepSize": null,
                                "minRotation": 0,
                                "maxRotation": 50,
                                "mirror": false,
                                "reverse": false
                            },

                        }],
                        "yAxes": [{
                            "id": "Y1",
                            "display": true,
                            "position": "left",
                            "type": "linear",
                            "stacked": false,

                            "distribution": "linear",
                            "gridLines": {
                                "display": true,
                                "color": "rgba(0, 0, 0, 0.1)",
                                "borderDash": [
                                    0,
                                    0
                                ],
                                "lineWidth": 1,
                                "drawBorder": true,
                                "drawOnChartArea": true,
                                "drawTicks": true,
                                "tickMarkLength": 10,
                                "zeroLineWidth": 1,
                                "zeroLineColor": "rgba(0, 0, 0, 0.25)",
                                "zeroLineBorderDash": [
                                    0,
                                    0
                                ]
                            },


                            "ticks": {
                                "display": true,
                                "fontSize": 12,
                                "fontFamily": "sans-serif",
                                "fontColor": "#666666",
                                "fontStyle": "normal",
                                "padding": 0,
                                "stepSize": null,
                                "minRotation": 0,
                                "maxRotation": 50,
                                "mirror": false,
                                "reverse": false
                            },

                        }]
                    },


                }
            })


            var $weeklySalesChart = document.getElementById('weekly-sales-chart').getContext('2d');
            var weeklySalesChart = new Chart($weeklySalesChart, {
                "type": "bar",
                "data": {
                    "datasets": [{
                            "fill": true,
                            "spanGaps": false,
                            "lineTension": 0.4,
                            "pointRadius": 3,
                            "pointHoverRadius": 3,
                            "pointStyle": "circle",
                            "borderDash": [
                                0,
                                0
                            ],

                            "data": [
                                140,
                                501,
                                382,
                                46,
                                461,
                                55,
                                111
                            ],
                            "type": "bar",
                            "label": "Minggu Ini",
                            "borderColor": "",
                            "backgroundColor": "#007bff",
                            "borderWidth": 3,
                            "hidden": false
                        },
                        {

                            "lineTension": 0.4,
                            "pointRadius": 3,
                            "pointHoverRadius": 3,
                            "pointStyle": "circle",
                            "borderDash": [
                                0,
                                0
                            ],
                            "barPercentage": 0.9,
                            "categoryPercentage": 0.8,
                            "data": [
                                40,
                                284,
                                46,
                                281,
                                802,
                                33,
                                123
                            ],
                            "type": "bar",
                            "label": "Minggu Lalu",
                            "borderColor": "",
                            "backgroundColor": "495057",
                            "borderWidth": 3,
                            "hidden": false
                        }
                    ],
                    "labels": [
                        "Senin",
                        "Selasa",
                        "Rabu",
                        "Kamis",
                        "Jum'at",
                        "Sabtu",
                        "Minggu"
                    ]
                },
                "options": {

                    "layout": {
                        "padding": {
                            "left": 0,
                            "right": 0,
                            "top": 0,
                            "bottom": 0
                        }
                    },
                    "legend": {
                        "display": true,
                        "position": "bottom",
                        "align": "end",
                        "fullWidth": true,
                        "reverse": false,
                        "labels": {
                            "fontSize": 12,
                            "fontFamily": "sans-serif",
                            "fontColor": "#666666",
                            "fontStyle": "normal",
                            "padding": 10
                        }
                    },
                    "scales": {
                        "xAxes": [{
                            "id": "X1",
                            "display": true,
                            "position": "bottom",
                            "type": "category",
                            "stacked": false,

                            "distribution": "linear",
                            "gridLines": {
                                "display": true,
                                "color": "rgba(0, 0, 0, 0.1)",
                                "borderDash": [
                                    0,
                                    0
                                ],
                                "lineWidth": 1,
                                "drawBorder": true,
                                "drawOnChartArea": false,
                                "drawTicks": true,
                                "tickMarkLength": 10,
                                "zeroLineWidth": 1,
                                "zeroLineColor": "rgba(0, 0, 0, 0.25)",
                                "zeroLineBorderDash": [
                                    0,
                                    0
                                ]
                            },


                            "ticks": {
                                "display": true,
                                "fontSize": 12,
                                "fontFamily": "sans-serif",
                                "fontColor": "#666666",
                                "fontStyle": "bold",
                                "padding": 0,
                                "stepSize": null,
                                "minRotation": 0,
                                "maxRotation": 50,
                                "mirror": false,
                                "reverse": false
                            },

                        }],
                        "yAxes": [{
                            "id": "Y1",
                            "display": true,
                            "position": "left",
                            "type": "linear",
                            "stacked": false,

                            "distribution": "linear",
                            "gridLines": {
                                "display": true,
                                "color": "rgba(0, 0, 0, 0.1)",
                                "borderDash": [
                                    0,
                                    0
                                ],
                                "lineWidth": 1,
                                "drawBorder": true,
                                "drawOnChartArea": true,
                                "drawTicks": true,
                                "tickMarkLength": 10,
                                "zeroLineWidth": 1,
                                "zeroLineColor": "rgba(0, 0, 0, 0.25)",
                                "zeroLineBorderDash": [
                                    0,
                                    0
                                ]
                            },


                            "ticks": {
                                "display": true,
                                "fontSize": 12,
                                "fontFamily": "sans-serif",
                                "fontColor": "#666666",
                                "fontStyle": "normal",
                                "padding": 0,
                                "stepSize": null,
                                "minRotation": 0,
                                "maxRotation": 50,
                                "mirror": false,
                                "reverse": false
                            },

                        }]
                    },


                }
            })



            var $visitorsChart = $('#visitors-chart')
            var visitorsChart = new Chart($visitorsChart, {
                data: {
                    labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
                    datasets: [{
                        type: 'line',
                        data: [100, 120, 170, 167, 180, 177, 160],
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        pointBorderColor: '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill: false
                    }, {
                        type: 'line',
                        data: [60, 80, 70, 67, 80, 77, 100],
                        backgroundColor: 'tansparent',
                        borderColor: '#ced4da',
                        pointBorderColor: '#ced4da',
                        pointBackgroundColor: '#ced4da',
                        fill: false
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
                                suggestedMax: 200
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
@stop
