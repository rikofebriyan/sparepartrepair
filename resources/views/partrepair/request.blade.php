@extends('layouts.app')


@section('content')
    <div class="container-fluid">

        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h3 class="accordion-header" id="panelsStayOpen-headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        <H3>
                            <b> SPAREPART REPAIR REQUEST FORM </b>
                        </H3>
                    </button>
                </h3>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">

                        {{ Form::open(['route' => 'partrepair.waitingtable.store', 'method' => 'POST']) }}
                        <div class="container-fluid justify-content-center py-0">
                            <div class="container-fluid">
                                <div class="row gx-3">
                                    <div class="col">
                                        <div class="p-3 border">

                                            <div class="mb-3 row">
                                                <label for="tanggal" class="col-sm-3 col-form-label">Create at</label>
                                                <div class="col-sm-9">
                                                    <input type="datetime-local" class="form-control" id="tanggal"
                                                        value="{{ Carbon\Carbon::now() }}" required disabled>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="nama_pic" class="col-sm-3 col-form-label">nama_pic</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nama_pic"
                                                        name="nama_pic" value="{{ old('nama_pic') }}" required>
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label for="reg_sp" class="col-sm-3 col-form-label">reg_sp</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="reg_sp" name="reg_sp"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="section" class="col-sm-3 col-form-label">section</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="section" name="section"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="line" class="col-sm-3 col-form-label">Line</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="line" name="line"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="machine" class="col-sm-3 col-form-label">machine</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="machine" name="machine"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="item_code" class="col-sm-3 col-form-label">item_code</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="item_code"
                                                        name="item_code" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="item_name" class="col-sm-3 col-form-label">item_name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="item_name"
                                                        name="item_name" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="item_type" class="col-sm-3 col-form-label">item_type</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="item_type"
                                                        name="item_type" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row invisible">
                                                <label for="status_repair"
                                                    class="col-sm-3 col-form-label">status_repair</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="status_repair"
                                                        name="status_repair" value="Waiting" required>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="p-3 border bg-light">

                                            <div class="mb-3 row">
                                                <label for="maker" class="col-sm-3 col-form-label">maker</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="maker"
                                                        name="maker" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="serial_number"
                                                    class="col-sm-3 col-form-label">serial_number</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="serial_number"
                                                        name="serial_number" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="type_of_part"
                                                    class="col-sm-3 col-form-label">type_of_part</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="type_of_part"
                                                        name="type_of_part" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="price" class="col-sm-3 col-form-label">price</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="price"
                                                        name="price" required>
                                                </div>
                                            </div>

                                            <div class="mb-3 row">
                                                <label for="stock_spare_part"
                                                    class="col-sm-3 col-form-label">stock_spare_part</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="stock_spare_part"
                                                        name="stock_spare_part" required>
                                                </div>
                                            </div>


                                            <div class="mb-3 row">
                                                <label for="problem" class="col-sm-3 col-form-label">Problem</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="problem" name="problem" rows="3" required> </textarea>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                                            <a href="{{ route('partrepair.waitingtable.index') }}"
                                                class="btn btn-md btn-secondary">back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the
                        collapse
                        plugin adds the appropriate classes that we use to style each element. These classes control the
                        overall
                        appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                        custom CSS or overriding our default variables. It's also worth noting that just about any HTML can
                        go
                        within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                    aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                        collapse
                        plugin adds the appropriate classes that we use to style each element. These classes control the
                        overall
                        appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                        custom CSS or overriding our default variables. It's also worth noting that just about any HTML can
                        go
                        within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Notifikasi menggunakan flash session data -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
@endsection
