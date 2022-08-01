@extends('frontend.layouts.master')
@section('Blog Detail')
About
@endsection
@section('meta'){{ $blog->meta }}@endsection
@section('header')
@include('frontend.blog_detail_header')
@endsection

@section('content')
	<!-- Post Content-->
	<article class="mb-4">
		<div class="container px-4 px-lg-5">
			<div class="row gx-4 gx-lg-5 justify-content-center">
				<div class="col-md-10 col-lg-8 col-xl-7">
					<blockquote class="blockquote">
					{{ $blog->short_description }}
					</blockquote>
					<div class="text-center">
					<a href="#">
						<img class="img-fluid rounded" src="{{ asset('/images/blogImages/'.$blog->image) }}" alt="{{ $blog->image_alt ?? '' }}" />
					</a>
					</div>
					<p>{!! $blog->description ?? '' !!}</p>
					{{-- <a href="#!"><img class="img-fluid" src="assets/img/post-sample-image.jpg" alt="..." /></a> --}}
					{{-- <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span> --}}
					{{-- <p>
						Placeholder text by
						<a href="http://spaceipsum.com/">Space Ipsum</a>
						&middot; Images by
						<a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>
					</p> --}}
				</div>
			</div>
		</div>
	</article>
@endsection