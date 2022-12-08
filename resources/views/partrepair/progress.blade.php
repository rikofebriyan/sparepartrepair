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




        {{-- <div class="accordion" id="accordionExample">


            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        01. SPAREPART REQUEST FORM
                    </button>
                </h2>

                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col">
                                        <div class="p-3 border">

                                            <div class="mb-3 row">
                                                <label for="tanggal" class="col-sm-3 col-form-label">Create at</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control" id="tanggal"
                                                        value="{{ Carbon\Carbon::now() }}" required disabled>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="nama_pic" class="col-sm-3 col-form-label">nama_pic</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nama_pic"
                                                        name="nama_pic" value="{{ $modelrepair->nama_pic }}" required>
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label for="reg_sp" class="col-sm-3 col-form-label">reg_sp</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="reg_sp" name="reg_sp"
                                                        value="{{ $modelrepair->reg_sp }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="section" class="col-sm-3 col-form-label">section</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="section"
                                                        name="section" value="{{ $modelrepair->section }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="line" class="col-sm-3 col-form-label">Line</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="line"
                                                        name="line" value="{{ $modelrepair->line }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="machine" class="col-sm-3 col-form-label">machine</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="machine"
                                                        name="machine" value="{{ $modelrepair->machine }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="item_code" class="col-sm-3 col-form-label">item_code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="item_code"
                                                        name="item_code" value="{{ $modelrepair->item_code }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="item_name" class="col-sm-3 col-form-label">item_name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="item_name"
                                                        name="item_name" value="{{ $modelrepair->item_name }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="item_type" class="col-sm-3 col-form-label">item_type</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="item_type"
                                                        name="item_type" value="{{ $modelrepair->item_type }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row invisible">
                                                <label for="status_repair"
                                                    class="col-sm-3 col-form-label">status_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="status_repair"
                                                        name="status_repair" value="Waiting" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="p-3 border bg-light">

                                            <div class="mb-3 row">
                                                <label for="maker" class="col-sm-3 col-form-label">maker</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="maker"
                                                        name="maker" value="{{ $modelrepair->maker }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="serial_number"
                                                    class="col-sm-3 col-form-label">serial_number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="serial_number"
                                                        name="serial_number" value="{{ $modelrepair->serial_number }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="type_of_part"
                                                    class="col-sm-3 col-form-label">type_of_part</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="type_of_part"
                                                        name="type_of_part" value="{{ $modelrepair->type_of_part }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="price" class="col-sm-3 col-form-label">price</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="price"
                                                        name="price" value="{{ $modelrepair->price }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="stock_spare_part"
                                                    class="col-sm-3 col-form-label">stock_spare_part</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="stock_spare_part"
                                                        name="stock_spare_part"
                                                        value="{{ $modelrepair->stock_spare_part }}" required>
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label for="problem" class="col-sm-3 col-form-label">Problem</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="problem" name="problem" rows="3" required>{{ $modelrepair->problem }}</textarea>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                                            <a href="{{ route('partrepair.waitingtable.index') }}"
                                                class="btn btn-md btn-secondary">back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h3 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        02. SPAREPART REPAIR -> PROGRESS FORM
                    </button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <input type="hidden" name="form_input_id" id="form_input_id" value="">

                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col">
                                        <div class="p-3 border">

                                            <div class="mb-3 row">
                                                <label for="place_of_repair"
                                                    class="col-sm-3 col-form-label">place_of_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="place_of_repair"
                                                        name="place_of_repair" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="analisa" class="col-sm-3 col-form-label">analisa</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="analisa"
                                                        name="analisa" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="action" class="col-sm-3 col-form-label">action</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="action"
                                                        name="action" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="pic_repair" class="col-sm-3 col-form-label">pic_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="pic_repair"
                                                        name="pic_repair" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="plan_start_repair"
                                                    class="col-sm-3 col-form-label">plan_start_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="plan_start_repair"
                                                        name="plan_start_repair" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="plan_finish_repair"
                                                    class="col-sm-3 col-form-label">plan_finish_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="plan_finish_repair"
                                                        name="plan_finish_repair" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="actual_start_repair"
                                                    class="col-sm-3 col-form-label">actual_start_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="actual_start_repair"
                                                        name="actual_start_repair" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="actual_finish_repair"
                                                    class="col-sm-3 col-form-label">actual_finish_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="actual_finish_repair"
                                                        name="actual_finish_repair" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="total_time_repair"
                                                    class="col-sm-3 col-form-label">total_time_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="total_time_repair"
                                                        name="total_time_repair" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row invisible">
                                                <label for="status_repair"
                                                    class="col-sm-3 col-form-label">status_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="status_repair"
                                                        name="status_repair" value="Progress Admin" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row invisible">
                                                <label for="form_input_id"
                                                    class="col-sm-3 col-form-label">form_input_id</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="form_input_id"
                                                        name="form_input_id" value="{{ $modelrepair->id }}" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="p-3 border bg-light">

                                            <div class="mb-3 row">
                                                <label for="labour_cost"
                                                    class="col-sm-3 col-form-label">labour_cost</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="labour_cost"
                                                        name="labour_cost" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="judgement" class="col-sm-3 col-form-label">judgement</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="judgement"
                                                        name="judgement" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="subcont_name"
                                                    class="col-sm-3 col-form-label">subcont_name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="subcont_name"
                                                        name="subcont_name" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="quotation" class="col-sm-3 col-form-label">quotation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="quotation"
                                                        name="quotation" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="nomor_pp" class="col-sm-3 col-form-label">nomor_pp</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_pp"
                                                        name="nomor_pp" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="nomor_po" class="col-sm-3 col-form-label">nomor_po</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_po"
                                                        name="nomor_po" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="estimasi_selesai"
                                                    class="col-sm-3 col-form-label">estimasi_selesai</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="estimasi_selesai"
                                                        name="estimasi_selesai" value="" required>
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


            <div class="accordion-item">
                <h3 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        03. PLANNED REPAIR FORM
                    </button>
                </h3>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="HeadingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">


                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col">
                                        <div class="p-3 border">

                                            <div class="mb-3 row">
                                                <label for="form_progress_id"
                                                    class="col-sm-3 col-form-label">form_progress_id</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="form_progress_id"
                                                        name="form_progress_id" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="item_code" class="col-sm-3 col-form-label">item_code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="item_code"
                                                        name="item_code" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="item_name" class="col-sm-3 col-form-label">item_name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="item_name"
                                                        name="item_name" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="description"
                                                    class="col-sm-3 col-form-label">description</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="description"
                                                        name="description" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="maker" class="col-sm-3 col-form-label">maker</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="maker"
                                                        name="maker" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="qty" class="col-sm-3 col-form-label">qty</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="qty"
                                                        name="qty" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="price" class="col-sm-3 col-form-label">price</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="price"
                                                        name="price" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="total_price"
                                                    class="col-sm-3 col-form-label">total_price</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="total_price"
                                                        name="total_price" value="" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="p-3 border bg-light">

                                            <div class="mb-3 row">
                                                <label for="status_part"
                                                    class="col-sm-3 col-form-label">status_part</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="status_part"
                                                        name="status_part" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="quotation" class="col-sm-3 col-form-label">quotation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="quotation"
                                                        name="quotation" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="nomor_pp" class="col-sm-3 col-form-label">nomor_pp</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_pp"
                                                        name="nomor_pp" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="nomor_po" class="col-sm-3 col-form-label">nomor_po</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_po"
                                                        name="nomor_po" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="estimasi_kedatangan"
                                                    class="col-sm-3 col-form-label">estimasi_kedatangan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="estimasi_kedatangan"
                                                        name="estimasi_kedatangan" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="status_kedatangan"
                                                    class="col-sm-3 col-form-label">status_kedatangan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="status_kedatangan"
                                                        name="status_kedatangan" value="" required>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                                            <a href="{{ route('partrepair.progresspemakaian.index') }}"
                                                class="btn btn-md btn-secondary">back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{ Form::open(['route' => 'partrepair.progresstrial.store', 'method' => 'POST']) }}
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingFour">
                    <button class="accordion-button fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        04. TRIAL PART
                    </button>
                </h3>
                <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="HeadingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col">
                                        <div class="p-3 border">

                                            <div class="mb-3 row">
                                                <label for="form_progress_id"
                                                    class="col-sm-3 col-form-label">form_progress_id</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="form_progress_id"
                                                        name="form_progress_id" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="id_standard_pengecekan"
                                                    class="col-sm-3 col-form-label">id_standard_pengecekan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control"
                                                        id="id_standard_pengecekan" name="id_standard_pengecekan"
                                                        value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="standard_pengecekan"
                                                    class="col-sm-3 col-form-label">standard_pengecekan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="standard_pengecekan"
                                                        name="standard_pengecekan" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="actual_pengecekan"
                                                    class="col-sm-3 col-form-label">actual_pengecekan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="actual_pengecekan"
                                                        name="actual_pengecekan" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="judgement" class="col-sm-3 col-form-label">judgement</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="judgement"
                                                        name="judgement" value="" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="p-3 border bg-light">

                                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                                            <a href="{{ route('partrepair.progresstrial.index') }}"
                                                class="btn btn-md btn-secondary">back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            {{ Form::close() }} --}}
    @endsection
