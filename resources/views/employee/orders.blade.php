@extends('layouts.elements.layout')
@section('content')
<style>
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
table thead{
    border-bottom: 1px solid #e2e1e1;
    background: whitesmoke;
    font-size: 16px;
    background: #3c8dbc5c;
    font-size: 14px;
    letter-spacing: 1px;
    }
    table, th, td {
      border: 1px solid whitesmoke;
      font-size: 14px;
    }
    
    .box-body{padding:10px;}
    table.dataTable {
        margin-top: 0px !important;
    }
    body {
    background: #fff;
    }
    .box {
    margin-bottom: 0px;
    box-shadow: none;
    }
    ul.pagination {
    margin-top: 4px;
    }
    .content-wrapper {
    overflow: auto;
    height: 607px !important;
    }
    table thead tr th{padding: 10px 10px;}  
    table tbody tr td{padding: 10px;}
    .box-body{padding:0px;}
</style>
<input type="hidden" value="{{ Auth::id() }}" id="logdInEmpId">
<div>
    @if(sizeof($customerOrders) <= 0)
        <h1 class="text-center">No Orders Available Now</h1>
    @endif
</div>   
<ol class="breadcrumb" style="padding: 15px 10px!important">
    <!--<li><a href="#"><i></i></a></li>
    <li></li>-->
    <marquee style="color: #3c8dbc; font-size: 20px;font-family: Book Antiqua" behavior="alternate" > <p style="margin: 0;">Employee Dashboard</p></marquee>
