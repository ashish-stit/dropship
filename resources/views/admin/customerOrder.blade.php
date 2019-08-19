@extends('layouts.elements.layout')
<style type="text/css">
  table tr th{letter-spacing: 1px;}
  table thead {background: #3c8dbc5c;}
  body {height: 100% !important;}
</style>
@section('content')


<div>
<table class="table table-striped" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;padding: 10px">
                      <thead>
                       <tr>
                        <th style="text-align: center;">Order.No</th>
                        <th>Assigned</th>
                        <th>OrderAssignDate</th>
                        <th>OrderCompletionDate</th>
                        <th>PaymentStatus</th>                       
                      </tr> 
                    </thead>
                    <tbody>                                        
                      @foreach($custOrder as $Cust_Order)
                      <tr>
                        <td style="text-align: center;">{{ $Cust_Order->id }}</td>
                        <td>
                          @if(!empty($Cust_Order->customerData->name))
                            {{$Cust_Order->customerData->name}}
                          @endif
                        </td>  
                        <td>
                          @php $ordrComDate = $Cust_Order->order_assign_time @endphp 
                          @if(!empty($Cust_Order->order_assign_time ))
                          {{ date('Y-m-d h:i:s', strtotime('-3 days', strtotime($ordrComDate))) }}
                          @endif
                        </td>                
                        <td>{{ $Cust_Order->order_assign_time }}</td>
                        
                       <td>  
                        @if(!empty($Cust_Order->customerData->getPaymentStatus))
                          @if($Cust_Order['status'] == 1 )
                            @php echo "Done"; @endphp
                          @else($Cust_Order['status'] == 0 )
                            @php echo ""; @endphp
                          @endif
                        @endif
                      </td> 
                    </tr>                
                                       
                      @endforeach                     

                  </tbody>
     </table>
 </div>
 <div style="float: right;margin-right: 4rem">
    {{ $custOrder->links() }}
    </div>
              
                @endsection