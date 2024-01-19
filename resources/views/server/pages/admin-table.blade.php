@extends('server.layouts.masterlayout')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <div class="card">
        <div class="card-body">

            <form action="{{ url('/calculator/search') }}" method="get">
                @csrf
                <div class="input-group mb-3">
                    <div class="form-group-feedback form-group-feedback-left">
                        <input type="search" name="search" class="form-control form-control-lg"
                            placeholder="Search by From ID or Destination">
                        {{-- <input type="hidden" name="token"  value="{{request()->route('token')}}"> --}}
                        <div class="form-control-feedback form-control-feedback-lg">
                            <i class="icon-search4 text-muted"></i>
                        </div>
                    </div>

                    <div class="input-group-append ms-2">
                        <button type="submit" class="btn btn-warning btn-lg">Search</button>
                    </div>
                </div>


            </form>
        </div>
    </div>





    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Admin's Table</h4>
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Delete</th>
                            {{-- <th scope="col">Show</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr class="table-info">
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->admin_name }}</td>
                                <td>{{ $admin->designation }}</td>
                                <td>{{ $admin->phone }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <form action="{{ route('admin.destroy') }}" method="get">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $admin->id }}">
                                        <button class="btn btn-sm btn-danger" type="submit"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>


                                {{-- <td>
                                    <a href="{{ route('calculator.show', $calculate->id) }}" class="btn btn-info">
                                        Show
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('calculator.edit', $calculate->id) }}" class="btn btn-success"
                                        style="margin-left: 10px;">
                                        Update
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route('calculator.destroy', $calculate->id) }}" method="post"
                                        style="margin-left: 10px;">
                                        @csrf
                                        @method ('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $admins->onEachSide(1)->links() }}
            </div>
        </div>
    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
