<div class="container-fluid justify-content-center p-0">
    <div class="row gx-3">
        <div class="col">
            <div class="p-3 border">

                <div class="mb-3 row">
                    <label for="tanggal" class="col-sm-3 col-form-label">Date
                        Created</label>
                    <div class="col-sm-9">
                        <input type="datetime-local" class="form-control" id="tanggal" name="date"
                            value="{{ Carbon\Carbon::now() }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="parts_from" class="col-sm-3 col-form-label">Apakah part
                        pernah di
                        repair?</label>
                    <div class="col-sm-9 col-form-label">

                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="part_from" id="flexRadioDefault1"
                                value="Belum Pernah Repair">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Belum Pernah Repair
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input class="form-check-input" type="radio" name="part_from" id="flexRadioDefault2"
                                value="Pernah Repair">
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
                        <input type="text" class="form-control mb-3" placeholder="Input Kode Part Repair">

                        <div class="input-group">
                            <input type="text" class="form-control" id="number_of_repair"
                                placeholder="Number of Repair" readonly>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="item_code" class="col-sm-3 col-form-label">Spare
                        Part</label>
                    <div class="col-sm-9">
                        <select class="form-select mb-3 choices" id="isiotomatis" name="item_name"
                            data-live-search="true">
                            <option selected></option>
                            {{-- @foreach ($reqtzy as $req)
                                    <option value="{{ $req->id }}"> {{ $req->item_code }} |
                                        {{ $req->item_name }} |
                                        {{ $req->description }}
                                    </option>
                                @endforeach --}}
                        </select>
                        <div class="input-group">
                            <input type="text" class="form-control" id="item_code" name="item_code"
                                placeholder="Item Code" readonly>
                            <input type="text" class="form-control" id="item_name" name="item_name"
                                placeholder="Item Name" readonly>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" id="description" name="item_type"
                                placeholder="Item Type" readonly>
                        </div>

                        <div class="input-group">
                            <input type="text" class="form-control" id="price" name="price" placeholder="Price"
                                readonly>
                            <input type="text" class="form-control" id="qty" name="stock_spare_part"
                                placeholder="Stock" readonly>
                        </div>

                        <div class="input-group">
                            <select class="form-control" id="maker" name="maker">
                                <option selected disabled>Maker ...</option>
                                {{-- @foreach ($maker as $mak)
                                        <option value="{{ $mak->name }}">{{ $mak->name }}
                                        </option>
                                    @endforeach --}}
                                {{-- <option value="1">SMC</option>
                <option value="2">IAI</option>
                <option value="3">CKD</option>
                <option value="4">Fanuc</option> --}}
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
                    <label for="serial_number" class="col-sm-3 col-form-label">Serial
                        Number</label>
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
                            {{-- @foreach ($section as $sec)
                                    <option value="{{ $sec->id }}">{{ $sec->name }}
                                    </option>
                                @endforeach --}}
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
                        <select class="form-select" id="machine" name="machine">
                            <option selected disabled>Pilih ...</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="status_repair" class="col-sm-3 col-form-label">Status
                        Repair</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="status_repair" name="status_repair">
                            <option selected disabled>Pilih ...</option>
                            <option value="Normal">Normal</option>
                            <option value="Urgent">Urgent</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="nama_pic" class="col-sm-3 col-form-label">PIC User</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="nama_pic" name="nama_pic">
                            <option selected disabled>Pilih ...</option>
                            {{-- @foreach ($user as $us)
                                    <option value="{{ $us->name }}">{{ $us->name }}
                                    </option>
                                @endforeach --}}
                        </select>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="reg_sp" class="col-sm-3 col-form-label">Ticket
                        Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="reg_sp" name="reg_sp" value=""
                            readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="progress" class="col-sm-3 col-form-label">Progress</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="progress" name="progress" value="Waiting"
                            readonly>
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-primary">Save</button>
                <a href="{{ route('partrepair.waitingtable.index') }}" class="btn btn-md btn-secondary">back</a>
            </div>
        </div>
    </div>
</div>
