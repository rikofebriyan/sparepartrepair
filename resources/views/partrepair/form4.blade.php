<div class="container-fluid justify-content-center py-0">
    <div class="mb-3">
        <button class="btn btn-primary">Add item Pengecekan</button>
    </div>
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

                    </tr>
                    <?php $i++; ?>
                @empty
                    <tr>
                        <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <button id="judgeok" type="submit" class="btn btn-md btn-primary" style="display: none">Save</button>
        {{ Form::close() }}
    </div>
</div>