</ol>
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table-bordered table-striped" id="employetable"  style="table-layout:fixed;word-break:break-all;width:100%">
            <thead> 
            <tr>               

        <table id="example1" class="table" style="table-layout:fixed;word-break:break-all;width:100%">
            <thead>                
                <th style="text-align:center">OrderId</th>  
                <th>Title</th>   
                <th>Status</th>
                <th>Delivery Date</th>
                <th width="200px">Action</th>
                <th style="text-align:center">Upload Video</th>
            </tr>
            </thead>
            <tbody>
                @foreach($customerOrders as $order)
                @if(!empty($order->id) && $order->status == 1)         

                <tr id="orderId_{{ $order->id }}" class="">   
                <td style="display:none;"></td>                
                    <td style="text-align:center">{{ $order->id }}</td>
                    <td class="orderrDesc">
                        <a href="{{ route ('employee/viewOrderDetails', $order->id) }}" id="orderId_{{ $order->id }}" class="viewDetails"
                         style="text-decoration:underline;" disabled="">Brief Details
                         </a>
                    </td>
                    <td>
                        @if(!empty( $order->is_assigned ))
                              <p>Order has been taken  ...!!</p>
                        @else <p>Order add to assign ..!!</p>
                        @endif
                    </td>
                    <td>
                        @if(!empty($order->order_assign_time))
                        {{$order->order_assign_time}}
                                @endif

                    </td>
                    <td class="assignBtn">
                         @if($order->change_thumb == 1  && $order->change_stop_scroll == 1)
                               <div style="margin-top:1rem;display: block;">
                                    <button type="button" class="btn btn-primary comment scrollall" id="{{ $order->id }}"
                                         style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px; overflow:auto;">Revise For Change Thumbnail And StopScroll
                                         style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px;overflow:auto;">Revise For Change Thumbnail And StopScroll
                                    </button>
                                </div>

                        @elseif($order->change_stop_scroll == 1)

                         <div style="margin-top:1rem;display: block;">
                                    <button type="button" class="btn btn-primary comment scrollStop" id="{{ $order->id }}" style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px; overflow:auto;">Revise For Change StopScroll
                                    </button>
                                </div>
                                @elseif($order->change_thumb == 1)
                                <div style="margin-top:1rem;display: block;">
                                    <button type="button" class="btn btn-primary comment scrollthumbnail" id="{{ $order->id }}" style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px;overflow:auto;">Revise For Change Thumbnail
                                    </button>
                                </div>

                             @endif
                             @if(empty($order->is_assigned ))
                                <div style="margin-top:1rem;display: block;" id="order-asign_{{ $order->id }}">
                                    <button type="button" class="btn btn-primary assignOrder" id="order_{{ $order->id }}"
                                         style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px;">Assign
                                    </button>
                                </div>
                             @endif
                             @if( $order->is_assigned == Auth::id()  && $order->order_counter == 1)
                            <p id="counter_{{ $order->id }}" uploadVideo="{{ $order->employe_video }}" role="singlewindow" class="counter" title="{{(strtotime($order->order_assign_time) * 1000)}}" style="margin-top: 1rem;"></p> 
                            @elseif($order->is_assigned == Auth::id()  && $order->order_counter == 0)
                            <div class="rejectOrProBtn">
                                <div style="display:flex;" id="orderSuccesReject_{{ $order->id }}">
                                <div style="margin-top:1rem;margin-right: 2rem">
                                    <button type="button" class="btn btn-danger rejectOrder"  id="reject_{{ $order->id }}" style="border-radius:5px;letter-spacing: 1px;">Reject</button>
                                </div>
                                <div style="margin-top:1rem;">
                                    <button type="button" class="btn btn-success proceedOrder" id="proceed_{{ $order->id }}" style="border-radius:5px;letter-spacing: 1px;">Proceed</button>
                                </div>
                                </div>  
                            <div>
                            @elseif(!empty($order->is_assigned) &&  $order->is_assigned != Auth::id() ) 
                            <div class="assignBtn"> 
                                <div style="margin-top:1rem;display: block;" id="order-asign_{{ $order->id }}">
                                    <button type="button" class="btn btn-primary assignOrder" id="order_{{ $order->id }}"
                                            style="font-size:16px ;width:100%;border-radius:5px;letter-spacing: 1px;" disabled>Assigned
                                    </button>
                                </div>
                            </div>                
                            @endif
                            <div style="display: none"  class="rejectOrProBtn">
                            <div style="display:flex;" id="orderSuccesReject_{{ $order->id }}">
                                <div style="margin-top:1rem;margin-right: 2rem">
                                    <button type="button" class="btn btn-danger rejectOrder"  id="reject_{{ $order->id }}" style="border-radius:5px;letter-spacing: 1px;">Reject</button>
                                </div>
                                <div style="margin-top:1rem;">
                                    <button type="button" class="btn btn-success proceedOrder" id="proceed_{{ $order->id }}" style="border-radius:5px;letter-spacing: 1px;">Proceed</button>
                                </div>
                            </div>  
                        <div>
                    </td>
                    @if($order->is_assigned == Auth::id())
                    <td style="text-align:center">
                        <button type="button" class="btn btn-primary openUploadVideoModal" id="order_{{ $order->id }}">UploadVideo</button>
                         @if(!empty($order->employe_video))
                            <div style="float:right">
                                <video width="100" height="50" controls>
                                    <source src="{{ asset($order->employe_video)}}" type="video/mp4">
                                </video><br><p style="color:red">Uploaded video</p>
                            </div>
                        @endif
                    </td>                       
                    @endif
                </tr>
                @else
                 @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection

<!-- End Add Customer Video modal-->
<div class="modal fade" id="AddCustomerVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add CustomerVideo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>            
            <form action="javascript:void(0);" class="customerVideo" method="post" enctype="multipart/form-data">
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="orangeForm-name">UploadVideo</label>                    
                        <input type="file" name="video" accept="video/*" id="uploadedVideo" class="form-control ">
                        <input type="hidden" id="orderIdForUploadVideo" name="orderid" value="">                         
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                    <button class="btn btn-deep-orange" id="Addvideo"  
                            style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End End Customer Video modal-->
<div class="modal fade" id="commentPopUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header text-center">
<h4 class="modal-title w-100 font-weight-bold">Revise order</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div> 
<form method="post" action="javascript:void(0);">
<div class="modal-body mx-3">
    <input type="hidden" value="{{ $order->id }}">

 <center><h4>Are You Sure Want To Assign Order</h4></center>
</div>
<div class="modal-footer d-flex justify-content-center " style="text-align: center" >
<button class="btn btn-deep-orange Rewise" id="{{ $order->id }}"
style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;" >ok</button>
</div>
</form>
</div>
</div>
</div>


