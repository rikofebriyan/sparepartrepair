{{ Form::open(['route' => 'partrepair.progresstable.store', 'method' => 'POST']) }}
<div class="container-fluid justify-content-center p-0">
    <div class="row gx-3">
        <div class="col">
            <div class="p-3 border">


                <input type="hidden" name="form_input_id" id="form_input_id" value="{{ $progressrepair->form_input_id }}">

                <div class="mb-3 row">
                    <label for="place_of_repair" class="col-sm-3 col-form-label">Place
                        Repair</label>
                    <div class="col-sm-9">
                        <select class="form-select is-valid" id="showsubcont" name="place_of_repair">
                            <option selected disabled>{{ $progressrepair->place_of_repair }}</option>
                            {{-- <option value="In House">In House</option>
                            <option value="Subcont">Subcont</option>
                            <option value="Trade In">Trade In</option> --}}
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="analisa" class="col-sm-3 col-form-label">Analisa</label>
                    <div class="col-sm-9">
                        <textarea class="form-control is-valid" id="analisa" name="analisa" rows="5" placeholder="Input Analisa"
                            readonly>{{ $progressrepair->analisa }}
                        </textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="action" class="col-sm-3 col-form-label">Action</label>
                    <div class="col-sm-9">
                        <textarea class="form-control is-valid" id="action" name="action" rows="5" placeholder="Input Analisa"
                            readonly>{{ $progressrepair->action }}</textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="judgement" class="col-sm-3 col-form-label">Judgement</label>
                    <div class="col-sm-9">
                        <select class="form-select is-valid" id="judgement" name="judgement">
                            <option selected disabled>{{ $progressrepair->judgement }}</option>
                            {{-- <option value="Continue Repair">Continue Repair</option>
                            <option value="Scrap">Scrap</option> --}}
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-3">
                        <label for="pic_repair" class="col-form-label">PIC Repair</label>
                    </div>
                    <div class="col-sm-5">
                        <select class="form-select is-valid" id="isiotomatis" onchange="isi_otomatis()"
                            name="pic_repair">
                            <option selected disabled>{{ $progressrepair->pic_repair }}</option>
                            {{-- @foreach ($user as $us)
                                <option value="{{ $us->name }}">{{ $us->name }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="col-sm-1 ">
                        <label for="pic_repair" class="col-form-label">Cost</label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control is-valid" id="labour_cost" name="labour_cost"
                            placeholder="Labour Cost" value="{{ $progressrepair->labour_cost }}" readonly>
                    </div>
                </div>


                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    {{-- <button type="submit" class="btn btn-md btn-primary">Save</button>
                    <a href="{{ route('partrepair.progresstable.index') }}" class="btn btn-md btn-secondary">back</a> --}}


                </div>
            </div>
        </div>

        <div class="col">
            <div class="p-3 border">
                <div class="mb-3 row">
                    <label for="plan_start_repair" class="col-sm-3 col-form-label">Plan Start
                        Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control is-valid" name="plan_start_repair"
                            value="{{ $progressrepair->plan_start_repair }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="plan_finish_repair" class="col-sm-3 col-form-label">Plan
                        Finish Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control is-valid" name="plan_finish_repair"
                            value="{{ $progressrepair->plan_finish_repair }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="actual_start_repair" class="col-sm-3 col-form-label">Actual
                        Start Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control is-valid asu" id="datepicker"
                            name="actual_start_repair" value="{{ $progressrepair->actual_start_repair }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="actual_finish_repair" class="col-sm-3 col-form-label">Actual
                        Finish Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control is-valid asu" id="datepicker2"
                            name="actual_finish_repair" value="{{ $progressrepair->actual_finish_repair }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="total_time_repair" class="col-sm-3 col-form-label">Actual Time
                        Repair</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control is-valid" id="selisih" name="total_time_repair"
                            value="{{ $progressrepair->total_time_repair }}" readonly>
                    </div>
                    <label for="total_time_repair" class="col-sm-6 col-form-label">Hours</label>
                </div>
            </div>
            <div class="p-3 border mt-3" id="subcont">
                <div class="mb-3 row">
                    <label for="subcont_name" class="col-sm-3 col-form-label">Subcont
                        Name</label>
                    <div class="col-sm-9">
                        <select class="form-select is-valid" id="subcont_name" name="subcont_name">
                            <option selected disabled>{{ $progressrepair->subcont_name }}</option>
                            {{-- <option value="">Pilih ...</option>
                            @foreach ($subcont as $sub)
                                <option value="{{ $sub->name }}">{{ $sub->name }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="quotation" class="col-sm-3 col-form-label">Quotation</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control is-valid" id="quotation" name="quotation"
                            value="{{ $progressrepair->quotation }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nomor_pp" class="col-sm-3 col-form-label">Nomor PP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control is-valid" id="nomor_pp" name="nomor_pp"
                            value="{{ $progressrepair->nomor_pp }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nomor_po" class="col-sm-3 col-form-label">Nomor PO</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control is-valid" id="nomor_po" name="nomor_po"
                            value="{{ $progressrepair->nomor_po }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="estimasi_selesai" class="col-sm-3 col-form-label">Estimasi
                        Selesai</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control is-valid" id="estimasi_selesai"
                            name="estimasi_selesai" value="{{ $progressrepair->estimasi_selesai }}" readonly>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
{{ Form::close() }}
