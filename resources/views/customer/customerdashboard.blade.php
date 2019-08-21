@extends('layouts.customerlayout.customer')
<style type="text/css">
    table thead tr th {font-weight: 900; letter-spacing: 1px; text-align: left;}
    table thead {background: #3c8dbc5c;}
    table tbody tr td {text-align: left;}
    .Visitdrop{text-align: right; width: 94%;margin-top: -30px;}
    div#DataTables_Table_0_info {width: auto; display: -webkit-inline-box; margin-left: 25px;}
    body{height:100% !important;}
/*    .content-wrapper {height: 100%;}*/
    
    div#DataTables_Table_0_wrapper {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 10px;
        background: #fff;
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
    <table class="table table-hover customedatatable" style="margin-top: 0px !important;">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Image Uploaded</th>
            <th scope="col">Video</th>
            <th scope="col">Order Status</th>
            <th scope="col">Action</th>
            <th scope="col">Customer Execution Time</th>
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
            <video width="100" height="100" controls>
              <source src="{{ asset($customer_data->employe_video)}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </td>
        @else
        <td>Video Not Available</td>
        @endif
        <td>{{$customer_data->order_assign_time}}</td>

        <td class="videoEdit_{{ $customer_data->id }}">
          @if($customer_data->employe_video)
          @if($customer_data->change_stop_scroll == 1)
          <div id="approveShow_{{ $customer_data->id }}" disabled>
            <a class="btn btn-primary" href="javascript:void(0);">Edit</a>
            <a class="btn btn-primary" href="javascript:void(0);" id="dispute_{{ $customer_data->id }}" disabled>Rewise</a>
        </div>
        @else
        <div id="approveShow_{{ $customer_data->id }}">
            <a class="btn btn-primary" href="/editor">Edit</a>
            <a class="btn btn-primary openDisputeModal" href="javascript:void(0);" id="dispute_{{ $customer_data->id }}">Rewise</a>
        </div>
        @endif
        @else
        <div>
            <a class="btn btn-primary" href="javascript:void(0);" disabled>Edit</a>
            <a class="btn btn-primary" href="javascript:void(0);" disabled>Rewise</a>
        </div>
        @endif
        @if($customer_data->employe_video)
        <a class="btn btn-sm btn-danger" href="{{ url('video/download',$customer_data->id) }}"> Download Video</a>
        @else
        <a class="btn btn-sm btn-danger" href="javascript:void(0);" disabled> Download Video</a>
        @endif
        @if($customer_data->video_counter == 1)
        <td><p class="counter" title="{{(strtotime($customer_data->video_upload_time) * 1000)}}" style="margin-top: 1rem;"></p> </td>
        @endif
    </td>
    </tr>
    @endif
    @endforeach
    @endif

</tbody>

</table>
</div>
<div class="Visitdrop" style="padding-top: 40px;"><a href="{{url('/')}}"><h4>Create New Order</h4></a></div>
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

                  <input type="checkbox" name="scroll" id="change_scroll" value="1" > Change Stop Scroll<br>
                  <input type="checkbox" name="thumb" id="change_thumb" value="1"> Change Thumbnail<br>
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