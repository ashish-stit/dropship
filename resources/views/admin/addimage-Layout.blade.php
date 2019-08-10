@extends('layouts.elements.layout')
<style type="text/css">
  table tr th{letter-spacing: 1px;}
  table thead {background: #3c8dbc5c;}
  body {height: 100% !important;}
</style>
@section('content')
@if(Session::has('msg'))
<label class="alert-danger">{{session('msg')}}</label>
@endif
<div class="box">
  <div style="float: right;margin: 1rem;">
    <a href="#" class="btn btn-primary btn-sm " style="padding: 4px 2rem;letter-spacing: 1px;" data-toggle="modal" data-target="#addEmployeeImageModalForm">
      Add Image
    </a>
  </div>
  <!--datatables-->                
  <ol class="breadcrumb" style="padding: 15px 8px!important">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active"> Add Image Layout</li>
  </ol>
  <div>
   <table id="example1" class="table table-striped" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;padding: 10px">
    <thead>
      <tr>
        <th style="text-align: center;">S.No</th>
        <th>Images</th>
        <th>Image Size  </th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

     @foreach ($users as $user)
     <tr>
      <td style="text-align: center;">{{ $user->id }}</td>
      <td><img src="{{ URL::asset('public/img/'.$user->img) }}" height="75px" width="75%"></td>
      <td>{{ $user->image_size }}</td>
      <td>{{ $user->description }}</td>
      <td><a id="{{$user->id }}" class="editImg " style="margin-right: 1rem; background: #337ab7; padding: 2px 2rem; text-align: center; border-radius: 4px;cursor: pointer;">
        <i class="fa fa-edit" style="font-size: 15px; color: #fff;"></i></a>
        <a href="{{ url('admin/deleteimage',$user->id ) }}" class="btn btn-danger removeImageLayt" style="padding: 2px 2rem; text-align: center; border-radius: 4px;cursor: pointer;"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>
@include('layouts.partials.addimageModal')
@include('layouts.partials.modal')
@endsection