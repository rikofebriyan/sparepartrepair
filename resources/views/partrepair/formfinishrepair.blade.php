@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="accordion" id="accordionExample">

            {{-- START OF COLLAPSE ONE --}}

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        {{-- 01. SPAREPART REQUEST FORM --}}
                        01. TICKET
                    </button>
                </h2>

                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        {{-- <div class="container-fluid justify-content-center py-0">
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
                                                    <input type="text" class="form-control" id="section" name="section"
                                                        value="{{ $modelrepair->section }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="line" class="col-sm-3 col-form-label">Line</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="line" name="line"
                                                        value="{{ $modelrepair->line }}" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="machine" class="col-sm-3 col-form-label">machine</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="machine" name="machine"
                                                        value="{{ $modelrepair->machine }}" required>
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
                        </div> --}}
                        <div class="container-fluid">
                            {{ Form::open(['route' => 'partrepair.waitingtable.store', 'method' => 'POST']) }}
                            <div class="container-fluid justify-content-center py-0">
                                <div class="container-fluid">
                                    <div class="row gx-3">
                                        <div class="col">
                                            <div class="p-3 border">

                                                <div class="mb-3 row">
                                                    <label for="tanggal" class="col-sm-3 col-form-label">Date
                                                        Created</label>
                                                    <div class="col-sm-9">
                                                        <input type="datetime-local" class="form-control" id="tanggal"
                                                            name="tanggal" required>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="parts_from" class="col-sm-3 col-form-label">Parts
                                                        From</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" id="parts_from" name="parts_from"
                                                            required>
                                                            <option selected disabled>Pilih ...</option>
                                                            <option value="1">New</option>
                                                            <option value="2">Repair</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="code_part_repair" class="col-sm-3 col-form-label">Code Part
                                                        Repair</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control mb-3"
                                                            id="code_part_repair" name="code_part_repair"
                                                            placeholder="Input Kode Part Repair" required>

                                                        <div class="input-group">
                                                            <input type="text" class="form-control bg-light"
                                                                id="number_of_repair" name="number_of_repair"
                                                                placeholder="Number of Repair" required readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="item_code" class="col-sm-3 col-form-label">Spare
                                                        Part</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select mb-3 choices" id="item_code"
                                                            name="item_code" required>
                                                            <option selected disabled>Pilih Spare Part ...</option>
                                                            <option value="1">Cylinder</option>
                                                            <option value="2">Motor</option>
                                                            <option value="3">Pump</option>
                                                            <option value="4">Blower</option>
                                                        </select>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control bg-light"
                                                                id="item_code" name="item_code" placeholder="Item Code"
                                                                required readonly>
                                                            <input type="text" class="form-control bg-light"
                                                                id="item_name" name="item_name" placeholder="Item Name"
                                                                required readonly>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control bg-light"
                                                                id="item_type" name="item_type" placeholder="Item Type"
                                                                required readonly>
                                                        </div>

                                                        <div class="input-group">
                                                            <input type="text" class="form-control bg-light"
                                                                id="price" name="price" placeholder="Price" required
                                                                readonly>
                                                            <input type="text" class="form-control bg-light"
                                                                id="stock_spare_part" name="stock_spare_part"
                                                                placeholder="Stock" required readonly>
                                                        </div>

                                                        <div class="input-group">
                                                            <div class="col-6">
                                                                <select class="form-control choices" id="maker"
                                                                    name="maker" required>
                                                                    <option selected disabled>Maker ...</option>
                                                                    <option value="1">SMC</option>
                                                                    <option value="2">IAI</option>
                                                                    <option value="3">CKD</option>
                                                                    <option value="4">Fanuc</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <select class="form-control choices" id="type_of_part"
                                                                    name="type_of_part" required>
                                                                    <option selected disabled>Type Of Part ...</option>
                                                                    <option value="1">Mechanic</option>
                                                                    <option value="2">Hydraulic</option>
                                                                    <option value="3">Pneumatic</option>
                                                                    <option value="4">Electric</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mb-3 row">
                                                    <label for="serial_number" class="col-sm-3 col-form-label">Serial
                                                        Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="serial_number"
                                                            name="serial_number" placeholder="Input Serial Number"
                                                            required>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="problem" class="col-sm-3 col-form-label">Problem</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control" id="problem" name="problem" rows="4" placeholder="Input Detail Problem"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="p-3 border">
                                                <div class="mb-3 row">
                                                    <label for="section" class="col-sm-3 col-form-label">Section</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" id="section" name="section"
                                                            required>
                                                            <option selected disabled>Pilih ...</option>
                                                            <option value="1">Die Casting</option>
                                                            <option value="2">Machining</option>
                                                            <option value="3">Piston</option>
                                                            <option value="4">Shaft Swash</option>
                                                            <option value="5">Mg. Clutch</option>
                                                            <option value="6">Assembling</option>
                                                            <option value="7">With Clutch</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="line" class="col-sm-3 col-form-label">Line</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" id="line" name="line"
                                                            required>
                                                            <option selected disabled>Pilih ...</option>
                                                            <option value="1">Die Casting Line 7</option>
                                                            <option value="2">Cylinder Line 3</option>
                                                            <option value="3">Piston Line 1</option>
                                                            <option value="4">Shaft Swash Assy</option>
                                                            <option value="5">Hub Line 1</option>
                                                            <option value="6">Assembling Line 2</option>
                                                            <option value="7">With Clutch Line 2</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="machine" class="col-sm-3 col-form-label">Machine</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-select" id="machine" name="machine"
                                                            required>
                                                            <option selected disabled>Pilih ...</option>
                                                            <option value="1">DCM 7</option>
                                                            <option value="2">FCY10</option>
                                                            <option value="3">OP10 Centering</option>
                                                            <option value="4">Shaft Swash Assy #1</option>
                                                            <option value="5">Shigiya 4</option>
                                                            <option value="6">Helium Leak Test</option>
                                                            <option value="7">Gap Check</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="status_repair" class="col-sm-3 col-form-label">Status
                                                        Repair</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="status_repair"
                                                            name="status_repair" required>
                                                            <option selected disabled>Pilih ...</option>
                                                            <option value="1">Normal</option>
                                                            <option value="2">Urgent</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="nama_pic" class="col-sm-3 col-form-label">PIC User</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" id="nama_pic" name="nama_pic"
                                                            required>
                                                            <option selected disabled>Pilih ...</option>
                                                            <option value="1">Riko</option>
                                                            <option value="2">Febriyan</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="reg_sp" class="col-sm-3 col-form-label">Ticket
                                                        Number</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control bg-light"
                                                            id="reg_sp" name="reg_sp" required readonly>
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
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- END OF COLLAPSE ONE --}}
            {{-- START OF COLLAPSE TWO --}}

            <div class="accordion-item">
                <h3 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        02. ON PROGRESS REPAIR
                    </button>
                </h3>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        {{-- form input --}}
                        <input type="hidden" name="form_input_id" id="form_input_id" value="">

                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col">
                                        <div class="p-3 border">

                                            <div class="mb-3 row">
                                                <label for="place_of_repair" class="col-sm-3 col-form-label">Place
                                                    Repair</label>
                                                <div class="col-sm-9">
                                                    {{-- <input type="text" class="form-control" id="place_of_repair"
                                                        name="place_of_repair" value="" required> --}}
                                                    <select class="form-select choices" id="place_of_repair"
                                                        name="place_of_repair" required>
                                                        <option selected disabled>Pilih ...</option>
                                                        <option value="1">In House</option>
                                                        <option value="2">In Subcont</option>
                                                        <option value="3">Trade In</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="analisa" class="col-sm-3 col-form-label">Analisa</label>
                                                <div class="col-sm-9">
                                                    {{-- <input type="text" class="form-control" id="analisa"
                                                        name="analisa" value="" required> --}}
                                                    <textarea class="form-control" id="analisa" name="analisa" rows="3" placeholder="Input Analisa" required></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="action" class="col-sm-3 col-form-label">Action</label>
                                                <div class="col-sm-9">
                                                    {{-- <input type="text" class="form-control" id="action"
                                                        name="action" value="" required> --}}
                                                    <textarea class="form-control" id="action" name="action" rows="3" placeholder="Input Analisa" required></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="judgement" class="col-sm-3 col-form-label">Judgement</label>
                                                <div class="col-sm-9">
                                                    {{-- <input type="text" class="form-control" id="judgement"
                                                        name="judgement" value="" required> --}}
                                                    <select class="form-select choices" id="judgement" name="judgement"
                                                        required>
                                                        <option selected disabled>Pilih ...</option>
                                                        <option value="1">Continue Repair</option>
                                                        <option value="2">Scrap</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="pic_repair" class="col-sm-3 col-form-label">PIC Repair</label>
                                                <div class="col-sm-9">
                                                    {{-- <input type="text" class="form-control" id="pic_repair"
                                                        name="pic_repair" value="" required> --}}
                                                    <select class="form-select choices" id="pic_repair" name="pic_repair"
                                                        required>
                                                        <option selected disabled>Pilih ...</option>
                                                        <option value="1">Riko</option>
                                                        <option value="2">Febriyan</option>
                                                        <option value="3">Omov</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="plan_start_repair" class="col-sm-3 col-form-label">Plan Start
                                                    Repair</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control"
                                                        id="plan_start_repair" name="plan_start_repair" value=""
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="plan_finish_repair" class="col-sm-3 col-form-label">Plan
                                                    Finish Repair</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control"
                                                        id="plan_finish_repair" name="plan_finish_repair" value=""
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="actual_start_repair" class="col-sm-3 col-form-label">Actual
                                                    Start Repair</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control"
                                                        id="actual_start_repair" name="actual_start_repair"
                                                        value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="actual_finish_repair" class="col-sm-3 col-form-label">Actual
                                                    Finish Repair</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control"
                                                        id="actual_finish_repair" name="actual_finish_repair"
                                                        value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="total_time_repair" class="col-sm-3 col-form-label">Total Time
                                                    Repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control bg-light"
                                                        id="total_time_repair" name="total_time_repair" value=""
                                                        required readonly>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="labour_cost" class="col-sm-3 col-form-label">Labour
                                                    Cost</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control bg-light" id="labour_cost"
                                                        name="labour_cost" value="" required readonly>
                                                </div>
                                            </div>

                                            {{-- <div class="mb-3 row invisible">
                                                <label for="status_repair"
                                                    class="col-sm-3 col-form-label">status_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="status_repair"
                                                        name="status_repair" value="Progress Admin" required>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="mb-3 row invisible">
                                                <label for="form_input_id"
                                                    class="col-sm-3 col-form-label">form_input_id</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="form_input_id"
                                                        name="form_input_id" value="{{ $modelrepair->id }}" required>
                                                </div>
                                            </div> --}}


                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="p-3 border bg-light">

                                            {{-- <div class="mb-3 row">
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
                                            </div> --}}

                                            <div class="mb-3 row">
                                                <label for="subcont_name" class="col-sm-3 col-form-label">Subcont
                                                    Name</label>
                                                <div class="col-sm-9">
                                                    {{-- <input type="text" class="form-control" id="subcont_name"
                                                        name="subcont_name" value="" required> --}}
                                                    <select class="form-select choices" id="subcont_name"
                                                        name="subcont_name" required>
                                                        <option selected disabled>Pilih ...</option>
                                                        <option value="1">PTS</option>
                                                        <option value="2">Yuasa</option>
                                                        <option value="3">Minezawa</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="quotation" class="col-sm-3 col-form-label">Quotation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="quotation"
                                                        name="quotation" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="nomor_pp" class="col-sm-3 col-form-label">Nomor PP</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_pp"
                                                        name="nomor_pp" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="nomor_po" class="col-sm-3 col-form-label">Nomor PO</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomor_po"
                                                        name="nomor_po" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="estimasi_selesai" class="col-sm-3 col-form-label">Estimasi
                                                    Selesai</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control"
                                                        id="estimasi_selesai" name="estimasi_selesai" value=""
                                                        required>
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

            {{-- END OF COLLAPSE TWO --}}
            {{-- START OF COLLAPSE THREE --}}

            <div class="accordion-item">
                <h3 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        03. PREPARATION SEAL KIT
                    </button>
                </h3>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="HeadingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        {{-- form input --}}

                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="mb-3">
                                    <button class="btn btn-primary">Add Part</button>
                                </div>
                                <table id="myTable" class="table table-striped nowrap overflow-auto display">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item Code</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Maker</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Status Part</th>
                                            <th scope="col">Quotation</th>
                                            <th scope="col">Nomor PP</th>
                                            <th scope="col">Nomor PO</th>
                                            <th scope="col">Estimasi Kedatangan</th>
                                            <th scope="col">Status Kedatangan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 5; $i++)
                                            <tr>
                                                <td>RE202211300001</td>
                                                <td>Seal Kit</td>
                                                <td>CDM2B32-PS01</td>
                                                <td>SMC</td>
                                                <td>1 pcs</td>
                                                <td>Rp 3.000.000</td>
                                                <td>Rp 3.000.000</td>
                                                <td>Not Ready</td>
                                                <td>123456789-Quo</td>
                                                <td>T4720-HS0001</td>
                                                <td>50100875</td>
                                                <td>30 Nov 2022</td>
                                                <td>
                                                    <a class="rounded-pill bg-secondary text-dark text-center px-2">Belum
                                                        Datang</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success"
                                                        href="{{ route('partrepair.progresstrial.show', '2') }}">Edit</a>
                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.waitingtable.destroy', '2'], 'style' => 'display:inline']) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                {{-- <div class="row gx-3">
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
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- END OF COLLAPSE THREE --}}
            {{-- START OF COLLAPSE FOUR --}}

            <div class="accordion-item">
                <h3 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        04. TRIAL PART
                    </button>
                </h3>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="HeadingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="mb-3">
                                    <button class="btn btn-primary">Add item Pengecekan</button>
                                </div>
                                <table id="myTable" class="table table-striped nowrap overflow-auto display">
                                    <thead>
                                        <tr>
                                            <th scope="col">Item Pengecekan</th>
                                            <th scope="col">Standard</th>
                                            <th scope="col">Actual</th>
                                            <th scope="col">Judgement</th>
                                            <th scope="col" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 5; $i++)
                                            <tr>
                                                <td>Ampere</td>
                                                <td>5 A</td>
                                                <td>3 A</td>
                                                <td>
                                                    <a class="rounded-pill bg-success text-dark text-center px-2">Good</a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success"
                                                        href="{{ route('partrepair.progresstrial.show', '2') }}">Edit</a>
                                                    {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.waitingtable.destroy', '2'], 'style' => 'display:inline']) }}
                                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                {{-- <div class="row gx-3">
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
                                </div> --}}
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            {{-- END OF COLLAPSE THREE --}}
            {{-- START OF COLLAPSE FOUR --}}

            {{ Form::open(['route' => 'partrepair.finishrepair.store', 'method' => 'POST']) }}
            <div class="accordion-item">
                <h3 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        05. FORM FINISH REPAIR
                    </button>
                </h3>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="HeadingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">

                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col-6">
                                        <div class="p-3 border">

                                            {{-- <div class="mb-3 row">
                                                <label for="form_input_id"
                                                    class="col-sm-3 col-form-label">form_input_id</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="form_input_id"
                                                        name="form_input_id" value="" required>
                                                </div>
                                            </div> --}}

                                            {{-- <div class="mb-3 row">
                                                <label for="judgement" class="col-sm-3 col-form-label">judgement</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="judgement"
                                                        name="judgement" value="" required>
                                                </div>
                                            </div> --}}

                                            <div class="mb-3 row">
                                                <label for="no_code_repair" class="col-sm-3 col-form-label">Code Part
                                                    Repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="no_code_repair"
                                                        name="no_code_repair" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="delivery_date" class="col-sm-3 col-form-label">Delivery
                                                    Date</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control" id="delivery_date"
                                                        name="delivery_date" value="" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="pic_repair" class="col-sm-3 col-form-label">PIC
                                                    Delivery</label>
                                                <div class="col-sm-9">
                                                    {{-- <input type="text" class="form-control" id="pic_repair"
                                                        name="pic_repair" value="" required> --}}
                                                    <select class="form-select choices" id="pic_repair" name="pic_repair"
                                                        required>
                                                        <option selected disabled>Pilih ...</option>
                                                        <option value="1">Riko</option>
                                                        <option value="2">Febriyan</option>
                                                        <option value="3">Omov</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <div class="p-3">
                                                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                                                    <a href="{{ route('partrepair.finishrepair.index') }}"
                                                        class="btn btn-md btn-secondary">back</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    {{-- <div class="col">

                                        <div class="p-3 border bg-light">

   
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            {{ Form::close() }}

        </div>
    </div>
@endsection

@section('script')
@endsection
