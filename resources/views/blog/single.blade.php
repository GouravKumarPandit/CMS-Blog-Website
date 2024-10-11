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

		.about-text p{
			color: black !important;
			font-weight: 500;
		}

		.time-and-author{
			color: black;
			font-weight: 500 !important;
		}
    </style>
@endsection

@section('main')
    <main class="container">
		@include('includes.top-bar-actions')
		
		<section class="single-blog-post">
			<h1> {{ $singlePost->title }}</h1>
			
			<p class="time-and-author d-flex justify-content-between">
				<span><i class="fa fa-clock"></i> {{ $singlePost->created_at->diffForHumans() }}</span>
				<span class="d-flex">
                    <span><i class="fa fa-pen-nib"></i> Written By {{ $singlePost->user->name }} </span>
                    <a href="{{ route('blog.edit', $singlePost->id) }}" class='btn btn-sm btn-primary ms-3'><i class="fa fa-pen-square"></i> Edit</a>
                </span>
			</p>
			
			<div class="single-blog-post-ContentImage" data-aos="fade-left">
				<img src="{{ asset($singlePost->imagePath) }}" alt="" />
			</div>

			<div class="about-text p-3 rounded" style="background-color: rgba(223,223,223, 0.9);">
				{!! $singlePost->body !!}
			</div>
		</section>

        <section class="recommended">
            <p>Related</p>
            <div class="recommended-cards">
                @foreach ($relatedPosts as $post)
                    <a href="{{ $post->slug }}">
                        <div class="recommended-card">
                            <img src="{{ asset($post->imagePath) }}" alt="Blog Image" />
                            <h4>{{ $post->title }}</h4>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    </main>
@endsection
