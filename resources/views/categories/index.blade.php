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
    </style>
@endsection

@section('main')
    <div class="container col-md-10" style='margin-top:50px'>
        <div class="card">
            <div class="card-body">
                <div class="contact-form">
					<h2 class=" d-flex justify-content-between" style="border-bottom: 1px solid black">
                        <span class="text-dark fw-bold">All Categories</span>
                        <a href="{{ route('category.create') }}" class='btn btn-sm btn-info mb-3'><i class="fas fa-plus"></i> Create Category</a>
                    </h2>
                    @if (Session('status'))
                        <p style="background: green;color:white;padding:1rem "> {{ Session('status') }} </p>
                    @endif

                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCategory as $cat)
                                <tr>
                                    <td>{{ $cat->name }}</td>
                                    <td><a href="{{ route('category.edit', $cat) }}" class='btn btn-primary'><i class="fa-regular fa-pen-to-square"></i> Edit</a></td>
                                    <td>
                                        <form action="{{ route('category.delete', $cat) }}" method='POST'>
                                            @csrf @method('delete')
                                            <button type="submit" class='btn btn-danger'><i class="fa-solid fa-trash-can"></i> Delete</button>
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
@endsection




@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
