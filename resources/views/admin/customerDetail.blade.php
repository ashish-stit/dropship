@extends('layouts.elements.layout')
<style type="text/css">
    table thead tr th {font-weight: 900; letter-spacing: 1px;}
    table thead {background: #3c8dbc5c;}
    body {height: 100% !important;}
</style>

@section('content')
<ol class="breadcrumb" style="padding: 15px 8px!important">
    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">Customer Details</li>
</ol>
   
 <div>
            <table class="table table table-striped" id="example1" style="table-layout: fixed;word-wrap: break-word;background-color: #fff;">
                <thead>
                    <tr>
                      <th style="text-align: center;">S.No.</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>User Name</th>
                      <th>Email</th>
                    </tr>
              </thead>
              <tbody>
                  
                @foreach($custDetail as $cust_Detail)   
                <tr>
                    <td style="text-align: center;">{{ $cust_Detail->id }}</td>
                    <td>{{$cust_Detail->first_name}}</td>
                    <td>{{$cust_Detail->last_name}}</td>
                    <td>{{$cust_Detail->name}}</td>
                    <td>{{$cust_Detail->email}}</td>
                </tr>
                @endforeach

        </tbody>
    </table>
</div>
 
    @endsection