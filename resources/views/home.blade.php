@extends('layouts.app')

@section('content')
    <div class="content-wrapper container">

        <div class="page-content">
            <section class="row my-4">
                <div class="col-12 col-lg-10">
                    <div class="row">
                        <div class="page-heading d-flex justify-content-between">
                            <div>
                                <h3>On Progress Repair</h3>
                            </div>
                            <div>
                                <input type="month" class="form-control fw-bold" name="filter_month" id="filter_month"
                                    value="1989-11">
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        {{-- <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12">
                                            <h6 class="text-muted font-semibold">Input</h6>
                                            <h6 class="font-extrabold mb-0">353 pcs</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        {{-- <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12">
                                            <h6 class="text-muted font-semibold">Waiting</h6>
                                            <h6 class="font-extrabold mb-0">100 Pcs</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        {{-- <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12">
                                            <h6 class="text-muted font-semibold">Analisa</h6>
                                            <h6 class="font-extrabold mb-0">4 Pcs</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        {{-- <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12">
                                            <h6 class="text-muted font-semibold">Prep. Seal Kit</h6>
                                            <h6 class="font-extrabold mb-0">112 Pcs</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        {{-- <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12">
                                            <h6 class="text-muted font-semibold">Trial</h6>
                                            <h6 class="font-extrabold mb-0">112 Pcs</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        {{-- <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-12">
                                            <h6 class="text-muted font-semibold">Finish</h6>
                                            <h6 class="font-extrabold mb-0">112 Pcs</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="page-heading">
                            <h3>Graph</h3>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4>Qty Repair Graphic</h4>
                                </div> --}}
                                <div class="card-body">
                                    {{-- <div id="chart-qty-repair"></div> --}}
                                    <div id="chart-qty-repair">
                                        <apexchart type="bar" height="350" :options="chartOptions"
                                            :series="series"></apexchart>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4>Cost Saving</h4>
                                </div> --}}
                                <div class="card-body">
                                    <div id="chart-cost-saving"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-2">
                    <div class="row">
                        <div class="page-heading">
                            <h3>Repair Stats</h3>
                        </div>
                        <div class="col-6 col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                                            <h6 class="text-muted font-semibold">Total Cost Saving</h6>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start ">
                                            <h6 class="font-extrabold mb-0">Rp 999.999.999.999</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                                            <h6 class="text-muted font-semibold">Total Part Repaired</h6>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start ">
                                            <h6 class="font-extrabold mb-0">999.999.999 Pcs</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-3 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-9">
                                            <h6 class="text-muted font-semibold">Total Repairman</h6>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-12 d-flex justify-content-start ">
                                            <h6 class="font-extrabold mb-0">4 Person</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('script')
    <!-- script chart-qty-repair -->
    <script>
        var options = {
            series: [{
                name: 'Waiting',
                type: 'column',
                data: [44, 55, 41, 67, 22]
            }, {
                name: 'Analisa',
                type: 'column',
                data: [13, 23, 20, 8, 13]
            }, {
                name: 'Prep. Seal Kit',
                type: 'column',
                data: [11, 17, 15, 15, 21]
            }, {
                name: 'Trial',
                type: 'column',
                data: [21, 7, 25, 13, 22]
            }, {
                name: 'Finish',
                type: 'column',
                data: [15, 17, 35, 23, 20]
            }, {
                name: 'Scrap',
                type: 'column',
                data: [0, 0, 2, 1, 3]
            }, {
                name: 'Input',
                type: 'line',
                data: [104, 119, 137, 123, 102]
            }],
            colors: [
                '#fd7e14',
                'rgba(0, 197, 220, 1)',
                'rgba(52, 191, 163, 1)',
                'rgba(115, 76, 234, 1)',
                'rgba(255, 185, 0, 1)',
                '#343a40',
                'rgba(244, 81, 108, 1)',
            ],
            chart: {
                type: 'line',
                height: 350,
                stacked: true,
                toolbar: {
                    show: true
                },
                zoom: {
                    enabled: true
                }
            },
            title: {
                text: 'Qty Part Repair',
                align: 'left'
            },
            dataLabels: {
                enabled: true,
                enabledOnSeries: [6]
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        position: 'bottom',
                        offsetX: -10,
                        offsetY: 0
                    }
                }
            }],
            plotOptions: {
                bar: {
                    horizontal: false,
                    borderRadius: 10,
                    dataLabels: {
                        total: {
                            enabled: true,
                            style: {
                                fontSize: '13px',
                                fontWeight: 900
                            }
                        }
                    }
                },
            },
            xaxis: {
                categories: ['W1', 'W2', 'W3', 'W4',
                    'W5',
                ],
            },
            yaxis: {
                title: {
                    text: 'Qty'
                },
            },
            legend: {
                position: 'right',
                offsetY: 40
            },
            fill: {
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-qty-repair"), options);
        chart.render();
    </script>

    <!-- script chart-cost-saving -->
    <script>
        var options = {
            series: [{
                    name: "Cost Saving",
                    data: [450, 520, 380, 240, 330, 260, 210, 200, 600, 800, 150, 100]
                },
                {
                    name: 'Target',
                    data: [1300, 1300, 1300, 1300, 1300, 1300, 1300, 1300, 1300, 1300, 1300, 1300]
                }
            ],
            chart: {
                height: 350,
                type: 'line',
                zoom: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [5, 7, 5],
                curve: 'straight',
                dashArray: [0, 8, 5]
            },
            title: {
                text: 'Cost Saving',
                align: 'left'
            },
            legend: {
                tooltipHoverFormatter: function(val, opts) {
                    return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                }
            },
            markers: {
                size: 0,
                hover: {
                    sizeOffset: 6
                }
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                    'Oct', 'Nov', 'Dec'
                ],
            },
            yaxis: {
                title: {
                    text: 'Rupiah (in Million)'
                },
            },
            tooltip: {
                y: [{
                        title: {
                            formatter: function(val) {
                                return val + " (mins)"
                            }
                        }
                    },
                    {
                        title: {
                            formatter: function(val) {
                                return val + " per session"
                            }
                        }
                    },
                    {
                        title: {
                            formatter: function(val) {
                                return val;
                            }
                        }
                    }
                ]
            },
            grid: {
                borderColor: '#f1f1f1',
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-cost-saving"), options);
        chart.render();
    </script>

    <script>
        $(document).ready(function() {
            $('#filter_month').on('input', function() {
                var month = $('#filter_month').val()

                alert(month)
            });
        });
    </script>
@endsection
