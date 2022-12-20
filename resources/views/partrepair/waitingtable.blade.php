@extends('layouts.app')



@section('content')
    {{-- @if ($message = Session::get('success'))
        <h6 class="alert alert-success">
            {{ $message }}
        </h6>
    @endif --}}
    <CENTER>
        <div class="container-fluid">
            <H2>PART REPAIR : WAITING TABLE </H2>
        </div>
    </CENTER>


    <div class="card border-0 shadow rounded overflow-auto">
        <div class="card-body">
            {{-- <a href="#" class="btn btn-md btn-success mb-3 float-right">New
                Post</a> --}}
            <div class="d-flex d-inline justify-content-end mb-3">
                <div class="me-2">Flow Repair : </div>
                <div class="rounded-pill bg-secondary text-white text-center px-2">Waiting</div>
                <div class="px-2"><i class="fa-solid fa-arrow-right"></i></div>
                <div class="rounded-pill bg-warning text-white text-center px-2">On Progress</div>
                <div class="px-2"><i class="fa-solid fa-arrow-right"></i></div>
                <div class="rounded-pill bg-info text-white text-center px-2">Seal Kit</div>
                <div class="px-2"><i class="fa-solid fa-arrow-right"></i></div>
                <div class="rounded-pill bg-primary text-white text-center px-2">Trial</div>
                <div class="px-2"><i class="fa-solid fa-arrow-right"></i></div>
                <div class="rounded-pill bg-success text-white text-center px-2">Finish</div>
            </div>
            <div class="table-responsive-sm">
                <table id="myTable" class="table table-striped nowrap overflow-auto display">
                    {{-- <thead>
                        <tr>
                            <th scope="col">Ticket No</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Spare Part</th>
                            <th scope="col">Problem</th>
                            <th scope="col">Status Repair</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 0; $i < 20; $i++)
                            <tr>
                                <td>RE202211300001</td>
                                <td>30 Nov 2022</td>
                                <td>CYL0000001 | Cylinder | MHL2-35Z | SMC</td>
                                <td>Bocor pada sealkit bagian depan</td>
                                <td>Urgent</td>
                                <td>
                                    <a class="rounded-pill bg-secondary text-dark text-center px-2">Waiting</a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-success"
                                        href="{{ route('partrepair.progresstrial.show', '2') }}">Progress</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.waitingtable.destroy', '2'], 'style' => 'display:inline']) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endfor
                    </tbody> --}}
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ticket No</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Spare Part</th>
                            <th scope="col">Problem</th>
                            <th scope="col">Status Repair</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reqtzy as $req)
                            <tr>
                                <td>{{ $req->id }}</td>
                                <td>{{ $req->reg_sp }}</td>
                                <td>{{ $req->date }}</td>
                                <td>{{ $req->item_name }}</td>
                                <td>{{ $req->problem }}</td>
                                <td>{{ $req->status_repair }}</td>
                                <td>
                                    @if ($req->progress == 'Waiting')
                                        <div class="rounded-pill bg-secondary text-white text-center px-2">
                                            {{ $req->progress }}</div>
                                    @elseif ($req->progress == 'On Progress')
                                        <div class="rounded-pill bg-warning text-white text-center px-2">
                                            {{ $req->progress }}
                                        </div>
                                    @elseif ($req->progress == 'Seal Kit')
                                        <div class="rounded-pill bg-info text-white text-center px-2">{{ $req->progress }}
                                        </div>
                                    @elseif ($req->progress == 'Trial')
                                        <div class="rounded-pill bg-primary text-white text-center px-2">
                                            {{ $req->progress }}</div>
                                    @elseif ($req->progress == 'Finish')
                                        <div class="rounded-pill bg-success text-white text-center px-2">
                                            {{ $req->progress }}</div>
                                    @endif

                                </td>
                                <td class="text-center">
                                    @if ($req->progress == 'Waiting')
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('partrepair.waitingtable.show', $req->id) }}">To Progress</a>
                                    @elseif($req->progress == 'On Progress')
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('partrepair.progresstable.show', $req->id) }}">To Seal Kit</a>
                                    @elseif($req->progress == 'Seal Kit')
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('partrepair.progresstrial.show', $req->id) }}">To Trial</a>
                                    @elseif($req->progress == 'Trial')
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('partrepair.finishrepair.show', $req->id) }}">To Finish</a>
                                    @elseif($req->progress == 'Finish')
                                        <a class="btn btn-success btn-sm">Finished</a>
                                    @endif

                                    {{-- <a class="btn btn-success"
                                        href="{{ route('partrepair.waitingtable.show', $req->id) }}">PROGRESS</a> --}}
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.waitingtable.destroy', $req->id], 'style' => 'display:inline']) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
                                    {{ Form::close() }}
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
@endsection
