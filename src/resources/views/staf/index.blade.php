@extends('layouts/default') 
{{-- Page title --}} 
@section('title') 
{{ $title }} 
@stop {{-- local styles --}} 
@section('header_styles') 
@stop 
{{-- Page Header--}} 
@section('page-header')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ $title }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('index')}}">
                <i class="fa fa-fw fa-home"></i> Dashboard
            </a>
        </li>
        <li class="active">
            Staf
        </li>
    </ol>
</section>
@stop {{-- Page content --}} 

@section('content') 

<div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="padding:0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-danger">
        <ul style="padding:0;">
            <li>{{ session()->get('message') }}</li>
        </ul>
    </div>
@endif
</div>   

<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('taskManagementStafCreate') }}" class="btn btn-sm btn-primary">
            <i class="fa fa-fw fa-plus"></i>
            Add new staf
        </a>
    </div>
</div>
<br><br>
<div class="row">    
    <div class="col-lg-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="ti-list"></i> Staf List
                </h3>
                <span class="pull-right">
                    <i class="fa fa-fw ti-angle-up clickable"></i>
                </span>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full name</th>            
                                <th>Username</th>
                                <th>Email</th>
                                <th>Opd</th>
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stafs as $key => $staf)
                            <tr>
                                @if($stafs->currentPage() == 1)
                                    <td>{{ $key+1*$stafs->currentPage() }}</td>
                                @else
                                    <td>{{ $key+$stafs->currentPage()*$stafs->perPage()-$stafs->perPage()+1 }}</td>
                                @endif
                                <td>{{ $staf->full_name }}</td>            
                                <td>{{ $staf->getUser->name }}</td>
                                <td>{{ $staf->getUser->email }}</td>
                                <td>
                                    <a href="{{ route('opdShow',$staf->getOpd->id) }}">{{ $staf->getOpd->name }}</a>
                                </td>
                                <td width="50px">
                                    <a class="btn btn-primary btn-xs" href="{{ route('taskManagementStafShow',$staf->id) }}" data-toggle="modal" data-placement="top"><span class="fa fa-fw ti-eye"></span></a>
                                </td>
                                <td width="50px">
                                    <a class="btn btn-success btn-xs" href="{{ route('taskManagementStafEdit',$staf->id) }}" data-toggle="modal" data-placement="top"><span class="fa fa-fw ti-pencil"></span></a>
                                </td>
                                <td width="50px">
                                    <a class="btn btn-danger btn-xs" href="{{ route('taskManagementStafDestroy',$staf->id) }}" data-toggle="modal" data-placement="top"><span class="fa fa-fw fa-times"></span></a>
                                </td>          
                            </tr>
                            @empty
                                <tr>
                                    <td colspan='7' align="center">belum ada data</td>
                                </tr>
                            @endforelse                           
                        </tbody>
                    </table>
                </div>
                {{ $stafs->links() }}
            </div>
        </div>
    </div>
</div>

@stop {{-- local scripts --}} 


@section('footer_scripts') @stop
