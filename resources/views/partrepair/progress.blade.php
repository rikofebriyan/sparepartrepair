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
                        <a class="list-group-item list-group-item-action active" id="list-sunday-list" data-bs-toggle="list"
                            href="#list-sunday" role="tab">Option 1</a>
                        <a class="list-group-item list-group-item-action" id="list-monday-list" data-bs-toggle="list"
                            href="#list-monday" role="tab">Option 2</a>
                        <a class="list-group-item list-group-item-action" id="list-tuesday-list" data-bs-toggle="list"
                            href="#list-tuesday" role="tab">Option 3</a>
                        <a class="list-group-item list-group-item-action" id="list-4-list" data-bs-toggle="list"
                            href="#list-4" role="tab">Option 3</a>
                        <a class="list-group-item list-group-item-action" id="list-5-list" data-bs-toggle="list"
                            href="#list-5" role="tab">Option 3</a>
                    </div>
                    <div class="tab-content text-justify">
                        <div class="tab-pane fade show active" id="list-sunday" role="tabpanel"
                            aria-labelledby="list-sunday-list">
                            @include('partrepair.form1')
                        </div>
                        <div class="tab-pane fade" id="list-monday" role="tabpanel" aria-labelledby="list-monday-list">
                            @include('partrepair.form2')
                        </div>
                        <div class="tab-pane fade" id="list-tuesday" role="tabpanel" aria-labelledby="list-tuesday-list">
                            @include('partrepair.form3')
                        </div>
                        <div class="tab-pane fade" id="list-4" role="tabpanel" aria-labelledby="list-4-list">
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
                });
            }
        </script>
    @endsection
