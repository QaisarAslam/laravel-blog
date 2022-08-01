<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        {{-- <a class="nav-link" href="{{ url(strtolower(Auth::user()->name).'/dashboard') }}"> --}}
        <a class="nav-link" href="{{ url('/user/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/') }}"{{--  data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" --}}>
            {{-- <i class="fas fa-fw fa-cog"></i> --}}
            <i class="far fa-eye"></i>
            <span>View Site</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/user/createBlog') }}">
            <i class="fas fa-plus-circle"></i>
            <span>Create Blog</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        {{-- <a class="nav-link" href="{{ url(strtolower(Auth::user()->name).'/dashboard') }}"> --}}
        <a class="nav-link collapsed" href="{{ url('/user/awaitingBlogs') }}">
            <i class="fa fa-user-clock"></i>
            <span>Awaiting Blogs</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        {{-- <a class="nav-link" href="{{ url(strtolower(Auth::user()->name).'/dashboard') }}"> --}}
        <a class="nav-link collapsed" href="{{ url('/user/approvedBlogs') }}">
            <i class="fa fa-user-check"></i>
            <span>Approved Blogs</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
</ul>
<!-- End of Sidebar -->
