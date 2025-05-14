@extends('template.main.psb.sidebar')

@section('sidebar-menu')
    <li class="nav-item {{ (Request::path() == 'lms/index') ? 'active' : '' }}">
        <a class="nav-link" href="/psb/index">
            <i class="mdi mdi-view-dashboard"></i>
            <span>Beranda</span>
        </a>
    </li>
    <hr class="sidebar-divider">

@endsection