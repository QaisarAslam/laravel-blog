	<!-- Navigation Start -->
		<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
		<div class="container px-4 px-lg-5">
			<a class="navbar-brand" href="{{ url('/') }}">Start Bootstrap</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			Menu
			<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ms-auto py-4 py-lg-0">
				{{-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.html">Home</a></li> --}}
				@if(Auth::check())
					@foreach (Auth::user()->roles as $role)
						@if ($role->id == 1)
							<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/dashboard') }}">{{ Auth::user()->name }}</a></li>
							{{-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/blogs') }}">Blogs</a></li> --}}
						@else
							<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/user/dashboard') }}">{{ Auth::user()->name }}</a></li>
						@endif
					@endforeach
				@endif
				<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/') }}">Blog</a></li>
				<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/aboutUs') }}">About</a></li>
				{{-- <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/blog_detail') }}">Sample Post</a></li> --}}
				<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/contactUs') }}">Contact</a></li>
				@if(!Auth::check())
					<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/login') }}">Login</a></li>
					<li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ url('/register') }}">Register</a></li>
				@else
					<li class="nav-item">
					    <a class="nav-link px-lg-3 py-3 py-lg-4"
					        href="{{ route('logout') }}"
					        onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
					        {{ __('Logout') }}
					    </a>
					    <form id="logout-form"
					        action="{{ route('logout') }}"
					        method="POST"
					        class="d-none">
					        @csrf
					    </form>
					</li>
				@endif

			</ul>
			</div>
		</div>
		</nav>
	<!-- Navigation End -->