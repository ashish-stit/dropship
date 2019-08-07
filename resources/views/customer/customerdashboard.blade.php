 @extends('layouts.customerlayout.customer')
 <style type="text/css">
    table thead tr th {font-weight: 900; letter-spacing: 1px; text-align: center;}
    table thead {background: #3c8dbc5c;}
    table tbody tr td {text-align: center;}
    .Visitdrop{text-align: right; width: 94%;margin-top: -30px;}
    div#DataTables_Table_0_info {width: auto; display: -webkit-inline-box; margin-left: 25px;}
    body{height:100% !important;}
    .content-wrapper {height: 100%;}
</style>
 @section('content')
    <div class="card">
        <table class="table table-hover customedatatable" style="margin-top: 0px !important;">
            <thead>
              <tr>
                <th scope="col">S.No</th>
                <th scope="col">Image Uploaded</th>
                <th scope="col">Video</th><th></th>
                <th scope="col">Oreder Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
             @php
            $sn=1;
            $customerId = Auth::user()->id;
            @endphp
            @if(!$customer->isEmpty())
            @foreach($customer as $customer_data)
            @if($customer_data->customer_id == $customerId)
            <tbody>
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
                <td></td>
                <td>{{$customer_data->order_assign_time}}</td>
                
                  <td class="videoEdit_{{ $customer_data->id }}">
                      @if($customer_data->employe_video)
                    <a class="btn btn-sm btn-primary approveEdit" href="javascript:void(0);" id="appEdit_{{ $customer_data->id }}"> Approve to Edit</a>
                    <div id="approveShow_{{ $customer_data->id }}" style="display:none;">
                        <a class="btn btn-primary" href="javascript:void(0);">Edit</a>
                        <a class="btn btn-primary openDisputeModal" href="javascript:void(0);" id="dispute_{{ $customer_data->id }}">Dispute</a>
                    </div>
                    @else
                      <a class="btn btn-sm btn-primary approveEdit" href="javascript:void(0);" id="appEdit_{{ $customer_data->id }}" disabled> Approve to Edit</a>
                    <div id="approveShow_{{ $customer_data->id }}" style="display:none;">
                        <a class="btn btn-primary" href="javascript:void(0);">Edit</a>
                        <a class="btn btn-primary openDisputeModal" href="javascript:void(0);" id="dispute_{{ $customer_data->id }}">Dispute</a>
                    </div>
                    @endif
                    @if($customer_data->employe_video)
                    <a class="btn btn-sm btn-danger" href="{{ url('video/download',$customer_data->id) }}"> Download Video</a>
                    @else
                     <a class="btn btn-sm btn-danger" href="{{ url('video/download',$customer_data->id) }}" disabled> Download Video</a>
                    @endif
                </td>
              </tr>
            @endif
            @endforeach
            @endif
            
            </tbody>
           
          </table>
    </div>
     <div class="Visitdrop"><a href="{{url('/')}}"><h4>Create New Order</h4></a></div>
    <!-- Large modal -->
    
<!-- End Add Customer Video modal-->
<div class="modal fade" id="addComments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Comments</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>            
            <form action="javascript:void(0);" class="customerVideo" method="post">
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <!--<label data-error="wrong" data-success="right" for="orangeForm-name">Comments</label>-->
                        <textarea id="txtAreaValue" rows="10" cols="70" style="margin-left: 6rem;"></textarea>
                        <input type="hidden" id="orderIdForCommentVideo" name="orderid" value="">                         
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                    <button class="btn btn-deep-orange" id="addCommentsForVideo"  
                            style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End End Customer Video modal-->


@endsection