@extends('backend.layouts.master')
@section('title') CMS @endsection
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/bootstrap.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <!--  Page Heading -->
    <h1 class="h3 mb-4 ms-1 text-gray-800">CMS</h1>
    <!-- Collapsable Card Example -->
    @include('backend.partials.aboutForm')
    @include('backend.partials.contactForm')
    @include('backend.partials.footerForm')
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('/backend/partials/about.js') }}"></script>
<script type="text/javascript" src="{{ asset('/backend/partials/contact.js') }}"></script>
<script type="text/javascript" src="{{ asset('/backend/partials/footer.js') }}"></script>
@endsection
