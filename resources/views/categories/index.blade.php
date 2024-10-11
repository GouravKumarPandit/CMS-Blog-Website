@extends('layouts.index')

@section('stylesheet')
    <link href='//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css'>
    <style>
        label {
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 1rem
        }

        .ck-editor__editable p {
            max-height: 200px;
            /* Adjust the height as needed */
        }

        .ck-editor__editable {
            display: block;
            color: black;
            font-weight: 600;
        }

        button,
        [type=button],
        [type=reset],
        [type=submit] {
            -webkit-appearance: button;
            width: 50px;
        }

        a.btn,
        button.btn {
            width: 150px !important;
            white-space: nowrap !important
        }

        .dt-input{
            padding: 3px;
            border-radius: 3px;
        }
    </style>
@endsection

@section('main')
    <div class="container col-md-10">
        @include('includes.top-bar-actions')

        <div class="card mt-5" style="background-color: rgba(223,223,223, 0.9); ">
            <div class="card-body">
                <div class="contact-form">
					<h2 class=" d-flex justify-content-between" style="border-bottom: 1px solid black">
                        <span class="text-dark fw-bold">All Categories</span>
                        <a href="{{ route('category.create') }}" class='btn btn-sm btn-info mb-3'><i class="fas fa-plus"></i> Create Category</a>
                    </h2>
                    @if (Session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ Session('status') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped table-hover mb-4 mt-3">
                            <thead>
                                <tr>
                                    <th><b>ID</b></th>
                                    <th><b>Name</b></th>
                                    <th><b>Edit</b></th>
                                    <th><b>Delete</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allCategory as $cat)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td><a href="{{ route('category.edit', $cat) }}" class='btn btn-primary'><i class="fa fa-pen-square"></i> Edit</a></td>
                                        <td>
                                            <form action="{{ route('category.delete', $cat) }}" method='POST'>
                                                @csrf @method('delete')
                                                <button type="submit" class='btn btn-danger'><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
