@extends('layouts.customerlayout.customer')
<style type="text/css">
table thead tr th {font-weight: 900; letter-spacing: 1px; text-align: left;}
table thead {background: #3c8dbc5c;}
table tbody tr td {text-align: left;}
.Visitdrop{text-align: right; width: 94%;margin-top: -30px;}
div#DataTables_Table_0_info {width: auto; display: -webkit-inline-box; margin-left: 25px;}
body{height:100% !important;}
.content-wrapper {height: 100%;}

div#DataTables_Table_0_wrapper {
border-top-left-radius: 0;
border-top-right-radius: 0;
border-bottom-right-radius: 3px;
border-bottom-left-radius: 3px;
padding: 10px;
background: #fff;
}
label {
    margin-left: 0px;}
.lbld {
    display: -webkit-inline-box;
    width: 26px;
    padding: 4px;
    background: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(38%,#ffffff), color-stop(100%,#cccccc));
    text-align: center;
    box-shadow: 0px 3px 5px #9a9a9a;
    border-radius: 4px;
    font-weight: bold;
    font-size: 15px;
    padding-left: 8px;
}

.lblh {
    display: -webkit-inline-box;
    width: 26px;
    padding: 4px;
    background: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(38%,#ffffff), color-stop(100%,#cccccc));
    text-align: center;
    box-shadow: 0px 3px 5px #9a9a9a;
    border-radius: 4px;
    font-weight: bold;
    font-size: 15px;
}

.lblm {
    display: -webkit-inline-box;
    width: 26px;
    padding: 4px;
    background: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(38%,#ffffff), color-stop(100%,#cccccc));
    text-align: center;
    box-shadow: 0px 3px 5px #9a9a9a;
    border-radius: 4px;
    font-weight: bold;
    font-size: 15px;
}

.lbls {
    display: -webkit-inline-box;
    width: 26px;
    padding: 4px;
    background: white;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(38%,#ffffff), color-stop(100%,#cccccc));
    text-align: center;
    box-shadow: 0px 3px 5px #9a9a9a;
    border-radius: 4px;
    font-weight: bold;
    font-size: 15px;
}

 .label-b{
    margin:0px 8px;
    font-size: 20px;
    font-weight: bolder;
    }

.Visitdrop {
text-align: center;
width: 100%;
border-radius: 5px;
margin-top: -15px;
background: #fff;
padding-top: 20px;
padding-bottom: 10px;
border-bottom-left-radius: 0px;
border-bottom-right-radius: 0px;
text-decoration: underline;
}
.Visitdrop a h4{font-weight: 600;}
th {border: 1px solid #f4f4f4;font-size: 14px;}
td {border: 1px solid #f4f4f4;font-size: 14px;}
.table>thead>tr>th {border-top: 1px solid #f4f4f4 !important;}
div#DataTables_Table_0_info {margin-left: 0px;}
</style>
@section('content')
<div class="card">
<table class="table table-bordered table-striped customedatatable" style="margin-top: 0px !important;">
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Image Uploaded</th>
<th scope="col">Video</th>
<th scope="col">Video Revise Status</th>
<th scope="col">Action</th>
</tr>
</thead>
@php
$sn=1;
$customerId = Auth::user()->id;
@endphp
@if(!$customer->isEmpty())
<tbody>
@foreach($customer as $customer_data)
@if($customer_data->customer_id == $customerId)

<tr>
<td scope="row">{{$sn++}}</td>
@if($customer_data->logo)
<td><img src="{{ asset($customer_data->logo)}}" alt="Image" width="50px" height="50px"></td>
@else
<td>Image Not Available</td>
@endif
@if($customer_data->employe_video)
<td>
<video width="100" height="50" controls>
<source src="{{ asset($customer_data->employe_video)}}" type="video/mp4">
Your browser does not support the video tag.
</video>
</td>
@else
<td>Video Not Available</td>
@endif
<td>@if($customer_data->video_counter == 1)
        <p class="counter" title="{{(strtotime($customer_data->video_upload_time) * 1000)}}" style="margin-top: 1rem;"></p> 
        @else
        <p>Not Applicable</p>
        @endif</td>

<td class="videoEdit_{{ $customer_data->id }}">
@if($customer_data->employe_video)
@if($customer_data->video_upload_time <= date('Y-m-d H:i:s'))
<div id="approveShow_{{ $customer_data->id }}" style="float: left;"> 
<a class="btn btn-primary" href="javascript:void(0);" title="Edit"><i class="fa fa-edit" style="font-size: 15px; color: #fff;"></i></a>
</div>
@elseif($customer_data->change_stop_scroll == 1)
<div id="approveShow_{{ $customer_data->id }}" disabled style="float: left;">
<a class="btn btn-primary" href="javascript:void(0);" title="Edit"><i class="fa fa-edit" style="font-size: 15px; color: #fff;"></i></a>
<a class="btn btn-primary" href="javascript:void(0);" id="dispute_{{ $customer_data->id }}" title="Revise" disabled><i class="fa fa-file-video-o" style="font-size: 15px; color: #fff;"></i></a>
</div>
@else
<div id="approveShow_{{ $customer_data->id }}" style="float: left;">
<a class="btn btn-primary" href="/editor" title="Edit"><i class="fa fa-edit" style="font-size: 15px; color: #fff;"></i></a>
<a class="btn btn-primary openDisputeModal" href="javascript:void(0);" id="dispute_{{ $customer_data->id }}" title="Revise"><i class="fa fa-file-video-o" style="font-size: 15px; color: #fff;"></i></a>
</div>
@endif
@else
<div style="float: left;">
<a class="btn btn-primary" href="javascript:void(0);" title="Edit" disabled><i class="fa fa-edit" style="font-size: 15px; color: #fff;"></i></a>
<a class="btn btn-primary" href="javascript:void(0);" title="Revise" disabled><i class="fa fa-file-video-o" style="font-size: 15px; color: #fff;"></i></a>
</div>
@endif
@if($customer_data->employe_video)
<a class="btn btn-sm btn-danger" href="{{ url('video/download',$customer_data->id) }}" style=" margin-left:3px;" title="Download"> <i class="fa fa-download" style="font-size: 17px; color: #fff;"></i></a>
@else
<a class="btn btn-sm btn-danger" href="javascript:void(0);" disabled style=" margin-left: 3px;" title="Download"> <i class="fa fa-download" style="font-size: 17px; color: #fff;"></i></a>
@endif
    
</tr>
@endif
@endforeach
@endif

</tbody>

</table>
</div>
<div class="Visitdrop" style="padding-top: 40px;"><a href="{{url('/')}}" class="btn btn-primary">Create New Order</a></div>
<!-- Large modal -->

<!-- Add Customer Video modal-->
<div class="modal fade" id="addComments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Add Rewise</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> 
<form action="javascript:void(0);" class="customerVideo" method="post">
<div class="modal-body mx-3">
<div class="md-form mb-5">

<input type="checkbox" name="scroll" id="change_scroll"> Change Stop Scroll<br>
<input type="checkbox" name="thumb" id="change_thumb"> Change Thumbnail<br>
<input type="hidden" id="orderIdForCommentVideo" name="orderid" value=""> 
</div>
</div>
<div class="modal-footer d-flex justify-content-center" style="text-align: center">
<button class="btn btn-deep-orange" id="addCommentsForVideo" 
style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Rewise</button>
</div>
</form>
</div>
</div>
</div>
<!-- End End Customer Video modal-->
@endsection