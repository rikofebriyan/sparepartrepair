@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/timeline.css') }}">
@endsection
@section('content')
    <div class="card border text-center mb-2">
        <h3 class="m-2">GANTT CHART SCHEDULE REPAIR</h3>
    </div>
    <div class="row m-1" style="transition: width 0.5s">
        <div class="card col border" style="transition: width 0.5s">
            <div id="gantt" class="m-2" style="transition: width 0.5s">
            </div>
        </div>
        <div class="card col-4 border mx-2" id="asu" style="display: none; transition:width 0.5s; min-height:1000px">
            <div class="row">
                <div class="col-3">
                    <a href="#" type="button" id="hideshow" class="btn icon icon-left btn-light border mt-2"><i
                            data-feather="x"></i>
                        Hide</a>
                </div>
            </div>

            <div class="p-3">
                <div class="d-flex justify-content-between">
                    <div class="p-0">
                        <h3>Repair Details</h3>
                    </div>
                    <div class="p-0">
                        <a href="{{ route('home') }}"><img width="120" height="30"
                                src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>

                <hr class="m-2">

                <div class="card">
                    <div class="flex-parent">
                        <div class="input-flex-container">
                            <input type="radio" name="timeline-dot" data-description="1910" id="waiting">
                            <div class="dot-info" data-description="1910">
                                <span class="year">Waiting</span>
                            </div>
                            <input type="radio" name="timeline-dot" data-description="1920" id="progress2">
                            <div class="dot-info" data-description="1920">
                                <span class="year">Progress</span>
                            </div>
                            <input type="radio" name="timeline-dot" data-description="1930" id="sealkit">
                            <div class="dot-info" data-description="1930">
                                <span class="year">Order</span>
                            </div>
                            <input type="radio" name="timeline-dot" data-description="1940" id="trial">
                            <div class="dot-info" data-description="1940">
                                <span class="year">Trial</span>
                            </div>
                            <input type="radio" name="timeline-dot" data-description="1950" id="finish">
                            <div class="dot-info" data-description="1950">
                                <span class="year">Finish</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">No. Ticket</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="reg_sp"></p>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">PIC Repair</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="nama_pic"></p>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Item Name</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="item_name"></p>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Progress</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="progress"></p>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Repair Place</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="place_of_repair"></p>
                </div>

                <div class="divider m-0">
                    <div class="divider-text">Problem</div>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Problem</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="problem"></p>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Analisa</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="analisa"></p>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Action</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="action"></p>
                </div>


                <div class="divider m-0">
                    <div class="divider-text">Cost</div>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Cost</label>
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="price"></p>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/ui-apexchart.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#hideshow').on('click', function(event) {
                jQuery('#asu').toggle('hide');
            });
        });
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
                                x: '{{ $dt['id'] . ' ' . $dt['item_name'] }}',
                                y: [
                                    new Date('{{ $dt['plan_start_repair'] }}').getTime(),
                                    new Date('{{ $dt['plan_finish_repair'] }}').getTime()
                                ],
                                fillColor: '{{ $dt['fillcolor'] }}'
                            },
                        @endforeach

                    ]
                },

            ],
            chart: {
                height: ({{ $count }} * 40) + 100,
                type: 'rangeBar',
                offsetY: '15',
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        $('#asu').show(300);
                        $('#reg_sp').text(data[config.dataPointIndex].reg_sp);
                        $('#created_at').text(data[config.dataPointIndex].created_at);
                        $('#updated_at').text(data[config.dataPointIndex].updated_at);
                        $('#date').text(data[config.dataPointIndex].date);
                        $('#nama_pic').text(data[config.dataPointIndex].nama_pic);
                        $('#item_name').text(data[config.dataPointIndex].item_name);
                        $('#date').text(data[config.dataPointIndex].date);
                        $('#part_from').text(data[config.dataPointIndex].part_from);
                        $('#section').text(data[config.dataPointIndex].section);
                        $('#line').text(data[config.dataPointIndex].line);
                        $('#machine').text(data[config.dataPointIndex].machine);
                        $('#item_code').text(data[config.dataPointIndex].item_code);
                        $('#item_type').text(data[config.dataPointIndex].item_type);
                        $('#maker').text(data[config.dataPointIndex].maker);
                        $('#problem').text(data[config.dataPointIndex].problem);
                        $('#price').text(data[config.dataPointIndex].price);
                        $('#place_of_repair').text(data[config.dataPointIndex].place_of_repair);
                        $('#status_repair').text(data[config.dataPointIndex].status_repair);
                        $('#progress').text(data[config.dataPointIndex].progress);
                        $('#item_type').text(data[config.dataPointIndex].item_type);
                        $('#analisa').text(data[config.dataPointIndex].analisa);
                        $('#action').text(data[config.dataPointIndex].action);
                        $('#plan_start_repair').text(data[config.dataPointIndex].plan_start_repair);
                        $('#plan_finish_repair').text(data[config.dataPointIndex].plan_finish_repair);
                        $('#item_type').text(data[config.dataPointIndex].item_type);
                        if (data[config.dataPointIndex].progress == "Finish") {
                            $('#finish').prop("checked", true);
                        } else if (data[config.dataPointIndex].progress == "Trial") {
                            $('#trial').prop("checked", true);
                        } else if (data[config.dataPointIndex].progress == "Seal Kit") {
                            $('#sealkit').prop("checked", true);
                        } else if (data[config.dataPointIndex].progress == "Progress") {
                            $('#progress2').prop("checked", true);
                        } else {
                            $('#waiting').prop("checked", true);
                        }
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
        };

        var chart = new ApexCharts(document.querySelector("#gantt"), options);
        chart.render();
    </script>
@endsection
