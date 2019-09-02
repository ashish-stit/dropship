@extends('layouts.elements.layout')
@section('content')
<ol class="breadcrumb" style="padding: 15px 8px!important">
    <li><a href="#"><i class="fa fa-dashboard"></i> Employee</a></li>
    <li class="active">Priority</li>
</ol>
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table-bordered table-striped" id="prioritytable"  style="table-layout:fixed;word-break:break-all;width:100%">
            <thead> 
            <tr> 
            <th>User & Orders#</th>
            <th>Order Details</th>
            <th>Time Left</th>
            <th>Amount</th> 
            <th>Status</th>             
            </tr>
            </thead>
            <tbody>
            	<tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            	</tr>

            </tbody>
        </table>
    </div>
</div>
@endsection
