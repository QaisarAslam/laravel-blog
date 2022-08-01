<!-- Page Header-->
        <header class="masthead" style="background-image: url('frontend/assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1>{!! $blog->title !!}</h1>
                            {{-- <h2 class="subheading">{{ Str::words($blog->short_description, 10, ' Read More') }}</h2> --}}
                            <span class="meta mb-3">Category:
                            	<a href="#!" class="badge bg-success">{{ $blog->category->name ?? '' }}</a>
                            </span>
                            <span class="meta mb-3">Tags:
                            	@foreach ($blog->tags as $tag)
                            	<a href="#!" class="badge bg-success">{{ $tag->name ?? '' }}</a>
                            	@endforeach
                            </span>
                            <span class="meta">
                                Posted by
                                <a href="#!">{{ $blog->user->name ?? '' }}</a>
                                on {{ Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>