@extends('backend.layouts.master')
@section('title') Approved Blogs @endsection
@section('styles')
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/bootstrap.css') }}">
@endsection
@section('content')
	<div class="container-fluid">
		{{-- Page Heading --}}
		<h1 class="h3 mb-4 text-gray-800">Approved Blogs</h1>
	</div>
	{{-- Basic Card Example --}}
	<div class="row">
		<div class="col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
					<h6 class="m-0 font-weight-bold text-primary d-inline-block">Approved Blogs</h6>
					<!-- Button trigger modal -->
					{{-- <a href="{{ url('/createBlog') }}" class="btn btn-success"> Add Blog </a> --}}
				</div>
				<div class="card-body">
					<table class="table table-striped table-bordered w-100" id="approved">
					 {{-- id="awaiting" Ep_30(09:22) --}}
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">User</th>
								<th scope="col">Category</th>
								{{-- <th scope="col">Tags</th> --}}
								<th scope="col">Title</th>
								<th scope="col">Short Description</th>
								{{-- <th scope="col">Description</th> --}}
								<th scope="col">Status</th>
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
	{{-- @include('backend.partials.blogspartials') --}}
@endsection
@section('scripts')
	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="{{ asset('backend/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
	<script src="{{ asset('backend/partials/approved.js') }}" type="text/javascript"></script>
	{{-- <script type="text/javascript">
		// Success Swal
		var success = "{{ session('success') ?? '' }}"; //success msg hai to Ok else assign emply '??' mean
		setTimeout(function(){
			if(success !== ''){
				Swal.fire({
					icon : 'success',
					title : 'Success',
					text : 'Blog Updated Successfully.',
				})
			}
		},500); //Time should be in milliseconds
	</script> --}}
@endsection