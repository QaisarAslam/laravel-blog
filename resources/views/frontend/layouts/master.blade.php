<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="@yield('meta')" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="" />
        <title>@yield('title', 'Clean Blog - Start Bootstrap Theme')</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/favicon.ico') }} " />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
        @yield('styles')
    </head>
    <body>
        {{-- Navigation Start --}}
        @include('frontend.layouts.navbar')
        {{-- Navigation End --}}
        
        {{-- Header Start --}}
        {{-- @yield('frontend.header') --}}
        @yield('header')
        {{-- Header End --}}
        
        {{-- Main Content Start --}}
        {{-- @yield('frontend.content') --}}
        @yield('content')
        {{-- Main Content End --}}
        
        {{-- <img src="http://dummyimage.com/800x600/4d494d/686a82.gif&text=placeholder+image" onerror="this.src='http://dummyimage.com/800x600/4d494d/686a82.gif&text=image+path+not+found'; " alt="placeholder+image" /> --}}
        {{-- Footer Start --}}
        @include('frontend.layouts.footer')
        {{-- Footer End --}}
        
        <!-- Bootstrap core JS-->
        <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('backend/sweetalert2.all.min.js') }}"></script>
        
        <!-- Core theme JS-->
        <script src="{{ asset('frontend/js/scripts.js') }}"></script>
        <script type="text/javascript">
        	$.ajaxSetup({
        		headers : {
        			'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        		}
        	})
        	baseUrl = {!! json_encode(url('/')) !!}
			// alert(baseUrl);
		</script>
        
        @yield('scripts')
    </body>
</html>
