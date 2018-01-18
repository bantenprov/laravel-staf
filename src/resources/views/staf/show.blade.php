@extends('layouts/default') 
{{-- Page title --}} 
@section('title') 
{{ $title }} 
@stop 
{{-- local styles --}} 
@section('header_styles') 
<link href="{{asset('css/alertmessage.css')}}" rel="stylesheet">
@stop {{-- Page Header--}} 


@section('page-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ $title }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('taskManagementStafIndex') }}">
                <i class="fa ti-arrow-circle-left"></i> Back
            </a>
        </li>
    </ol>
</section>
@stop {{-- Page content --}} 

@section('content') 

<div class="col-sm-12 col-md-12">    
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="ti-user"></i> {{ $title }} Detail
            </h3>
        </div>
        <div class="panel-body">
            <p><b>Full Name</b> : {{ $staf->full_name }}</p>
            <p><b>Username</b> : {{ $staf->getUser->name }}</p>
            <p><b>Email</b> : {{ $staf->getUser->email }}</p>
            <p><b>Opd</b> : {{ $staf->getOpd->name }}</p>
        </div>
    </div>
</div>
@stop {{-- local scripts --}} 


@section('footer_scripts') @stop