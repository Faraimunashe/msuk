<x-app-layout>
    <div class="pagetitle">
        <h1>Check In</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Check In</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <form action="" method="GET" class="row">
                <div class="col-9">
                    <div class="input-group has-validation">
                        <input type="text" name="search" class="form-control" id="yourUsername" placeholder="Student Reg Number" required>
                        <div class="invalid-feedback">Please enter your regnum.</div>
                    </div>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" type="submit">Find student</button>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <x-alert />
            </div>
        </div>
        @if(!is_null($student))
            <div class="row">
                <div class="col-12">
                    <form action="" method="GET" class="card">
                        <div class="card-header font-weight-bold">
                            Student Details
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Regnum</th>
                                        <th>Program</th>
                                        <th>Barcode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="font-weight-bold h4">{{$student->name}}</span>
                                        </td>

                                        <td>
                                            {{$student->reg_num}}
                                        </td>
                                        <td>
                                            {{$student->program}}
                                        </td>
                                        <td>
                                             {{$student->barcode}}                           
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success" style="float: right;" type="button" data-bs-toggle="modal" data-bs-target="#addBarCode">Proceed to checkout</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal fade" id="addBarCode" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{route('check-in')}}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">Check Out Book</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <input type="hidden" name="reg_num" value="{{$student->reg_num}}" required>
                            <div class="modal-body">
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label">Barcode</label>
                                    <input type="text" name="barcode" class="form-control" id="inputNanme4" placeholder="Scan barcode ..." auto-focus required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save checkin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </section>
</x-app-layout>
