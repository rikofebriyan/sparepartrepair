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
                        <td>{{ $joi->id }}</td>
                        <td>{{ $joi->item_standard }}</td>
                        <td><input type="text" id="{{ 'standard' . $i }}" value="{{ $joi->standard_pengecekan }}"
                                class="form-control" readonly>
                        </td>
                        <td><input type="text" name="actual_pengecekan[]" id={{ 'actual' . $i }} class="form-control"
                                placeholder="Actual">
                        <td><input type="text" name="judgement[]" id={{ 'judge' . $i }} class="form-control"
                                placeholder="Judgement" readonly>
                        </td>

                    </tr>
                    {{-- <script>
                        $('#actual2').keyup(function() {
                            var actual = $(this).val();
                            var standard = $('#standard2').val();
                            if (actual == standard) {
                                // alert("ok");
                                $('#judge2').val('ok');
                            } else
                                $('#judge2').val('ng');
                        });
                    </script> --}}
                    <?php $i++; ?>
                @empty
                    <tr>
                        <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <button type="submit" class="btn btn-md btn-primary">Save</button>
        {{ Form::close() }}
        <input type="text" name="asdasdasda" id="asdasdasd" class="form-control" placeholder="Actual">
    </div>
</div>
