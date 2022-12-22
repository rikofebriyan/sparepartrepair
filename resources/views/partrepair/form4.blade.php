<div class="container-fluid justify-content-center py-0">
    <button type="button" class="btn btn-md btn-success mb-3 float-right" data-bs-toggle="modal"
        data-bs-target="#modalAddPengecekan">
        Add Standard Pengecekan
    </button>
    <div class="table-responsive-sm">
        {{ Form::open(['route' => 'partrepair.progresstrial.store', 'method' => 'POST']) }}
        <table id="myTable" class="table table-striped nowrap overflow-auto display">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Item Standard</th>
                    <th scope="col">Standard</th>
                    <th scope="col">Actual</th>
                    <th scope="col">Judgement</th>
                    {{-- <th scope="col">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @forelse ($join as $joi)
                    <tr>
                        <td>{{ $joi->id }}
                            <input type="hidden" name="form_input_id[]" id="form_input_id"
                                value="{{ $progressrepair->form_input_id }}">
                        </td>
                        <td>{{ $joi->item_standard }}
                            <input type="hidden" name="id_standard_pengecekan[]" id="id_standard_pengecekan"
                                value="{{ $joi->item_standard_id }}">
                        </td>
                        <td><input type="text" id="{{ 'standard' . $i }}" name="standard_pengecekan[]"
                                value="{{ $joi->standard_pengecekan }}" class="form-control" readonly>
                        </td>
                        <td><input type="text" name="actual_pengecekan[]" id={{ 'actual' . $i }} class="form-control"
                                placeholder="Actual" required>
                        <td><input type="text" name="judgement[]" id={{ 'judge' . $i }} class="form-control"
                                placeholder="Judgement" readonly required>
                        </td>
                        {{-- <td class="text-center d-flex d-inline">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn icon btn-primary btn-sm me-1" data-bs-toggle="modal"
                                data-bs-target="#jemb{{ $joi->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            {!! Form::model($joi, ['method' => 'PATCH', 'route' => ['partrepair.progresstrial.update', $joi->id]]) !!}
                            <div class="modal fade" id="jemb{{ $joi->id }}" tabindex="-1"
                                aria-labelledby="modalUpdateBarang" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Barang</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group mt-2">
                                                <label for="master_spare_part_id">Master Spare Part ID</label>
                                                <select name="master_spare_part_id" id="master_spare_part_id"
                                                    class="form-control">
                                                    <option value="{{ $asu->item_id }}">{{ $asu->item_name }}
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="item_standard_id">Item Standard ID</label>
                                                <select name="item_standard_id" id="item_standard_id"
                                                    class="form-control">
                                                    @foreach ($itemstandard as $tabw)
                                                        <option value="{{ $tabw->id }}" selected>
                                                            {{ $tabw->item_standard }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group mt-2">
                                                <label for="standard_pengecekan">standard_pengecekan</label>
                                                <input type="text" id="standard_pengecekan"
                                                    name="standard_pengecekan" class="form-control"
                                                    value="{{ $joi->standard_pengecekan }}" required>
                                            </div>


                                            <button type="submit" class="btn btn-primary">Perbarui Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}

                        </td> --}}

                    </tr>
                    <?php $i++; ?>
                @empty
                    <tr>
                        <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <button id="judgeok" type="submit" class="btn btn-md btn-primary">Save</button>
        {!! Form::close() !!}
    </div>
</div>


<!-- Modal -->

{{ Form::open(['route' => 'matrix.standard_pengecekan.store', 'method' => 'POST']) }}
<div class="modal fade" id="modalAddPengecekan" tabindex="-1" aria-labelledby="modalAddPengecekanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAddPengecekanLabel">Add New Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="form-group mt-2">
                    <label for="master_spare_part_id">Section ID</label>
                    <select name="master_spare_part_id" id="master_spare_part_id" class="form-control">
                        <option value="{{ $asu->item_id }}">{{ $asu->item_code }}
                        </option>
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="item_standard_id">Section ID</label>
                    <select name="item_standard_id" id="item_standard_id" class="form-control">
                        <option value="" disabled selected>
                            choose
                        </option>
                        @foreach ($itemstandard as $tabw)
                            <option value="{{ $tabw->id }}">
                                {{ $tabw->item_standard }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mt-2">
                    <label for="standard_pengecekan">standard_pengecekan</label>
                    <input type="text" id="standard_pengecekan" name="standard_pengecekan" class="form-control"
                        value="" required>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
