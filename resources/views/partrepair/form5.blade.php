{{ Form::open(['route' => 'partrepair.finishrepair.store', 'method' => 'POST']) }}
<div class="container-fluid justify-content-center py-0">
    <div class="row">

        <div class="card col-4 border p-3 mx-2">

            {{-- <input type="hidden" name="form_input_id" id="form_input_id" value="{{ $progressrepair->form_input_id }}"> --}}

                <input type="hidden" name="form_input_id" id="form_input_id" value="{{ $waitingrepair->form_input_id }}">
            <div class="mb-3 row">
                <label for="code_part_repair" class="col-sm-3 col-form-label">Code Part
                    Repair</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="code_part_repair" name="code_part_repair"
                        value="" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="delivery_date" class="col-sm-3 col-form-label">Delivery
                    Date</label>
                <div class="col-sm-9">
                    <input type="datetime-local" class="form-control" id="delivery_date" name="delivery_date"
                        value="" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="pic_delivery" class="col-sm-3 col-form-label">PIC
                    Delivery</label>
                <div class="col-sm-9">
                    <select class="form-select choices" id="isiotomatis" onchange="isi_otomatis()" name="pic_delivery">
                        <option value="">Pilih ...</option>
                        @foreach ($user as $us)
                            <option value="{{ $us->name }}">{{ $us->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="mb-3 row">
                <div class="p-3">
                    <button type="submit" class="btn btn-md btn-primary">Save</button>
                    <a href="{{ route('partrepair.finishrepair.index') }}" class="btn btn-md btn-secondary">back</a>
                </div>
            </div>
        </div>


        <div class="card col border mx-2">
            <div class="p-3">
                <div class="d-flex justify-content-between">
                    <div class="p-0">
                        <h3>Finish Details</h3>
                    </div>
                    <div class="p-0">
                        <a href="/home"><img width="120" height="30"
                                src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>

                <hr class="m-2">

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">No. Ticket</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        EW02140215
                    </div>
                </div>

                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Date Created</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        15 Jan 2022
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">PIC repair</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        Riko
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Part Name</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        Robot Gundam
                    </div>
                </div>


                <div class="divider m-0">
                    <div class="divider-text">Cost</div>
                </div>



                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Place of Repair</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        Subcont
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Subcont Cost</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        10000
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Labor Cost</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        15000
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Seal Kit Cost</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        15000
                    </div>
                </div>
                <div class="row">
                    <label for="disabledInput" class="col-sm-3 col-form-label">Total Cost</label>
                    <div class="col-sm-9 align-items-center d-flex">
                        15000
                    </div>
                </div>


                <div class="divider m-0">
                    <div class="divider-text">Trial Result</div>
                </div>


            </div>
        </div>
        {{-- <div class="col">

                <div class="p-3 border bg-light">


                </div>
            </div> --}}
    </div>
</div>

{{ Form::close() }}
