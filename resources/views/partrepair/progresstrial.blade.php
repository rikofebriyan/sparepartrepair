@extends('layouts.app')


@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header py-2 my-0">
                <center>
                    <h4 class="card-title my-0">FORM SPARE PART REPAIR</h4>
                </center>
            </div>
            <div class="card-content">
                <div class="card-body py-2">
                    <div class="list-group list-group-horizontal-sm my-1 py-0 text-center" role="tablist">
                        <a class="list-group-item list-group-item-action" id="list-sunday-list" data-bs-toggle="list"
                            href="#list-sunday" role="tab">Request Form</a>
                        <a class="list-group-item list-group-item-action " id="list-monday-list" data-bs-toggle="list"
                            href="#list-monday" role="tab">Progress Form</a>
                        <a class="list-group-item list-group-item-action" id="list-tuesday-list" data-bs-toggle="list"
                            href="#list-tuesday" role="tab">Order Part Seal Kit</a>
                        <a class="list-group-item list-group-item-action  active" id="list-4-list" data-bs-toggle="list"
                            href="#list-4" role="tab">Trial</a>
                        <a class="list-group-item list-group-item-action" id="list-5-list" data-bs-toggle="list"
                            href="#list-5" role="tab">Finish Form</a>
                    </div>
                    <div class="tab-content text-justify">
                        <div class="tab-pane fade" id="list-sunday" role="tabpanel" aria-labelledby="list-sunday-list">
                            @include('partrepair.form1')
                        </div>
                        <div class="tab-pane fade" id="list-monday" role="tabpanel" aria-labelledby="list-monday-list">
                            @include('partrepair.form2edit')
                        </div>
                        <div class="tab-pane fade" id="list-tuesday" role="tabpanel" aria-labelledby="list-tuesday-list">
                            {{-- @include('partrepair.form3') --}}
                        </div>
                        <div class="tab-pane fade show active" id="list-4" role="tabpanel" aria-labelledby="list-4-list">
                            @include('partrepair.form4')
                        </div>
                        <div class="tab-pane fade" id="list-5" role="tabpanel" aria-labelledby="list-5-list">
                            @include('partrepair.form5')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script type="text/javascript">
            function isi_otomatis() {
                var item_name = $("#isiotomatis2").val();
                $.ajax({
                    url: '/ajax',
                    data: "item_name=" + item_name,
                    success: function(data) {
                        var json = data,
                            obj = JSON.parse(json);
                        $('#item_name2').val(obj.item_name);
                        $('#item_code2').val(obj.item_code);
                        $('#description2').val(obj.description);
                        $('#price2').val(obj.price);
                    }
                });
            }
        </script>
        {{-- 
        {{ $in = 1 }}
        @foreach ($in as $i) --}}
        <script>
            for (let i = 0; i < 10; i++) {
                $(document).ready(function() {
                    $('#actual' + i).change(function() {
                        var actual = Number($(this).val());
                        var actual2 = $(this).val();
                        var standard = Number($('#standard' + i).val());
                        var standard2 = $('#standard' + i).val();
                        if (actual2 == standard2) {
                            // alert("ok");
                            $('#judge' + i).val('OK');
                            $('#judgeok').show();
                        } else if (actual >= standard) {
                            $('#judge' + i).val('OK');
                            $('#judgeok').show();
                        } else
                            $('#judge' + i).val('NG');
                        $('#judgeok').hide();
                    });
                });
            }
        </script>

        {{-- {{ $i++ }}
        @endforeach --}}
        <script>
            $('#status_part2').change(function() {
                var val = $(this).val();
                if (val === "Not Ready") {
                    $('#notready').show();
                } else
                    $('#notready').hide();
            });
        </script>
        <script>
            // function funcChoice(x) {
            //     if (x == 0)
            //         $('#field3, #fieldsealkit, #fieldrepair').css('display', 'none');
            //     else
            //         $('#field3, #fieldsealkit, #fieldrepair').css('display', 'flex');
            //     return;
            // }

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
            $(document).ready(function() {
                $('#myTable').DataTable({
                    order: [
                        [0, 'desc']
                    ],
                    // scrollX: true,
                });
            });
        </script>

        <script>
        @endsection
