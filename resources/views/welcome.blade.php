@extends('layouts.index')

@section('main')
	<header class="header">
		<div class="header-text">
			<h1>CMS Blog</h1>
			<h4>Home of verified news...</h4>
            <a class="text-info" style="text-decoration: underline !important;" href="{{ route('blog.create') }}">Create Your POST</a>
		</div>
		<div class="overlay"></div>
	</header>
    <main class="container">
		<h2 class="header-title">Latest Blog Posts</h2>
		<section class="cards-blog latest-blog">
            @foreach ($allPosts as $posts)
                <div class="card-blog-content px-3 rounded" style="background-color: rgba(223,223,223, 0.9); ">
                    <img src="{{ $posts->imagePath }}" alt="" />
                    <p>
						<i class="fa fa-clock"></i> {{ $posts->created_at->diffForHumans() }}
						<span><i class="fa fa-pen-nib"></i> Written By {{ $posts->user->name }} </span>
                    </p>
                    <h4>
                        <a href="{{ route('blog.single', $posts) }}" class="text-dark"> {{ $posts->title }} </a>
                    </h4>
                </div>
            @endforeach
        </section>
    </main>
@endsection
