@extends('layouts.app')

@section('content')
    <div class="content-wrapper container">

        <div class="page-content">
            <section class="row my-4">
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
                    </div>
                </div>
                <div class="col-12 col-lg-10">
                    <div class="row">
                        <div class="page-heading">
                            <h3>Graph</h3>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                {{-- <div class="card-header">
                                    <h4 class="text-center">On Progress Repair</h4>
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

                {{-- <div class="col-12 col-lg-2">
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
                </div> --}}
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
                data: [
                    @foreach ($qty['Waiting'] as $index => $key)
                        {{ $key }},
                    @endforeach
                ]
            }, {
                name: 'On Progress',
                type: 'column',
                data: [
                    @foreach ($qty['On Progress'] as $index => $key)
                        {{ $key }},
                    @endforeach
                ]
            }, {
                name: 'Prep. Seal Kit',
                type: 'column',
                data: [
                    @foreach ($qty['Seal Kit'] as $index => $key)
                        {{ $key }},
                    @endforeach
                ]
            }, {
                name: 'Trial',
                type: 'column',
                data: [
                    @foreach ($qty['Trial'] as $index => $key)
                        {{ $key }},
                    @endforeach
                ]
            }, {
                name: 'Finish',
                type: 'column',
                data: [
                    @foreach ($qty['Finish'] as $index => $key)
                        {{ $key }},
                    @endforeach
                ]
            }, {
                name: 'Scrap',
                type: 'column',
                data: [
                    @foreach ($qty['Scrap'] as $index => $key)
                        {{ $key }},
                    @endforeach
                ]
            }, {
                name: 'Input',
                type: 'line',
                data: [
                    @foreach ($qty['total'] as $index => $key)
                        {{ $key }},
                    @endforeach
                ]
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
