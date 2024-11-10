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

        .paginationBody {
            margin: 0 auto;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection
@section('main')
    <main class="container rounded mb-4" style="background-color: rgba(225,226,220, 0.9);">
        <h2 class="header-title pt-4">All Blog Posts</h2>
        <div class="searchbar">
            <form action="">
                <input type="text" placeholder="Search..." name="search" />
                <button type="submit" class="px-3 rounded"><i class="fa fa-search"></i></button>
            </form>
        </div>
        @if (Session('status'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>{{ Session('status') }}</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
        @endif
        @if(!count($allPosts))
            <div class="col-12 border px-auto">
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                    <strong>NO POST FOUND!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="categories">
            <ul class="">
                @foreach ($fullCategory as $category)
                    <li>
                        <a href="{{ route('blog.index', ['category' => $category->name]) }}" class="rounded">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div> 
        <div class="horizontal-line-darker"></div>
        <section class="cards-blog latest-blog mt-5">
            @forelse($allPosts as $posts)
                <div class="card-blog-content">
                    <img src="{{ asset($posts->imagePath) }}" alt="" />
                    <p>
                        {{ $posts->created_at->diffForHumans() }}
                        <span>Written By {{ $posts->user->name }} </span>
                    </p>
                    <h4>
                        <a href="{{ route('blog.single', $posts) }}"> {{ $posts->title }} </a>
                        @auth
                            @if (auth()->check() && auth()->user()->id === $posts->user->id)
                                <div class="links">
                                    <a href="{{ route('blog.edit', $posts) }}" class='btn btn-primary'>Edit</a>
                                    <form action="{{ route('blog.delete', $posts) }}" method='POST'>
                                        @csrf
                                        @method('DELETE')

                                        <!-- <a href="javascript:void(0)" type='submit' value='Delete' class='btn btn-danger'>Delete</a> -->
                                        <button type="submit" class="btn btn-danger">Delete</button>

                                    </form>
                                </div>
                            @endif
                        @endauth
                    </h4>
                </div>
            @empty
                
            @endforelse
        </section>
        <div class='paginationBody'>
            {{ $allPosts->links('pagination::default') }}
        </div>
    @endsection
