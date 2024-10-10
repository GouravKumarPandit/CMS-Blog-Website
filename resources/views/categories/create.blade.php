@extends('layouts.index')

@section('stylesheet')
    <style>
        label {
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 1rem
        }

    </style>
@endsection

@section('main')
    <div class="container col-md-8" style='margin-top:50px'>
        <div class="card" style="background-color: rgb(223,223,223); ">
            <div class="card-body">
                <div class="contact-form">
                    <h2 class=" d-flex justify-content-between" style="border-bottom: 1px solid black">
                        <span class="text-dark fw-bold">Create Category</span>
                        <a href="{{ route('category.index') }}" class='btn btn-sm btn-info mb-3'><i class="fas fa-list"></i> All Category</a>
                    </h2>
                    @if (Session('status'))
                        <p style="background: green;color:white;padding:1rem "> {{ Session('status') }} </p>
                    @endif
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        <label for="name"><span class="text-dark">Name</span></label>
                        <input type="text" id="name" name="name" class='form-control' placeholder="Category Name"
                            value="{{ old('name') }}" />
                        @error('name')
                            {{-- The $attributeValue field is/must be $validationRule --}}
                            <p style="color: red; margin-bottom: 0px;">{{ $message }}</p>
                        @enderror

                        <button type="submit" value="Create" class='btn btn-primary mt-3 '><i class="fas fa-plus"></i> Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('script')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
