@extends('backend.layouts.master')
@section('title') CreateBlog @endsection
@section('styles')
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('backend/select2.min.css') }}">
	<style type="text/css">
		.ck-editor__editable {
			height: 300px;
		}
		/* .select2-selection.select2-selection--multiple {
			padding: 0.375rem 0.50rem;
			line-height: 1.0;
		} */
	</style>
@endsection
@section('content')
	
	<div class="container-fluid">
	{{-- To Check Errors Start --}}
	{{-- @if($errors)
	@foreach($errors->all() as $error => $errorr)
	<span class="text-danger"> <b>{{ $error }} >  </b>{{ $errorr }}</span><br />
	@endforeach
	@endif --}}
	{{-- To Check Errors End --}}
	
		{{-- Page Heading --}}
		<h1 class="h3 mb-4 text-gray-800">Create Blog
			<a href="{{ url('/blogs') }}" class="d-block btn btn-primary btn-sm float-right">Return to Blogs</a>
		</h1>
	</div>
	{{-- Basic Card Example --}}
	
	<div class="row">
	    <div class="col-xl-12 col-lg-8">
	        <div class="card shadow mb-4">
	        	
	        	@if (count($errors) !=0)
	        	@if (count($errors) ==1)
	        	<div class="alert alert-danger text-center"> There is 1 error in the form please correct the error to proceed. </div>
	        	@else
	        	<div class="alert alert-danger text-center">There are {{ count($errors) }} errors in the form please correct the errors to proceed.</div>
	        	@endif
	        	@endif
	        	
	            <div class="card-body">
					<form action="{{ url('/blogCreate') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					    @csrf
					    <div class="form-row">
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="title" class="ml-2">Blog Title</label>
					            <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control" value="" placeholder="My First Blog">
					            @if ($errors->has('title'))
					            <small class="text-danger ml-2">{{ $errors->first('title') }}</small>
					            @endif
					        </div>
					        
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="url" class="ml-2">Url</label>
					            <input type="text" name="url" id="url" value="{{old('url')}}" class="form-control" value="" placeholder="My First Blog">
					            @if ($errors->has('url'))
					            <small class="text-danger ml-2">{{ $errors->first('url') }}</small>
					            @endif
					        </div>
					    </div>
					    
					    <div class="form-row">
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="category" class="ml-2">Select Category</label>
					            <select name="category" id="category" value="{{old('category')}}" class="form-control">
					                <option value="">Select Category</option>
					                @foreach ($categories as $category)
					                	<option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
					                @endforeach
					            </select>
					            @if ($errors->has('category'))
					            <small class="text-danger ml-2">{{ $errors->first('category') }}</small>
					            @endif
					        </div>
					        
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="tags" class="ml-2">Select Tags</label>
					            <select name="tags[]" id="tags[]" multiple="multiple" class="form-control tags">
					            	@foreach ($tags as $tag)
					            		{{-- <option {{in_array($tag->id, old("tags") ?: []) ? "selected": ""}} value="{{ $tag->id }}">{{ $tag->name }}</option>}  or--}}
					            		<option @if(old('tags')) {{ in_array($tag->id, old('tags')) ? 'selected' : ''}} @endif value="{{ $tag->id }}">{{ $tag->name }}</option>
					            	@endforeach
					            </select>
					            @if ($errors->has('tags'))
					            <small class="text-danger ml-2">{{ $errors->first('tags') }}</small>
					            @endif
					        </div>
					    </div>
					    
					    <div class="form-row">
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="fileImage" class="ml-2">Upload Image</label>
					            <input type="file" name="fileImage" id="fileImage" value="{{old('fileImage')}}" class="form-control"> {{-- form-control-file --}}
					            @if ($errors->has('fileImage'))
					            <small class="text-danger ml-2">{{ $errors->first('fileImage') }}</small>
					            @endif
					        </div>
					        
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="imageAlt" class="ml-2">Image Alt Text</label>
					            <input type="text" name="imageAlt" id="imageAlt" value="{{old('imageAlt')}}" class="form-control" placeholder="My Home Picture" value="">
					            @if ($errors->has('imageAlt'))
					            <small class="text-danger ml-2">{{ $errors->first('imageAlt') }}</small>
					            @endif
					        </div>
					    </div>
					    
					    <div class="form-row">
					        <div class="form-group col-sm-12">
					            <label for="meta" class="ml-2">Meta Text</label>
					            <input type="text" name="meta" id="meta" value="{{old('meta')}}" class="form-control" placeholder="For Ex : This was my first blog">
					            @if ($errors->has('meta'))
					            <small class="text-danger ml-2">{{ $errors->first('meta') }}</small>
					            @endif
					        </div>
					        
					    </div>
					    <div class="form-row">
					        <div class="form-group col-sm-12">
					            <label for="shortDescription" class="ml-2">Short Description</label>
					            <textarea type="text" name="shortDescription" id="shortDescription" value="" class="form-control"{{--  rows="5" or--}} style="height: 150px;" placeholder="For Ex : This was my first blog">{{old('shortDescription')}}</textarea>
					            @if ($errors->has('shortDescription'))
					            <small class="text-danger ml-2">{{ $errors->first('shortDescription') }}</small>
					            @endif
					        </div>
					    </div>
					    <div class="form-row">
					        <div class="form-group col-sm-12">
					            <label for="description" class="ml-2">Description</label>
					            <textarea name="description" id="description" value="" class="form-control">{{old('description')}}</textarea>
					            @if ($errors->has('description'))
					            <small class="text-danger ml-2">{{ $errors->first('description') }}</small>
					            @endif
					        </div>
					    </div>
					    <div class="form-check mb-2">
					    	{{-- <input type="checkbox" name="active" id="active" class="form-check-input" checked=""> --}}
					    	{{-- <input type="checkbox" name="active" id="active" class="form-check-input" value="on" {{ (empty(old('active')) ? 'checked' : '') }}> --}}
					    	<input type="checkbox" name="active" id="active" class="form-check-input" value="on" {{! (old('active')) ? 'checked' : '' }}>
					    	{{-- <input type="checkbox" name="active" id="active" class="form-check-input" {{(empty(old('active'))) ? '' : 'checked' }}> --}}
					    	<label for="active" class="form-check-label">Publish Blog</label>
					    </div>
					    <button type="submit" class="btn btn-success">Create</button>
					</form>
					
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
	{{-- <script src="{{ asset('backend/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script> --}}
	<script src="{{ asset('backend/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('backend/select2.full.min.js') }}" type="text/javascript"></script>
	<script type="text/javascript" src="{{ asset('backend/cKEditor5/cKEditor.min.js') }}"></script>
	<script type="text/javascript">
		$(".tags").select2({
			placeholder: "Select Tag(s)"
		});
		// CKEditor5
		ClassicEditor
		.create( document.querySelector( '#description' ) )
		.then( editor => {
			console.log( editor );
		} )
		.catch( error => {
			console.error( error );
		} );
		
		// Success Swal
		var success = "{{ session('success') ?? '' }}"; //success msg hai to Ok else assign emply '??' mean
		setTimeout(function(){
			if(success !== ''){
				Swal.fire({
					icon : 'success',
					title : 'Success',
					text : 'Blog Created Successfully.',
				})
			}
		},500); //Time should be in milliseconds
	</script>
	{{-- <script src="{{ asset('backend/partials/blog.js') }}" type="text/javascript"></script> --}}
@endsection