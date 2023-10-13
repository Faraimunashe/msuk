<x-app-layout>
    <div class="pagetitle">
        <h1>Borrowed Books</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Borrowed</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12">
                <x-alert />
            </div>
            <div class="col-md-12">
                <div class="table-responsive text-nowrap">
                    <div class="card">
                        <div class="card-header">
                            <form action="" method="GET" class="row">
                                <div class="input-group">
                                    <input type="text" name="search_borrowed" class="form-control" id="yourUsername" placeholder="Search borrowed books ..." required>
                                </div>
                            </form>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Student Program</th>
                                        <th>Book Barcode</th>
                                        <th>Student Reg Number</th>
                                        <th>Date Borrowed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrowedData as $borrowed)
                                        <tr>
                                            <td>{{$borrowed->id}}</td>
                                            <td>{{$borrowed->name}}</td>
                                            <td>{{$borrowed->program}}</td>
                                            <td>{{$borrowed->barcode}}</td>
                                            <td>{{$borrowed->reg_num}}</td>
                                            <td>{{$borrowed->created_at}}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$borrowedData->links('pagination::bootstrap-5')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>

