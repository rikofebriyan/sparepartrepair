@extends('layouts.app')

@section('css')
@endsection
@section('content')
    {{-- @if ($message = Session::get('success'))
        <h6 class="alert alert-success">
            {{ $message }}
        </h6>
    @endif --}}
    <CENTER>
        <div class="container-fluid">
            <H2>PART REPAIR : FINISH TABLE</H2>
        </div>
    </CENTER>


    <div class="card border-0 shadow rounded overflow-auto">
        <div class="card-body">
            {{-- <a href="#" class="btn btn-md btn-success mb-3 float-right">New
                Post</a> --}}

            <div class="table-responsive-sm">
                <table id="myTable" class="table table-striped nowrap overflow-auto display">

                    <thead>
                        <tr>
                            <th scope="col">Ticket No</th>
                            <th scope="col">Plan Start</th>
                            <th scope="col">Plan Finish</th>
                            <th scope="col">Spare Part</th>
                            <th scope="col">Problem</th>
                            <th class="text-center" scope="col">Status Repair</th>
                            <th class="text-center" scope="col">Progress</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reqtzy as $req)
                            <tr>
                                <td>{{ $req->reg_sp }}</td>
                                <td>{{ Carbon\Carbon::parse($req->plan_start_repair)->format('Y-m-d') }}</td>
                                <td>{{ Carbon\Carbon::parse($req->plan_finish_repair)->format('Y-m-d') }}</td>
                                <td>{{ $req->item_name }}</td>
                                <td>{{ $req->problem }}</td>
                                <td>{{ $req->status_repair }}</td>
                                <td>

                                    @if ($req->progress == 'Finish')
                                        <div class="rounded-pill bg-success text-white text-center px-2 bg-opacity-50">
                                            {{ $req->progress }}</div>
                                    @endif

                                </td>
                                <td class="text-center">
                                    @if ($req->progress == 'Waiting')
                                        <a class="rounded-pill btn btn-success btn-sm col-7"
                                            href="{{ route('partrepair.waitingtable.show', $req->id) }}">To Progress</a>
                                    @elseif($req->progress == 'On Progress')
                                        <a class="rounded-pill btn btn-success btn-sm col-7"
                                            href="{{ route('partrepair.waitingtable.show', $req->id) }}">To Seal Kit</a>
                                    @elseif($req->progress == 'Seal Kit')
                                        <a class="rounded-pill btn btn-success btn-sm col-7"
                                            href="{{ route('partrepair.waitingtable.show', $req->id) }}">To Trial</a>
                                    @elseif($req->progress == 'Trial')
                                        <a class="rounded-pill btn btn-success btn-sm col-7"
                                            href="{{ route('partrepair.waitingtable.show', $req->id) }}">To Finish</a>
                                    @elseif($req->progress == 'Finish')
                                        <a class="rounded-pill btn btn-success btn-sm col-7"
                                            href="{{ route('partrepair.waitingtable.show', $req->id) }}">Finished</a>
                                    @endif

                                    <button type="button" class="rounded-pill btn btn-danger btn-sm col-5"
                                        data-bs-toggle="modal" data-bs-target="#modaldelete{{ $req->id }}">
                                        Delete
                                    </button>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.waitingtable.destroy', $req->id]]) }}
                                    <div class="modal fade" id="modaldelete{{ $req->id }}" tabindex="-1"
                                        aria-labelledby="modaldeleteLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modaldeleteLabel">Yakin mau di delete?
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <input type="hidden" name="deleted_by"
                                                        value="{{ Auth::user()->name }}">

                                                    <div class="form-group position-relative has-icon-left mb-4">
                                                        <input type="text" id="reason" name="reason"
                                                            class="form-control form-control-xl" placeholder="reason"
                                                            value="{{ old('reason') }}">
                                                        <div class="form-control-icon">

                                                            @if ($errors->has('reason'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('reason') }}</strong>
                                                                </span>
                                                            @endif


                                                            <i class="bi bi-c-circle"></i>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                    {{ Form::close() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
@endsection




























@section('script')
    @if ($message = Session::get('success'))
        <script>
            Toastify({
                text: "{{ $message }}",
                duration: 2500,
                close: true,
                gravity: "top",
                position: "center",
                backgroundColor: "#4fbe87",
            }).showToast()
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                order: [
                    [0, 'desc']
                ],

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable();

            $('#allinput').click(function() {
                table.column(7).search('').draw();
            });
            $('#waiting').click(function() {
                table.column(7).search('waiting').draw();
            });
            $('#progress').click(function() {
                table.column(7).search('progress').draw();
            });
            $('#sealkit').click(function() {
                table.column(7).search('Seal Kit').draw();
            });
            $('#trial').click(function() {
                table.column(7).search('Trial').draw();
            });
            $('#finish').click(function() {
                table.column(7).search('Finish').draw();
            });
        });
    </script>
@endsection
