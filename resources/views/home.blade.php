@extends('layouts.index')
@section('stylesheet')
    <style>
        a {
            white-space: nowrap !important
        }
    </style>
@endsection

@section('main')
    <div class="container" style='margin-top:150px'>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: rgba(223,223,223, 0.9);">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::check())
                            Welcome, {{ Auth::user()->name }}!
                        @else
                            Please log in to view this content.
                        @endif

                        <div class="container mt-5" style='max-width: 1200px;'>
                            <div class="row mb-3 mt-3">
                                <div class="col-4 mb-3"> 
                                    <a href="{{ route('blog.create') }}" class='btn btn-success'><i class="fas fa-plus"></i> Create Post</a>
                                </div>
                                <div class="col-4 mb-3"> 
                                    <a href="{{ route('home.mypost') }}" class='btn btn-info'><i class="fas fa-blog"></i> My Posts</a>
                                </div>
                                <div class="col-4 mb-3"> 
                                    <a href="{{ route('category.create') }}" class='btn btn-primary'><i class="fas fa-plus"></i> Create Category</a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('category.index') }}" class='btn btn-warning'><i class="fas fa-list"></i> Categories List</a>
                                </div>
                                <div class="col-4">
                                    <form action="/logout" method="post">
                                        @csrf 
                                        <button type="submit" class='btn btn-danger'><i class="fas fa-sign-out-alt"></i> Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
