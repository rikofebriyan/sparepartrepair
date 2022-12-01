@extends('layouts.app')


@section('content')
    <div class="container-fluid">

        {{-- <div class="accordion" id="accordionPanelsStayOpenExample"> --}}
        {{-- <div class="accordion-item">
                <h3 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne" style="font-size: 1.3rem; font-weight:bold;">
                        SPAREPART REPAIR REQUEST FORM
                    </button>
                </h3> --}}
        {{-- <div style="color: black" id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" --}}
        {{-- aria-labelledby="panelsStayOpen-headingOne"> --}}
        {{-- <div class="accordion-body"> --}}
        <h3 class="text-center mb-3" style="font-size: 1.3rem; font-weight:bold;">SPAREPART REPAIR REQUEST FORM</h3>

        {{ Form::open(['route' => 'partrepair.waitingtable.store', 'method' => 'POST']) }}
        <div class="container-fluid justify-content-center py-0">
            <div class="container-fluid">
                <div class="row gx-3">
                    <div class="col">
                        <div class="p-3 border">

                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Date Created</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal"
                                        required>
                                </div>
                            </div>

                            {{-- <div class="mb-3 row">
                                <label for="nama_pic" class="col-sm-3 col-form-label">nama_pic</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_pic" name="nama_pic"
                                        value="{{ old('nama_pic') }}" required>
                                </div>
                            </div> --}}

                            <div class="mb-3 row">
                                <label for="parts_from" class="col-sm-3 col-form-label">Parts From</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="parts_from" name="parts_from" required>
                                        <option selected disabled>Pilih ...</option>
                                        <option value="1">New</option>
                                        <option value="2">Repair</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="code_part_repair" class="col-sm-3 col-form-label">Code Part Repair</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control mb-3" id="code_part_repair" name="code_part_repair"
                                        placeholder="Input Kode Part Repair" required>

                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="number_of_repair" name="number_of_repair"
                                            placeholder="Number of Repair" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="item_code" class="col-sm-3 col-form-label">Spare Part</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" class="form-control" id="item_code" name="item_code" required> --}}
                                    <select class="form-select mb-3 choices" id="item_code" name="item_code"
                                        data-live-search="true" required>
                                        <option selected></option>
                                        <option value="1">Cylinder</option>
                                        <option value="2">Motor</option>
                                        <option value="3">Pump</option>
                                        <option value="4">Blower</option>
                                    </select>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="item_code" name="item_code"
                                            placeholder="Item Code" required readonly>
                                        <input type="text" class="form-control bg-light" id="item_name" name="item_name"
                                            placeholder="Item Name" required readonly>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="item_type" name="item_type"
                                            placeholder="Item Type" required readonly>
                                    </div>

                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="price" name="price"
                                            placeholder="Price" required readonly>
                                        <input type="text" class="form-control bg-light" id="stock_spare_part"
                                            name="stock_spare_part" placeholder="Stock" required readonly>
                                    </div>

                                    <div class="input-group">
                                        <select class="form-control" id="maker" name="maker" required>
                                            <option selected disabled>Maker ...</option>
                                            <option value="1">SMC</option>
                                            <option value="2">IAI</option>
                                            <option value="3">CKD</option>
                                            <option value="4">Fanuc</option>
                                        </select>
                                        <select class="form-control" id="type_of_part" name="type_of_part" required>
                                            <option selected disabled>Type Of Part ...</option>
                                            <option value="1">Mechanic</option>
                                            <option value="2">Hydraulic</option>
                                            <option value="3">Pneumatic</option>
                                            <option value="4">Electric</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3 row">
                                <label for="serial_number" class="col-sm-3 col-form-label">Serial Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="serial_number" name="serial_number"
                                        placeholder="Input Serial Number" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="problem" class="col-sm-3 col-form-label">Problem</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="problem" name="problem" rows="4" placeholder="Input Detail Problem"
                                        required></textarea>
                                </div>
                            </div>

                            {{-- <div class="mb-3 row">
                                <label for="stock_spare_part" class="col-sm-3 col-form-label">stock_spare_part</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="stock_spare_part"
                                        name="stock_spare_part" required>
                                </div>
                            </div> --}}

                            {{-- <div class="mb-3 row">
                                <label for="serial_number" class="col-sm-3 col-form-label">serial_number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="serial_number" name="serial_number"
                                        required>
                                </div>
                            </div> --}}

                            {{-- <div class="mb-3 row"> --}}
                            {{-- <label for="item_name" class="col-sm-3 col-form-label">asdf</label> --}}
                            {{-- <div class="col-sm-9"> --}}
                            {{-- <input type="text" class="form-control" id="item_name" name="item_name" required>
                                    <input type="text" class="form-control" id="item_type" name="item_type" required> --}}
                            {{-- <div class="input-group">
                                    <label for="item_name" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="item_name" name="item_name" required>
                                        <input type="text" class="form-control" id="item_type" name="item_type" required>
                                    </div>
                                </div> --}}
                            {{-- </div> --}}
                            {{-- </div> --}}

                            {{-- <div class="mb-3 row">
                                <label for="item_type" class="col-sm-3 col-form-label">Part Type</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="item_type" name="item_type" required>
                                </div>
                            </div> --}}
                            {{-- <div class="mb-3 row">
                                <label for="type_of_part" class="col-sm-3 col-form-label">type_of_part</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="type_of_part" name="type_of_part"
                                        required>
                                </div>
                            </div> --}}


                            {{-- <div class="mb-3 row">
                                <label for="maker" class="col-sm-3 col-form-label">maker</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="maker" name="maker" required>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border">
                            <div class="mb-3 row">
                                <label for="section" class="col-sm-3 col-form-label">Section</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" class="form-control" id="section" name="section" required> --}}
                                    <select class="form-select" id="section" name="section" required>
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
                                    {{-- <input type="text" class="form-control" id="line" name="line" required> --}}
                                    <select class="form-select" id="line" name="line" required>
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
                                    {{-- <input type="text" class="form-control" id="machine" name="machine" required> --}}
                                    <select class="form-select" id="machine" name="machine" required>
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
                                <label for="status_repair" class="col-sm-3 col-form-label">Status Repair</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" class="form-control" id="status_repair" name="status_repair"
                                        value="Waiting" required> --}}
                                    <select class="form-control" id="status_repair" name="status_repair" required>
                                        <option selected disabled>Pilih ...</option>
                                        <option value="1">Normal</option>
                                        <option value="2">Urgent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama_pic" class="col-sm-3 col-form-label">PIC User</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="nama_pic" name="nama_pic" required>
                                        <option selected disabled>Pilih ...</option>
                                        <option value="1">Riko</option>
                                        <option value="2">Febriyan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="reg_sp" class="col-sm-3 col-form-label">Ticket Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control bg-light" id="reg_sp" name="reg_sp"
                                        required readonly>
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
        {{-- </form> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                        collapse
                        plugin adds the appropriate classes that we use to style each element. These classes control the
                        overall
                        appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                        custom CSS or overriding our default variables. It's also worth noting that just about any HTML can
                        go
                        within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                        collapse
                        plugin adds the appropriate classes that we use to style each element. These classes control the
                        overall
                        appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                        custom CSS or overriding our default variables. It's also worth noting that just about any HTML can
                        go
                        within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div> --}}
        {{-- </div> --}}
    </div>

    <!-- Notifikasi menggunakan flash session data -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
@endsection
