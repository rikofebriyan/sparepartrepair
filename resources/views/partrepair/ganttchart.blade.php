@extends('layouts.app')

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
            {{-- <input type='button' id='hideshow' value='hide/show'> --}}
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
                    <p class="col-sm-9 align-items-center d-flex mb-0" id="created_at"></p>
                </div>

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
                                    new Date('{{ $dt['created_at'] }}').getTime(),
                                    new Date('{{ $dt['updated_at'] }}').getTime()
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
                                x: '{{ $dt['id'] . ' ' . $dt['item_name'] }}',
                                y: [new Date('{{ $dt['created_at'] }}').getTime(),
                                    new Date('{{ $dt['updated_at'] }}').getTime()
                                ]
                            },
                        @endforeach
                    ]
                }
            ],
            chart: {
                height: {{ $count }} * 60,
                type: 'rangeBar',
                offsetY: '15',
                events: {
                    dataPointSelection: function(event, chartContext, config) {
                        $('#asu').show(300);
                        // $("#asu").css({
                        //     "display": "block",
                        //     "transition": "width 1s",
                        // });
                        // console.log(config.w.globals.labels[config.dataPointIndex]);
                        // var x = console.log(config.w.globals.labels[config.dataPointIndex]);
                        // var y = console.log(config);
                        // console.log(data[config.dataPointIndex]);
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
@endsection
