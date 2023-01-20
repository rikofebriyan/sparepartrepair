@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="card border m-0">
            <div class="card-header py-2">
                <center>
                    <h3 class="card-title mb-0 p-0">FORM SPARE PART REPAIR</h3>
                </center>
            </div>
            <div class="card-content">
                <div class="card-body py-2">
                    <div class="list-group list-group-horizontal-sm my-1 py-0 text-center" role="tablist">
                        <a class="list-group-item list-group-item-action @if ($waitingrepair->progress == 'Waiting') active @endif"
                            id="list-sunday-list" data-bs-toggle="list" href="#list-sunday" role="tab">Repair Ticket</a>
                        <a class="list-group-item list-group-item-action @if ($waitingrepair->progress == 'On Progress') active @endif"
                            id="list-monday-list" data-bs-toggle="list" href="#list-monday" role="tab">Progress
                            Repair</a>
                        <a class="list-group-item list-group-item-action @if ($waitingrepair->progress == 'Seal Kit') active @endif @if ($progressrepair2->judgement == 'Scrap' || $progressrepair2->place_of_repair == 'Trade In') bg-secondary text-white @endif"
                            id="list-tuesday-list" data-bs-toggle="list" href="#list-tuesday" role="tab"
                            @if ($progressrepair2->judgement == 'Scrap' || $progressrepair2->place_of_repair == 'Trade In') disabled @endif>Seal Kit</a>
                        <a class="list-group-item list-group-item-action @if ($waitingrepair->progress == 'Trial') active @endif @if ($progressrepair2->judgement == 'Scrap' || $progressrepair2->place_of_repair == 'Trade In') bg-secondary text-white @endif"
                            id="list-4-list" data-bs-toggle="list" href="#list-4" role="tab"
                            @if ($progressrepair2->judgement == 'Scrap' || $progressrepair2->place_of_repair == 'Trade In') disabled @endif>Trial</a>
                        <a class="list-group-item list-group-item-action @if ($waitingrepair->progress == 'Finish') active @endif @if ($progressrepair2->judgement == 'Scrap') bg-secondary text-white @endif"
                            id="list-5-list" data-bs-toggle="list" href="#list-5" role="tab"
                            @if ($progressrepair2->judgement == 'Scrap') disabled @endif>Finish Repair</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content text-justify py-2">
            <div class="tab-pane fade @if ($waitingrepair->progress == 'Waiting') show active @endif" id="list-sunday"
                role="tabpanel" aria-labelledby="list-sunday-list">
                @include('partrepair.form1')
            </div>
            <div class="tab-pane fade @if ($waitingrepair->progress == 'On Progress') show active @endif" id="list-monday"
                role="tabpanel" aria-labelledby="list-monday-list">
                @include('partrepair.form2')
            </div>
            <div class="tab-pane fade @if ($waitingrepair->progress == 'Seal Kit') show active @endif" id="list-tuesday"
                role="tabpanel" aria-labelledby="list-tuesday-list">
                @include('partrepair.form3')
            </div>
            <div class="tab-pane fade @if ($waitingrepair->progress == 'Trial') show active @endif" id="list-4" role="tabpanel"
                aria-labelledby="list-4-list">
                @include('partrepair.form4')
            </div>
            <div class="tab-pane fade @if ($waitingrepair->progress == 'Finish') show active @endif" id="list-5" role="tabpanel"
                aria-labelledby="list-5-list">
                @include('partrepair.form5')
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function isi_otomatis() {
            var labour_id = $("#isiotomatis").val();
            var total_time_repair = $('#selisih').val()
            $.ajax({
                type: 'GET',
                url: '/getlabour',
                data: "labour_id=" + labour_id,
                dataType: 'JSON',
                success: function(data) {
                    if (total_time_repair > 0 && data > 0) {
                        labourCost = total_time_repair * data

                        $('#labour_cost').val(labourCost);
                    }
                }
            });
        }

        function isi_otomatis_part() {
            var item_name = $("#isiotomatis2").val();
            $.ajax({
                type: 'GET',
                url: '/ajax/?item_name=' + item_name,
                dataType: 'JSON',
                success: function(data) {
                    $('#item_name2').val(data.item_name);
                    $('#item_code2').val(data.item_code);
                    $('#description2').val(data.description);
                    $('#price2').val(data.price);
                }
            });
        }

        function isi_otomatis_part2() {
            var item_name = $("#isiotomatis3").val();
            $.ajax({
                type: 'GET',
                url: '/ajax/?item_name=' + item_name,
                dataType: 'JSON',
                success: function(data) {
                    $('#item_name3').val(data.item_name);
                    $('#item_code3').val(data.item_code);
                    $('#description3').val(data.description);
                    $('#price3').val(data.price);
                }
            });
        }



        function isi_otomatis_subcont() {
            $.ajax({
                type: 'GET',
                url: '/getSubcont',
                dataType: 'JSON',
                success: function(data) {
                    $('#subcont_name').empty()
                    $('#subcont_name').append(`<option value="" selected>Pilih ...</option>`)
                    $.each(data, function(id, value) {
                        $('#subcont_name').append(
                            `<option value="${value.id}">${value.name}</option>`)
                    });
                }
            });
        }
    </script>

    <script>
        $(function() {
            $("#datepicker2").datepicker();
            $("#datepicker").datepicker();
        });

        window.onload = function() {
            $('#datepicker2').on('change', function() {
                var dob = new Date(datepicker.value);
                var today = new Date(datepicker2.value);
                var age = ((today - dob) / (60 * 60 * 1000)).toFixed(1);
                $('#selisih').val(age);

                isi_otomatis()
            });
        }
    </script>


    <script>
        $('#showsubcont').change(function() {
            var val = $(this).val();
            if (val === "Subcont") {
                $('#subcont').show()
                $('#inHouse').hide()

                $('#plan_start_repair').val('')
                $('#plan_finish_repair').val('')
                $('#datepicker').val('')
                $('#datepicker2').val('')
                $('#selisih').val('')
                $('#labour_cost').val('')
            } else if (val === "Trade In") {
                $('#subcont').show()
                $('#inHouse').hide()

                $('#plan_start_repair').val('')
                $('#plan_finish_repair').val('')
                $('#datepicker').val('')
                $('#datepicker2').val('')
                $('#selisih').val('')
                $('#labour_cost').val('')
            } else {
                $('#subcont').hide()
                $('#inHouse').show()

                $('#quotation').val('')
                $('#subcont_cost').val('')
                $('#lead_time').val('')
                $('#nomor_pp').val('')
                $('#nomor_po').val('')
                $('#plan_start_repair_subcont').val('')
                $('#plan_finish_repair_subcont').val('')
                $('#actual_start_repair_subcont').val('')
                $('#actual_finish_repair_subcont').val('')

                $('#timePeriod').empty()
                $('#timePeriod').append(`<option value="" selected>Pilih ...</option>`)
                $('#timePeriod').append(`<option value="Week">Week</option>`)
                $('#timePeriod').append(`<option value="Month">Month</option>`)

                isi_otomatis_subcont()
            }

        });
    </script>

    <script>
        $('#price3, #qty3').change(function() {
            var price3 = parseFloat($('#price3').val()) || 0;
            var qty3 = parseFloat($('#qty3').val()) || 0;
            $('#total_price').val(price3 * qty3);
        });
        $('#price3, #qty3').keyup(function() {
            var price3 = parseFloat($('#price3').val()) || 0;
            var qty3 = parseFloat($('#qty3').val()) || 0;
            $('#total_price2').val(price3 * qty3);
        });
    </script>

    <script>
        $('#price2, #qty2').change(function() {
            var price2 = parseFloat($('#price2').val()) || 0;
            var qty2 = parseFloat($('#qty2').val()) || 0;
            $('#total_price').val(price2 * qty2);
        });
        $('#price2, #qty2').keyup(function() {
            var price2 = parseFloat($('#price2').val()) || 0;
            var qty2 = parseFloat($('#qty2').val()) || 0;
            $('#total_price').val(price2 * qty2);
        });
    </script>

    @if ($message = Session::get('success'))
        <script>
            Toastify({
                text: "{{ $message }}",
                duration: 2500,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#4fbe87",
            }).showToast()
        </script>
    @endif


    <script>
        @foreach ($join as $joi)
            $('#actual_pengecekan{{ $joi->id }}').on('input', function() {
                var actual = $(this).val()
                var standardMin = '{{ $joi->standard_pengecekan_min }}'
                var standardMax = '{{ $joi->standard_pengecekan_max }}'
                var operation = '{{ $joi->operation }}'

                if (operation == 'Less Than') {
                    if (actual < standardMax) {
                        $('#judgement{{ $joi->id }}').val('OK')
                    } else {
                        $('#judgement{{ $joi->id }}').val('NG')
                    }

                    if (actual == '') {
                        $('#judgement{{ $joi->id }}').val('')
                    }

                } else if (operation == 'Greater Than') {
                    if (actual > standardMin) {
                        $('#judgement{{ $joi->id }}').val('OK')
                    } else {
                        $('#judgement{{ $joi->id }}').val('NG')
                    }

                    if (actual == '') {
                        $('#judgement{{ $joi->id }}').val('')
                    }

                } else if (operation == 'Between') {
                    if (actual > standardMin && actual < standardMax) {
                        $('#judgement{{ $joi->id }}').val('OK')
                    } else {
                        $('#judgement{{ $joi->id }}').val('NG')
                    }

                    if (actual == '') {
                        $('#judgement{{ $joi->id }}').val('')
                    }

                } else if (operation == 'Equal') {
                    if (actual == standardMin) {
                        $('#judgement{{ $joi->id }}').val('OK')
                    } else {
                        $('#judgement{{ $joi->id }}').val('NG')
                    }

                    if (actual == '') {
                        $('#judgement{{ $joi->id }}').val('')
                    }

                } else {
                    alert('Operation Miss')
                    $('#judgement{{ $joi->id }}').val('')

                }

            });
        @endforeach
    </script>

    <script>
        $(document).ready(function() {
            $('#operation').on('change', function() {
                var operation = $('#operation option:selected').val()

                if (operation == 'Between') {
                    $('#standard_pengecekan_min_div').show()
                    $('#standard_pengecekan_max_div').show()
                } else if (operation == 'Less Than') {
                    $('#standard_pengecekan_min_div').hide()
                    $('#standard_pengecekan_max_div').show()
                } else if (operation == 'Greater Than') {
                    $('#standard_pengecekan_min_div').show()
                    $('#standard_pengecekan_max_div').hide()
                } else if (operation == 'Equal') {
                    $('#standard_pengecekan_min_div').show()
                    $('#standard_pengecekan_max_div').hide()
                } else {
                    $('#standard_pengecekan_min_div').hide()
                    $('#standard_pengecekan_max_div').hide()
                }
            });

            function asuasu() {
                alert('ok');
            }


        });

        $(document).ready(function() {
            $('#ya').click(function() {
                $('#field3').css('display', 'flex');
                $('#fieldrepair').addClass("d-none");
                $('#fieldsealkit').removeClass("disabled");
            });
        });

        $(document).ready(function() {
            $('#tidak').click(function() {
                $('#field3').css('display', 'none');
                $('#fieldrepair').removeClass("d-none");
                $('#fieldsealkit').addClass("disabled");
            });
        });
    </script>

    <script>
        $('#status_partbaru').change(function() {
            var val = $(this).val();
            if (val === "Not Ready") {
                $('#notready').show();
            } else
                $('#notready').hide();
        });
    </script>

    <script>
        $('#judgement_scrap').change(function() {
            var val = $(this).val();
            if (val === "Scrap") {
                $('#scrap').show(),
                    $('#saveit').hide()
            } else
                $('#scrap').hide(),
                $('#saveit').show()
        });
    </script>

    <script>
        function categorycodeajax() {
            var category = $("#categorycodejs").val();
            $.ajax({
                type: 'GET',
                url: '/getcategory?category=' + category,
                // dataType: 'JSON',
                success: function(data) {
                    console.log(data);
                    if (data.number == undefined) {
                        var code = 0;
                    } else {
                        var code = data.number;
                    };

                    x = (parseInt(code) + 1);
                    realcode = x.toString().padStart(3, '0');
                    $('#code_part_repair2').val(category + realcode);
                    $('#number').val(realcode);
                }
            });
        }
    </script>
@endsection
