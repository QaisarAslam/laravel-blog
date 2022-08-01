@extends('backend.layouts.master')
@section('title')
	Tags
@endsection
@section('styles')
	<!-- Bootstrap CSS -->
	{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/bootstrap.css') }}">
@endsection
@section('content')
	<div class="container-fluid">
		{{-- Page Heading --}}
		<h1 class="h3 mb-4 text-gray-800">Tags</h1>
	</div>
	{{-- Basic Card Example --}}
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary d-inline-block">Tags</h6>
					<!-- Button trigger modal -->
					<a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTagModal">
						Add Tag
					</a>
				</div>
				<div class="card-body">
					<table class="table table-striped table-bordered w-100" id="tags">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Name</th>
								<th scope="col">Created At</th>
								<th scope="col">Updated At</th>
								<th scope="col">Edit</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('custom_modal')
	@include('backend.partials.tagspartials')
@endsection
@section('scripts')
	<!-- Option 1: Bootstrap Bundle with Popper -->
	{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> --}}
	<script src="{{ asset('backend/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
	<script src="{{ asset('backend/partials/tag.js') }}" type="text/javascript"></script>
@endsection