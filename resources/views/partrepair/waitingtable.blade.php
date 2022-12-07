@extends('layouts.app')



@section('content')
    @if ($message = Session::get('success'))
        <h6 class="alert alert-success">
            {{ $message }}
        </h6>
    @endif
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
                <a class="me-2">Flow Repair : </a>
                <a class="rounded-pill bg-secondary text-dark text-center px-2">Waiting</a>
                <a class="px-2"><i class="fa-solid fa-arrow-right"></i></a>
                <a class="rounded-pill bg-info text-dark text-center px-2">Seal Kit</a>
                <a class="px-2"><i class="fa-solid fa-arrow-right"></i></a>
                <a class="rounded-pill bg-warning text-dark text-center px-2">On Progress</a>
                <a class="px-2"><i class="fa-solid fa-arrow-right"></i></a>
                <a class="rounded-pill bg-primary text-dark text-center px-2">Trial</a>
                <a class="px-2"><i class="fa-solid fa-arrow-right"></i></a>
                <a class="rounded-pill bg-success text-dark text-center px-2">Finish</a>
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
                                <td>{{ $req->reg_sp }}</td>
                                <td>{{ $req->date }}</td>
                                <td>{{ $req->item_name }}</td>
                                <td>{{ $req->problem }}</td>
                                <td>{{ $req->status_repair }}</td>
                                <td><a class="rounded-pill bg-secondary text-dark text-center px-2">{{ $req->progress }}</a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-success"
                                        href="{{ route('partrepair.waitingtable.show', $req->id) }}">PROGRESS</a>
                                    {{ Form::open(['method' => 'DELETE', 'route' => ['partrepair.waitingtable.destroy', $req->id], 'style' => 'display:inline']) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
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
