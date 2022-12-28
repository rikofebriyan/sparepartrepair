@extends('layouts.app')


@section('content')
    <div class="container-fluid">

        <div class="card border text-center mb-2">
            <h3 class="m-2">SPAREPART REPAIR REQUEST FORM</h3>
        </div>
        {{-- <h3 class="text-center mb-3" style="font-size: 1.3rem; font-weight:bold;">SPAREPART REPAIR REQUEST FORM</h3> --}}

        {{ Form::open(['route' => 'partrepair.waitingtable.store', 'method' => 'POST']) }}
        <div class="container-fluid justify-content-center py-0">
            <div class="container-fluid">
                <div class="row gx-3">
                    <div class="card col border m-2">
                        <div class="p-3">
                            <input type="hidden" name="id" value="">

                            <div class="mb-3 row">
                                <label for="tanggal" class="col-sm-3 col-form-label">Date Created</label>
                                <div class="col-sm-9">
                                    <input type="datetime-local" class="form-control bg-secondary text-white" id="tanggal" name="date"
                                        value="{{ Carbon\Carbon::now() }}" readonly required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="parts_from" class="col-sm-3 col-form-label">Apakah part pernah di
                                    repair?</label>
                                <div class="col-sm-9 col-form-label">

                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="part_from"
                                            id="flexRadioDefault1" onclick="formChoice(0)" value="Belum Pernah Repair"
                                            checked>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Belum Pernah Repair
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="part_from"
                                            id="flexRadioDefault2" onclick="formChoice(1)" value="Pernah Repair">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Pernah di Repair
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-3 row" id="field2" style="display: none">
                                <label for="code_part_repair" class="col-sm-3 col-form-label">Code Part
                                    Repair</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control mb-3" placeholder="Input Kode Part Repair"
                                        id="code_part_repair" name="code_part_repair">

                                    <div class="input-group">
                                        <input type="text" class="form-control" id="number_of_repair"
                                            name="number_of_repair" placeholder="Number of Repair" readonly>
                                        <label for="number_of_repair" class="col-sm-3 col-form-label ms-3">Times</label>
                                        <div id="number_of_repairFeedback" class="invalid-feedback">
                                            Part Has Been Repaired Over 5 Times. Please Scrap!
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="item_code" class="col-sm-3 col-form-label">Spare Part</label>
                                <div class="col-sm-9">
                                    <div id="field3" class="mb-3">
                                        <select class="form-select choices" onchange="isi_otomatis()" id="isiotomatis"
                                            name="item_name" data-live-search="true">
                                            <option selected></option>
                                            @foreach ($reqtzy as $req)
                                                <option value="{{ $req->code_item_description }}">{{ $req->item_code }} |
                                                    {{ $req->item_name }} | {{ $req->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>



                                    <div class="input-group">

                                        <input type="hidden" class="form-control" name="item_id" id="item_id">
                                        <input type="text" class="form-control bg-secondary text-white" id="item_code" name="item_code"
                                            placeholder="Item Code" readonly required>
                                        <input type="text" class="form-control bg-secondary text-white" id="item_name" name="item_name"
                                            placeholder="Item Name" readonly required>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-secondary text-white" id="description" name="item_type"
                                            placeholder="Item Type" readonly required>
                                    </div>

                                    <div class="input-group">
                                        <input type="text" class="form-control number bg-secondary text-white" id="price" name="price"
                                            placeholder="Price" readonly required>
                                        <input type="text" class="form-control bg-secondary text-white" id="qty"
                                            name="stock_spare_part" placeholder="Stock" readonly required>
                                    </div>

                                    <div class="input-group">
                                        <select class="form-control" id="maker" name="maker" required>
                                            <option selected disabled>Maker ...</option>
                                            @foreach ($maker as $mak)
                                                <option value="{{ $mak->name }}">{{ $mak->name }}
                                                </option>
                                            @endforeach
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



                        </div>
                    </div>
                    <div class="card col border m-2">
                        <div class="p-3">
                            <div class="mb-3 row">
                                <label for="section" class="col-sm-3 col-form-label">Section</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="section" name="section" required>
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
                                    <select class="form-select" id="lineline" name="line" required>
                                        <option value="" disabled selected>Pilih ...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="machine" class="col-sm-3 col-form-label">Machine</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="machine" name="machine" required>
                                        <option selected disabled>Pilih ...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama_pic" class="col-sm-3 col-form-label">PIC User</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="nama_pic" name="nama_pic" required>
                                        <option selected disabled>Pilih ...</option>
                                        @foreach ($user as $us)
                                            <option value="{{ $us->name }}">{{ $us->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="status_repair" class="col-sm-3 col-form-label">Status Repair</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="status_repair" name="status_repair" required>
                                        <option selected disabled>Pilih ...</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Urgent">Urgent</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="reg_sp" class="col-sm-3 col-form-label">Ticket Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="reg_sp" name="reg_sp"
                                        value="{{ $ticket }}" readonly required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="progress" class="col-sm-3 col-form-label">Progress</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="progress" name="progress"
                                        value="Waiting" readonly required>
                                </div>
                            </div>

                            <button type="submit" id="btnSubmitFormInput" class="btn btn-md btn-primary">Save</button>
                            <a href="{{ route('partrepair.waitingtable.index') }}"
                                class="btn btn-md btn-secondary">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ Form::close() }}

    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function isi_otomatis() {
            var item_name = $("#isiotomatis").val();
            $.ajax({
                type: 'GET',
                url: '/ajax/?item_name=' + item_name,
                dataType: 'JSON',
                success: function(data) {
                    $('#item_id').val(data.id);
                    $('#item_name').val(data.item_name);
                    $('#item_code').val(data.item_code);
                    $('#description').val(data.description);
                    $('#qty').val(data.qty);
                    $('#price').val(data.price);

                    if (data.qty == 0) {
                        $('#status_repair').empty()
                        $('#status_repair').append(`
                            <option disabled>Pilih ...</option>
                            <option value="Normal">Normal</option>
                            <option value="Urgent" selected>Urgent</option>
                        `)
                    } else {
                        $('#status_repair').empty()
                        $('#status_repair').append(`
                            <option disabled>Pilih ...</option>
                            <option value="Normal" selected>Normal</option>
                            <option value="Urgent">Urgent</option>
                        `)
                    }
                }
            });
        }
    </script>
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
            if (x == 0) {
                $('#field2').css('display', 'none');
                $('#code_part_repair').val('')
                $('#number_of_repair').val('')
                $('#field3').removeClass('d-none')

                $('#item_code').val('')
                $('#item_name').val('')
                $('#description').val('')

                $('#price').val('')
                $('#qty').val('')

                getMaker()
                getTypeOfPart()
                return
            } else {
                $('#field2').css('display', 'flex');
                $('#field3').addClass('d-none')

                $('#item_code').val('')
                $('#item_name').val('')
                $('#description').val('')

                $('#price').val('')
                $('#qty').val('')

                getMaker()
                getTypeOfPart()
                return;
            }
        }

        function getMaker() {
            $.ajax({
                type: 'GET',
                url: '/getMaker',
                dataType: 'JSON',
                success: function(result) {
                    $('#maker').empty()
                    $('#maker').append(`<option selected disabled>Maker ...</option>`)
                    $.each(result, function(id, value) {
                        $('#maker').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                }
            });
        }

        function getTypeOfPart() {
            $.ajax({
                type: 'GET',
                url: '/getTypeOfPart',
                dataType: 'JSON',
                success: function(result) {
                    $('#type_of_part').empty()
                    $('#type_of_part').append(
                        `<option selected disabled>Type Of Part ...</option>`)
                    $.each(result, function(id, value) {
                        $('#type_of_part').append('<option value="' + id + '">' +
                            value + '</option>');
                    });
                }
            });
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#section').on('change', function() {
                var sectionId = $('#section option:selected').val()
                $.ajax({
                    type: 'GET',
                    url: '/getline/?sectionId=' + sectionId,
                    dataType: 'JSON',
                    success: function(result) {
                        $('#lineline').empty()
                        $('#lineline').append(
                            '<option value="" disabled selected>Choose</option>')
                        console.log(result)
                        $.each(result, function(id, value) {
                            $('#lineline').append('<option value="' + id + '">' +
                                value + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#lineline').on('change', function() {
                var lineId = $('#lineline option:selected').val()
                $.ajax({
                    type: 'GET',
                    url: '/getmachine/?lineId=' + lineId,
                    dataType: 'JSON',
                    success: function(result) {
                        $('#machine').empty()
                        $('#machine').append(
                            '<option value="" disabled selected>Choose</option>')
                        console.log(result)
                        $.each(result, function(id, value) {
                            $('#machine').append('<option value="' + value + '">' +
                                value + '</option>');
                        });
                    }
                });
            });

            $('#code_part_repair').on('input', function() {
                var codePartRepair = $('#code_part_repair').val()
                $.ajax({
                    type: 'GET',
                    url: '/get-number-of-repair/?codePartRepair=' + codePartRepair,
                    dataType: 'JSON',
                    success: function(result) {
                        console.log(result)
                        $('#number_of_repair').val(result['finishRepair'])
                        if (result['finishRepair'] > 5) {
                            $('#number_of_repair').addClass('is-invalid')
                            $('#btnSubmitFormInput').prop('disabled', true)
                        } else {
                            $('#number_of_repair').removeClass('is-invalid')
                            $('#btnSubmitFormInput').prop('disabled', false)

                            $('#item_code').val(result['dataRepair'].item_code)
                            $('#item_name').val(result['dataRepair'].item_name)
                            $('#description').val(result['dataRepair'].item_type)

                            $('#price').val(result['dataPart'].price)
                            $('#qty').val(result['dataPart'].qty)

                            $('#maker').empty()
                            $('#type_of_part').empty()
                            $('#maker').append(`<option disabled>Maker ...</option>`)
                            $('#type_of_part').append(
                                `<option disabled>Type Of Part ...</option>`)

                            $.each(result['maker'], function(id, data) {
                                if (data.id == result['dataRepair'].maker) {
                                    selected = 'selected'
                                } else {
                                    selected = ''
                                }
                                $('#maker').append(`<option value="${data.id}" ` +
                                    selected + `>${data.name}</option>`)
                            });

                            $.each(result['typeOfPart'], function(id, part) {
                                if (part == result['dataRepair'].type_of_part) {
                                    selected = 'selected'
                                } else {
                                    selected = ''
                                }
                                $('#type_of_part').append(`<option value="${id}" ` +
                                    selected + `>${part}</option>`)
                            });

                            if (result['dataPart'].qty == 0) {
                                $('#status_repair').empty()
                                $('#status_repair').append(`
                                    <option disabled>Pilih ...</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Urgent" selected>Urgent</option>
                                `)
                            } else {
                                $('#status_repair').empty()
                                $('#status_repair').append(`
                                    <option disabled>Pilih ...</option>
                                    <option value="Normal" selected>Normal</option>
                                    <option value="Urgent">Urgent</option>
                                `)
                            }
                        }
                    }
                });
            });
        });
    </script>
@endsection
