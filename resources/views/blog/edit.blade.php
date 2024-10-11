@extends('layouts.index')

@section('stylesheet')
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
        .ck-editor__editable {
            min-height: 200px;
        }
    </style>
@endsection

@section('main')
    <div class="container">
        @include('includes.top-bar-actions')
    </div>
    <div class="container py-4 rounded" style='background-color: rgba(223,223,223, 0.9); margin-top:50px; width: 80%'>
        <div class="contact-form" style="margin-left: 20px; margin-right: 20px; ">
            <h2 class="text-dark" style="border-bottom: 1px solid black">
                Edit Post
                <button title="Back" onclick="document.location ='{{ url()->previous() }}'" class='btn btn-sm btn-primary float-end'><i class="fa fa-reply"></i></button>
            </h2>
            @if (Session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session('status') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <span class="text-smaller">Fields marked with <span style="color:red;">*</span> are mandatory</span>
            <form action="{{ route('blog.update', $editPost) }}" method="post" enctype="multipart/form-data">
                @csrf @method('put')
                <label for="title" class="required-field"><span class="text-dark fw-bold">Title</span></label>
                <input type="text" id="title" name="title" class='form-control' value="{{ $editPost->title }}" required />
                @error('title')
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color: red; ">{{ $message }}</p>
                @enderror
                <!-- Image -->
                <label for="image" class="required-field"><span class="text-dark fw-bold">Image</span></label>
                <input type="file" id="image" name="image" class='form-control' required />
                @error('image')
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color: red; ">{{ $message }}</p>
                @enderror

                <!-- Drop down -->
                <label for="categories" class="required-field"><span class="text-dark fw-bold">Choose a category:</span></label>
                <select name="category_id" id="categories" class='form-control form-select' required>
                    <option selected disabled>Select option </option>
                    @foreach ($ddCat as $dd)
                        <option value="{{ $dd->id }}" @if($dd->id == $editPost->category_id) selected @endif>{{ $dd->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color: red; ">{{ $category_id }}</p>
                @enderror

                <!-- Body-->
                <label for="body" class="required-field"><span class="text-dark fw-bold">Body</span></label>
                @error('body')
                    {{-- The $attributeValue field is/must be $validationRule --}}
                    <p style="color: red; ">{{ $message }}</p>
                @enderror
                <textarea id="body" name="body" class='form-control' placeholder="Write your thought here..." rows='6'>@if($editPost->body){{ $editPost->body }}@endif</textarea>
                <!-- Button -->
                <input type="submit" value="Edit Post" class='btn btn-warning mt-3' />
            </form>
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
