@extends('layouts.elements.layout')
<style type="text/css">
  table tr th{letter-spacing: 1px;}
  table thead {background: #3c8dbc5c;}
  body {height: 100% !important;}
  iframe {width: 150px; height: 100px;}
</style>
@section('content')
  @if(Session::has('msg'))
    <label class="alert-danger">{{session('msg')}}</label>
  @endif
 <div class="box">
    <div style="float: right;margin: 1rem;">
    <a href="#" class="btn btn-primary btn-sm " style="padding: 4px 2rem;letter-spacing: 1px;" data-toggle="modal" data-target="#addAdminThumbModalForm">
      Add Video
    </a>
  </div>
    <div>
     <table class="table table-striped" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;padding: 10px">
        <thead>
          <tr>
            <th style="text-align: center;">S.No</th>
            <th>Video</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        
         @foreach ($thumb  as $thumb_layout_video)
         <tr>
          <td style="text-align: center;">{{$thumb_layout_video->id }}</td>
          <td width="100px" height="100px">
            {!!Embed::make($thumb_layout_video->thum_video)->parseUrl()->getIframe() !!}

         </td>
          <td>
              <a id="{{$thumb_layout_video->id}}" class="Editthumb" style="margin-right: 1rem; background: #337ab7; padding: 2px 2rem; text-align: center; border-radius: 4px;cursor: pointer;">
            <i class="fa fa-edit" style="font-size: 15px; color: #fff;"></i></a>
            <a href="{{ url('admin/delthum',$thumb_layout_video->id ) }}" class="btn btn-danger"><i class="fa fa-trash" style="font-size: 15px; color: #fff;"></i></a>  </td>
        </tr>
        @endforeach
       
      </tbody>
    </table>
  </div>
</div>
@include('layouts.partials.thumbnailModal')
@include('layouts.partials.modal')
@endsection