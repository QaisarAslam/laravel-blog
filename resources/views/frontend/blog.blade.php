@extends('frontend.layouts.master')
@section('title') Blog @endsection

@section('styles') @endsection

@section('header') @include('frontend.blog_header') @endsection

@section('content')
<!-- Page Main Content Start -->
			<div class="container px-4 px-lg-5">
			    <div class="row gx-4 gx-lg-5 justify-content-center">
			        <div class="col-md-10 col-lg-8 col-xl-7">
			            <!-- Post preview-->
			            {{-- @for ($i = 0; $i < 2 ; $i++) --}}
			            @foreach ($blogs as $blog)
			            {{-- <div class="post-preview">
			                <a href="{{ url('/blog_detail') }}">
			                    <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
			                    <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
			                </a>
			                <p class="post-meta">
			                    Posted by
			                    <a href="#!">Start Bootstrap</a>
			                    on September 24, 2021
			                </p>
			            </div> --}}
			            <div class="post-preview">
			                {{-- <a href="{{ url('/blogDetails') }}"> --}}
			                <a href="{{ url('blog/'.$blog->url) }}">
			                    <h2 class="post-title">{!! $blog->title ?? '' !!}</h2>
			                    {{-- <h3 class="post-subtitle">{{ Str::limit($blog->short_description, 20, ' Read More+') }}</h3> --}} {{-- 23:06 Restrict Short_Description --}}
			                    {{-- <h3 class="post-subtitle">{{ Str::words($blog->short_description, 20, ' Read More+') }}</h3> --}} {{-- 23:06 Restrict Short_Description --}}
			                    <h3 class="post-subtitle">{!! Str::words($blog->short_description, 20, '<br /><small>Read More...</small>') !!}</h3> {{-- 23:06 Restrict Short_Description --}}
			                </a>
			                <p class="post-meta">
			                    Posted by
			                    <a href="javascript:void(0)">{{ $blog->user->name }}</a>
			                    {{-- <a href="#!">{{ $blog->user->name }}</a> the href="#!" is used as a hack to call a javascript function that uses the data-target attribute when pressed on the <a> tag instead of the <button> tag which is usually used. --}}
			                    {{-- <a href="#">{{ $blog->user->name }}</a> --}}
			                    {{-- on {{ $blog->created_at }} or below --}}
			                    {{-- on {{ Carbon\Carbon::parse($blog->created_at)->format('d-M-Y') }} or below --}}
			                    on <u class="text-dark">{{ Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</u>
			                </p>{{-- Ep_24(19:10) about Carbon --}}
			            </div>
			            <!-- Divider-->
			            @if(!$loop->last) {{-- Ep_24(11:40) --}}
			            <hr class="my-4" />
			            @endif
			            @endforeach
			            {{-- @endfor --}}
			            <!-- Pager--> {{-- Ep_24(19:52) Pagination --}}
			            <div class="col-12">
			            	<nav aria-label="pagination">
			            		<ul class='pagination justify-content-center'>
		            				{{ $blogs->links() }}
			            		</ul>
			            	</nav>
			            </div>
			            {{-- <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div> --}} {{-- → or &rarr; --}}
			        </div>
			    </div>
			</div>
		<!-- Page Main Content End -->
@endsection

@section('scripts')
@endsection
