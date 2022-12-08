<div class="container-fluid justify-content-center p-0">
    <div class="row gx-3">
        <div class="col">
            <div class="p-3 border">

                <div class="mb-3 row">
                    <label for="place_of_repair" class="col-sm-3 col-form-label">Place
                        Repair</label>
                    <div class="col-sm-9">
                        {{-- <input type="text" class="form-control" id="place_of_repair"
                                                        name="place_of_repair" value="" required> --}}
                        <select class="form-select choices" id="place_of_repair" name="place_of_repair" required>
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
                        <select class="form-select choices" id="judgement" name="judgement" required>
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
                        <select class="form-select choices" id="pic_repair" name="pic_repair" required>
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
                        <input type="datetime-local" class="form-control" id="plan_start_repair"
                            name="plan_start_repair" value="" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="plan_finish_repair" class="col-sm-3 col-form-label">Plan
                        Finish Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" id="plan_finish_repair"
                            name="plan_finish_repair" value="" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="actual_start_repair" class="col-sm-3 col-form-label">Actual
                        Start Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" id="actual_start_repair"
                            name="actual_start_repair" value="" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="actual_finish_repair" class="col-sm-3 col-form-label">Actual
                        Finish Repair</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" id="actual_finish_repair"
                            name="actual_finish_repair" value="" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="total_time_repair" class="col-sm-3 col-form-label">Total Time
                        Repair</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="total_time_repair" name="total_time_repair"
                            value="" required readonly>
                    </div>
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
                            <option selected disabled>Pilih ...</option>
                            <option value="PTS">PTS</option>
                            <option value="Yuasa">Yuasa</option>
                            <option value="Minezawa">Minezawa</option>
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
