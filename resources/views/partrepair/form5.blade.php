<div class="container-fluid justify-content-center py-0">
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
                        <input type="text" class="form-control" id="no_code_repair" name="no_code_repair"
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
                    <label for="pic_repair" class="col-sm-3 col-form-label">PIC
                        Delivery</label>
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
                    <div class="p-3">
                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <a href="{{ route('partrepair.finishrepair.index') }}" class="btn btn-md btn-secondary">back</a>
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
