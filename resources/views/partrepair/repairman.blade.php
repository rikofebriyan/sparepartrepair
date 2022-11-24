@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="accordion" id="accordionPanelsStayOpenExample">

            {{-- START OF COLLAPSE ONE --}}

            <div class="accordion-item">
                <h3 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        <H4>
                            <b> SPAREPART REPAIR REQUEST FORM </b>
                        </H4>
                    </button>
                </h3>

                {{ Form::open(['route' => 'partrepair.progresstable.store', 'method' => 'POST']) }}
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">

                        {{-- form input --}}
                        <input type="hidden" name="id" id="id" value="">
                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col">
                                        <div class="p-3 border">


                                            <div class="mb-3 row">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nama" name="nama"
                                                        value="{{ $modelrepair->nama }}" required>
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label for="reg" class="col-sm-2 col-form-label">Reg / SP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="reg" name="reg"
                                                        value="{{ $modelrepair->reg }}" required>

                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="machine_name" class="col-sm-2 col-form-label">Machine
                                                    Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="machine_name"
                                                        name="machine_name" value="{{ $modelrepair->machine_name }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="line_name" class="col-sm-2 col-form-label">Line Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="line_name"
                                                        name="line_name" value="{{ $modelrepair->line_name }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="part_name" class="col-sm-2 col-form-label">Part Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="part_name"
                                                        name="part_name" value="{{ $modelrepair->part_name }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="part_type" class="col-sm-2 col-form-label">Part Type</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="part_type"
                                                        name="part_type" value="{{ $modelrepair->part_type }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="serial_no" class="col-sm-2 col-form-label">Serial No</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="serial_no"
                                                        name="serial_no" value="{{ $modelrepair->serial_no }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="maker" class="col-sm-2 col-form-label">Maker</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="maker" name="maker"
                                                        value="{{ $modelrepair->maker }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row invisible">
                                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="status"
                                                        name="status" value="{{ $modelrepair->status }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="p-3 border bg-light">

                                            <div class="mb-3 row">
                                                <label for="problem" class="col-sm-2 col-form-label">Problem</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" id="problem" name="problem" rows="3" required>{{ $modelrepair->problem }}</textarea>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <center>
                                                    <h3>DETAIL STANDARD</h3>
                                                </center>
                                            </div>
                                            <div class="row">
                                                <div class="col">

                                                    {{-- DETAIL STANDARD KIRI 1 --}}
                                                    <div class="mb-3 row">
                                                        <label for="ampere"
                                                            class="col-sm-6 col-form-label">Ampere</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="ampere"
                                                                name="ampere" value="{{ $modelrepair->ampere }}">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KIRI 2 --}}
                                                    <div
                                                        class="mb-3
                                                                    row">
                                                        <label for="meger"
                                                            class="col-sm-6 col-form-label">Meger</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="meger"
                                                                name="meger" value="{{ $modelrepair->meger }}">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KIRI 3 --}}
                                                    <div
                                                        class="mb-3
                                                                        row">
                                                        <label for="pressure"
                                                            class="col-sm-6 col-form-label">Pressure</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="pressure"
                                                                name="pressure" value="{{ $modelrepair->pressure }}">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KIRI 4 --}}
                                                    <div class="mb-3 row">
                                                        <label for="flow" class="col-sm-6 col-form-label">Flow</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="flow"
                                                                name="flow" value="{{ $modelrepair->flow }}">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KIRI 5 --}}
                                                    <div
                                                        class="mb-3
                                                                                row">
                                                        <label for="temperature"
                                                            class="col-sm-6 col-form-label">Temperature</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="temperature"
                                                                name="temperature"
                                                                value="{{ $modelrepair->temperature }}">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KIRI 6 --}}
                                                    <div class="mb-3 row">
                                                        <label for="rpm" class="col-sm-6 col-form-label">Rpm</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="rpm"
                                                                name="rpm" value="{{ $modelrepair->rpm }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">

                                                    {{-- DETAIL STANDARD KANAN 1 --}}
                                                    <div class="mb-3 row">
                                                        <label for="ohm" class="col-sm-6 col-form-label">Ohm</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="ohm"
                                                                name="ohm">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KANAN 2 --}}
                                                    <div class="mb-3 row">
                                                        <label for="volt" class="col-sm-6 col-form-label">Volt</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="volt"
                                                                name="volt">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KANAN 3 --}}
                                                    <div class="mb-3 row">
                                                        <label for="flatness"
                                                            class="col-sm-6 col-form-label">Flatness</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="flatness"
                                                                name="flatness">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KANAN 4 --}}
                                                    <div class="mb-3 row">
                                                        <label for="gather"
                                                            class="col-sm-6 col-form-label">Gather</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="gather"
                                                                name="gather">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KANAN 5 --}}
                                                    <div class="mb-3 row">
                                                        <label for="load" class="col-sm-6 col-form-label">Load</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="load"
                                                                name="load">
                                                        </div>
                                                    </div>

                                                    {{-- DETAIL STANDARD KANAN 6 --}}
                                                    <div class="mb-3 row">
                                                        <label for="runout"
                                                            class="col-sm-6 col-form-label">Runout</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="runout">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                                            <a href="{{ route('partrepair.progresstable.index') }}"
                                                class="btn btn-md btn-secondary">back</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- END OF COLLAPSE ONE --}}
            {{-- START OF COLLAPSE TWO --}}

            <div class="accordion-item">
                <h3 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseTwo">
                        <H4>
                            <b> SPAREPART REPAIR -> PROGRESS FORM (ADMIN) </b>
                        </H4>
                    </button>
                </h3>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">

                        {{-- form input --}}
                        <input type="hidden" name="id" id="id" value="">
                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col">
                                        <div class="p-3 border">

                                            <div class="mb-3 row">
                                                <label for="sparepart_ETA" class="col-sm-2 col-form-label">Spare
                                                    Part
                                                    ETA</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="sparepart_ETA"
                                                        name="sparepart_ETA" value="">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="type_of_part" class="col-sm-2 col-form-label">Type of
                                                    Part</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="type_of_part"
                                                        name="type_of_part" value="">
                                                </div>
                                            </div>

                                            <div class="mb-3 row invisible">
                                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="status"
                                                        name="status" value="progressed_admin" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="p-3 border bg-light">

                                            <div class="mb-3 row">
                                                <label for="part_price" class="col-sm-2 col-form-label">
                                                    Part Price</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control number" id="part_price"
                                                        name="part_price" value="">
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="stock_sparepart" class="col-sm-2 col-form-label">
                                                    Stock Spare Part</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control number"
                                                        id="stock_sparepart" name="stock_sparepart" value="">
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                                            <a href="#" class="btn btn-md btn-secondary">back</a>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}

            {{-- END OF COLLAPSE TWO --}}
            {{-- START OF COLLAPSE THREE --}}




            <!-- fungsi javascript untuk menampilkan form dinamis  -->
            <!-- penjelasan : saat tombol add-more ditekan, maka akan memunculkan div dengan class copy -->
            <script type="module">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
        @endsection
