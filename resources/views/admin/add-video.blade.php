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
    <a href="#" class="btn btn-primary btn-sm " style="padding: 4px 2rem;letter-spacing: 1px;" data-toggle="modal" data-target="#addEmployeeVideoModalForm">
      Add Video
    </a>
  </div>
    <div>
     <table class="table table-striped" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;padding: 10px">
        <thead>
          <tr>
            <th style="text-align: center;">S.No</th>
            <th>Video</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        
         @foreach ($users as $admin_video)
         <tr>
          <td style="text-align: center;">{{ $admin_video->id }}</td>
          <td><video width="100" height="100" controls>
            <source src="{{ asset($admin_video->links)}}" type="video/mp4">
         </video></td>
          <td id="vidName">{{ $admin_video->name }}</td>
          <td id="vidDesc">{{ $admin_video->description }}</td>
          <td><a id="{{ $admin_video->id }}" class="editAddVideo btn btn-primary" style="margin:1rem 1rem; font-size: 20px;">
              <i class="fa fa-edit"></i>
            </a>
             <a href="{{ url('admin/deletevideo',$admin_video->id ) }}" class="btn btn-danger" style="margin:1rem 1rem; font-size: 20px;"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
  </div>
</div>
@include('layouts.partials.addVideoModal')
@endsection