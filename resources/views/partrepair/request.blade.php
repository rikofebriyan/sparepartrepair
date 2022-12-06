@extends('layouts.app')


@section('content')
    <div class="container-fluid">


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
                                    <input type="datetime-local" class="form-control" id="tanggal" name="tanggal">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="parts_from" class="col-sm-3 col-form-label">Parts From</label>
                                <div class="col-sm-9">

                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" onclick="formChoice(0)">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            New
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" onclick="formChoice(1)">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Bekas Repair
                                        </label>
                                    </div>

                                </div>
                            </div>
                            {{-- <select class="form-select" id="parts_from" name="parts_from" >
                                        <option selected disabled>Pilih ...</option>
                                        <option value="1">New</option>
                                        <option value="2">Repair</option>
                                    </select>
                                </div>
                            </div> --}}
                            {{-- <input type="radio" name="rad1" onclick="formChoice(0)"> Business URL
                            <input type="text" name="businessSite" id="field1" value="input1">
                            <input type="radio" name="rad1" onclick="formChoice(1)"> I don't have a website but here
                            are some sites I like!
                            <input type="text" name="businessSite" id="field2" value="input2"> --}}

                            <div class="mb-3 row" id="field2" style="display: none">
                                <label for="code_part_repair" class="col-sm-3 col-form-label">Code Part
                                    Repair</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control mb-3" name="code_part_repair"
                                        placeholder="Input Kode Part Repair">

                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="number_of_repair"
                                            name="number_of_repair" placeholder="Number of Repair" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="item_code" class="col-sm-3 col-form-label">Spare Part</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" class="form-control" id="item_code" name="item_code" > --}}
                                    <select class="form-select mb-3 choices" onchange="isi_otomatis()" id="isiotomatis"
                                        name="item_name" data-live-search="true">
                                        <option selected></option>
                                        @foreach ($reqtzy as $req)
                                            <option value="{{ $req->id }}">{{ $req->item_name }} |
                                                {{ $req->item_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="item_code" name="item_code"
                                            placeholder="Item Code" readonly>
                                        <input type="text" class="form-control bg-light" id="item_name" name="item_name"
                                            placeholder="Item Name" readonly>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="description"
                                            name="item_type" placeholder="Item Type" readonly>
                                    </div>

                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" id="price" name="price"
                                            placeholder="Price" readonly>
                                        <input type="text" class="form-control bg-light" id="qty"
                                            name="stock_spare_part" placeholder="Stock" readonly>
                                    </div>

                                    <div class="input-group">
                                        <select class="form-control" id="maker" name="maker">
                                            <option selected disabled>Maker ...</option>
                                            <option value="1">SMC</option>
                                            <option value="2">IAI</option>
                                            <option value="3">CKD</option>
                                            <option value="4">Fanuc</option>
                                        </select>
                                        <select class="form-control" id="type_of_part" name="type_of_part">
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
                                        placeholder="Input Serial Number">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="problem" class="col-sm-3 col-form-label">Problem</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="problem" name="problem" rows="4" placeholder="Input Detail Problem"></textarea>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3 border">
                            <div class="mb-3 row">
                                <label for="section" class="col-sm-3 col-form-label">Section</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="section" name="section">
                                        <option selected disabled>Pilih ...</option>
                                        @foreach ($section as $sec)
                                            <option value="{{ $sec->id }}">{{ $sec->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="line" class="col-sm-3 col-form-label">Line</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="line" name="line">
                                        <option value="" disabled selected>Pilih ...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="machine" class="col-sm-3 col-form-label">Machine</label>
                                <div class="col-sm-9">
                                    {{-- <input type="text" class="form-control" id="machine" name="machine" > --}}
                                    <select class="form-select" id="machine" name="machine">
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
                                        value="Waiting" > --}}
                                    <select class="form-control" id="status_repair" name="status_repair">
                                        <option selected disabled>Pilih ...</option>
                                        <option value="1">Normal</option>
                                        <option value="2">Urgent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama_pic" class="col-sm-3 col-form-label">PIC User</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="nama_pic" name="nama_pic">
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
                                        readonly>
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
@section('script')
    <script type="text/javascript">
        function isi_otomatis() {
            var item_name = $("#isiotomatis").val();
            $.ajax({
                url: '/ajax',
                data: "item_name=" + item_name,
                success: function(data) {
                    var json = data,
                        obj = JSON.parse(json);
                    $('#item_name').val(obj.item_name);
                    $('#item_code').val(obj.item_code);
                    $('#description').val(obj.description);
                    $('#qty').val(obj.qty);
                    $('#price').val(obj.price);
                }
            });
        }
    </script>

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
    <script>
        function formChoice(x) {
            if (x == 0)
                $('#field2').css('display', 'none');
            else
                $('#field2').css('display', 'flex');
            return;
        }
    </script>

    {{-- <script type="text/javascript" src="{{ asset('js/jquery-3.6.1.min.js') }}"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#section').on('change', function() {
                var sectionId = $('#section option:selected').val()
                $.ajax({
                    type: 'GET',
                    url: '/getline/?sectionId=' + sectionId,
                    dataType: 'JSON',
                    success: function(result) {
                        $('#line').empty()
                        $('#line').append(
                            '<option value="" disabled selected>Choose</option>')
                        console.log(result)
                        $.each(result, function(id, value) {
                            $('#line').append('<option value="' + id + '">' +
                                value + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection


@endsection
