@extends('layouts.index')

@section('stylesheet')
    <style>
        h4 {
            display: flex;
            width: 100%;
            justify-content: space-between;
            align-items: center;
        }

        h4 .links {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h4 .links form {
            margin-left: 15px
        }
    </style>
@endsection
@section('main')
	<main class="container">
		@include('includes.top-bar-actions')
	
        <h2 class="header-title">All My Posts</h2>
        @if (Session('status'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>{{ Session('status') }}</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
        @endif

        <section class="cards-blog latest-blog">
            @foreach ($allPosts as $posts)
                @if (auth()->check() && auth()->user()->id === $posts->user->id)
                    <div class="card-blog-content px-3 rounded" style="background-color: rgba(223,223,223, 0.9); ">
                        <img src="{{ asset($posts->imagePath) }}" alt="" />
                        <p>
                            <i class="fa fa-clock"></i> {{ $posts->created_at->diffForHumans() }}
                            <span><i class="fa fa-pen-nib"></i> Written By {{ $posts->user->name }} </span>
                        </p>
                        <h4><a href="{{ route('blog.single', $posts) }}" class="text-dark"> {{ $posts->title }} </a></h4>
						@auth
							@if (auth()->check() && auth()->user()->id === $posts->user->id)
								<div class="links d-flex pb-3" style="width: 220px;">
									<a href="{{ route('blog.edit', $posts) }}" class='btn btn-sm btn-primary'><i class="fa fa-pen-square"></i> Edit</a>
									<form action="{{ route('blog.delete', $posts) }}" method='POST'>
										@csrf
										@method('DELETE')

										<!-- <a href="javascript:void(0)" type='submit' value='Delete' class='btn btn-danger'>Delete</a> -->
										<button type="submit" class="btn btn-sm btn-danger mx-2"><i class="fa fa-trash"></i> Delete</button>
									</form>
								</div>
							@endif
						@endauth
                    </div>
                @endif
            @endforeach
        </section>
    @endsection
