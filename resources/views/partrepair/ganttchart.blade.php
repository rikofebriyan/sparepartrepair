@extends('layouts.app')

@section('content')
    <div class="card border text-center mb-2">
        <h3 class="m-2">GANTT CHART SCHEDULE REPAIR</h3>
    </div>

    <div class="row m-1">
        <div class="card col border">
            <div id="gantt">
            </div>
        </div>


        <div class="card col-4 border mx-2" id="asu" style="display: none">
            <div class="p-3">
                <div class="d-flex justify-content-between">
                    <div class="p-0">
                        <h3>Repair Details</h3>
                    </div>
                    <div class="p-0">
                        <a href="/home"><img width="120" height="30"
                                src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>

                <hr class="m-2">

                {{-- Name: <input type="text" id="testing" value="Mickey"> --}}
                {{-- <p id="testing"></p> --}}


                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">No. Ticket</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="testing"></p>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Date Created</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        15 Jan 2022
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">PIC repair</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        Riko
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Part Name</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        Robot Gundam
                    </div>
                </div>


                <div class="divider m-0">
                    <div class="divider-text">Cost</div>
                </div>



                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Place of Repair</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        Subcont
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Subcont Cost</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        10000
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Labor Cost</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        15000
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Seal Kit Cost</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        15000
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Total Cost</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        15000
                    </div>
                </div>


                <div class="divider m-0">
                    <div class="divider-text">Trial Result</div>
                </div>
                <div class="divider m-0">
                    <input type='button' id='hideshow' value='hide/show'>
                </div>


            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ asset('assets/extensions/frappe-gantt/dist/frappe-gantt.js') }}"></script>
    <script>
        var tasks = [{
                id: 'Task 1',
                name: 'Redesign website',
                start: '2016-12-28',
                end: '2016-12-31',
                progress: 20,
                dependencies: 'Task 2, Task 3',
                custom_class: 'bar-milestone' // optional
            },
            {
                id: 'Task 1',
                name: 'Redesign 2',
                start: '2016-12-31',
                end: '2017-01-02',
                progress: 20,
                dependencies: 'Task 2, Task 3',
                custom_class: 'bar-milestone' // optional
            },
            {
                id: 'Task 1',
                name: 'Redesign 2',
                start: '2016-12-31',
                end: '2017-01-02',
                progress: 20,
                dependencies: 'Task 2, Task 3',
                custom_class: 'bar-milestone' // optional
            },
            {
                id: 'Task 1',
                name: 'Redesign 2',
                start: '2016-12-31',
                end: '2017-01-02',
                progress: 20,
                dependencies: 'Task 2, Task 3',
                custom_class: 'bar-milestone' // optional
            },
            {
                id: 'Task 1',
                name: 'Redesign 2',
                start: '2016-12-31',
                end: '2017-01-02',
                progress: 20,
                dependencies: 'Task 2, Task 3',
                custom_class: 'bar-milestone' // optional
            },
            {
                id: 'Task 1',
                name: 'Redesign 2',
                start: '2016-12-31',
                end: '2017-01-02',
                progress: 20,
                dependencies: 'Task 2, Task 3',
                custom_class: 'bar-milestone' // optional
            },





        ]
        var gantt = new Gantt("#gantt2", tasks);
        gantt.change_view_mode('Day') // Quarter Day, Half Day, Day, Week, Month 
    </script> --}}



    <script>
        jQuery(document).ready(function() {
            jQuery('#hideshow').on('click', function(event) {
                jQuery('#asu').toggle('hide');
                // alert('ok');
            });
        });

        // const d = 'asu';
        // document.getElementById("demo").innerHTML = d;
        // alert(d);
    </script>

    <script>
        var data =
            <?php echo json_encode($data); ?>;
        var options = {
            series: [{
                    name: 'Plan',
                    data: [
                        @foreach ($data as $dt)
                            {
                                x: '{{ $dt['x'] }}',
                                y: [
                                    new Date('{{ $dt['y'] }}').getTime(),
                                    new Date('{{ $dt['z'] }}').getTime()
                                ]
                            },
                        @endforeach
                    ]
                },
                {
                    name: 'Actual',
                    data: [
                        @foreach ($data as $dt)
                            {
                                x: '{{ $dt['x'] }}',
                                y: [new Date('{{ $dt['y'] }}').getTime(),
                                    new Date('{{ $dt['z'] }}').getTime()
                                ]
                            },
                        @endforeach
                    ]
                }
            ],
            chart: {
                height: 1000,
                type: 'rangeBar',
                offsetY: '15',
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        $('#asu').show();
                        // console.log(config.w.globals.labels[config.dataPointIndex]);
                        // var x = console.log(config.w.globals.labels[config.dataPointIndex]);
                        // var y = console.log(config);
                        console.log(data[config.dataPointIndex].y);
                        document.getElementById("testing").innerHTML = data[config.dataPointIndex].x;
                        // $('#testing').val('OK');
                        // document.write(data[0]);
                    }
                }
            },
            dataLabels: {
                enabled: true,
                textAnchor: 'start',
                formatter: function(val) {
                    var a = new Date(val[0]).getTime();
                    var b = new Date(val[1]).getTime();
                    var diff = Math.ceil((b - a) / (1000 * 3600 * 24));
                    return diff + (diff > 1 ? ' days' : ' day');
                },
                offsetX: 0,
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.25,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [50, 0, 100, 100]
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true
                }

            },
            legend: {
                position: 'bottom'
            },
            xaxis: {
                type: 'datetime',
                position: 'top',
            },
            // tooltip: {
            //     custom: function({
            //         series,
            //         seriesIndex,
            //         dataPointIndex,
            //         w
            //     }) {
            //         let title = w.globals.tooltip.tooltipTitle.outerHTML;
            //         let items = "asdasdasd";
            //         w.globals.tooltip.ttItems.forEach(x => {
            //             items = items + x.outerHTML

            //         })
            //         return title + items;
            //     }
            // }
        };

        var chart = new ApexCharts(document.querySelector("#gantt"), options);
        chart.render();
    </script>


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
