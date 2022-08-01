@extends('frontend.layouts.master')
@section('title')
About
@endsection

@section('header')
@include('frontend.about_header')
@endsection

@section('content')
	<!-- Main Content Start-->
		<main class="mb-4">
			<div class="container px-4 px-lg-5">
				<div class="row gx-4 gx-lg-5 justify-content-center">
					<div class="col-md-10 col-lg-8 col-xl-7">
						<p>{{ $about->about_description }}</p>
					</div>
				</div>
			</div>
		</main>
	<!-- Main Content Start-->
@endsection
@section('scripts')
@endsection