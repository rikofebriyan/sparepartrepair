<div class="container-fluid justify-content-center p-0">
    <div class="row gx-3">
        <div class="col">
            <div class="p-3 border">

                <div class="mb-3 row">
                    <label for="place_of_repair" class="col-sm-3 col-form-label">Place
                        Repair</label>
                    <div class="col-sm-9">
                        <select class="form-select choices" id="place_of_repair" name="place_of_repair" required>
                            <option value="">Pilih ...</option>
                            <option value="In House">In House</option>
                            <option value="In Subcont">In Subcont</option>
                            <option value="Trade In">Trade In</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="analisa" class="col-sm-3 col-form-label">Analisa</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="analisa" name="analisa" rows="3" placeholder="Input Analisa" required></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="action" class="col-sm-3 col-form-label">Action</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="action" name="action" rows="3" placeholder="Input Analisa" required></textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="judgement" class="col-sm-3 col-form-label">Judgement</label>
                    <div class="col-sm-9">
                        <select class="form-select choices" id="judgement" name="judgement" required>
                            <option value="">Pilih ...</option>
                            <option value="Continue Repair">Continue Repair</option>
                            <option value="Scrap">Scrap</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="pic_repair" class="col-sm-3 col-form-label">PIC Repair</label>
                    <div class="col-sm-9">
                        <select class="form-select choices" id="pic_repair" name="pic_repair" required>
                            <option value="">Pilih ...</option>
                            @foreach ($user as $us)
                                <option value="{{ $us->name }}">{{ $us->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="plan_start_repair" class="col-sm-3 col-form-label">Plan Start
                        Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" name="plan_start_repair" value=""
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="plan_finish_repair" class="col-sm-3 col-form-label">Plan
                        Finish Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" name="plan_finish_repair" value=""
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="actual_start_repair" class="col-sm-3 col-form-label">Actual
                        Start Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control asu" id="datepicker" name="actual_start_repair"
                            value="" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="actual_finish_repair" class="col-sm-3 col-form-label">Actual
                        Finish Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control asu" id="datepicker2"
                            name="actual_finish_repair" value="" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="total_time_repair" class="col-sm-3 col-form-label">Actual Time
                        Repair</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="selisih" name="total_time_repair"
                            value="" required readonly>
                    </div>
                    <label for="total_time_repair" class="col-sm-6 col-form-label">Hours</label>
                </div>

                <div class="mb-3 row">
                    <label for="labour_cost" class="col-sm-3 col-form-label">Labour
                        Cost</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="labour_cost" name="labour_cost"
                            value="" required readonly>
                    </div>
                </div>


            </div>
        </div>
        <div class="col">
            <div class="p-3 border">
                <div class="mb-3 row">
                    <label for="subcont_name" class="col-sm-3 col-form-label">Subcont
                        Name</label>
                    <div class="col-sm-9">
                        <select class="form-select choices" id="subcont_name" name="subcont_name" required>
                            <option value="">Pilih ...</option>
                            @foreach ($subcont as $sub)
                                <option value="{{ $sub->name }}">{{ $sub->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="quotation" class="col-sm-3 col-form-label">Quotation</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="quotation" name="quotation" value=""
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nomor_pp" class="col-sm-3 col-form-label">Nomor PP</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nomor_pp" name="nomor_pp" value=""
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nomor_po" class="col-sm-3 col-form-label">Nomor PO</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nomor_po" name="nomor_po" value=""
                            required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="estimasi_selesai" class="col-sm-3 col-form-label">Estimasi
                        Selesai</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" id="estimasi_selesai"
                            name="estimasi_selesai" value="" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-primary">Save</button>
                <a href="{{ route('partrepair.progresstable.index') }}" class="btn btn-md btn-secondary">back</a>
            </div>
        </div>
    </div>
</div>
