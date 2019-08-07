@extends('layouts.elements.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
                <div style="float: right;margin: 1rem;">
                    <a href="#" class="btn btn-primary btn-sm " style="padding: 4px 2rem;letter-spacing: 1px;" data-toggle="modal" data-target="#addEmployeeModalForm">
                        Add Employee
                    </a>
                </div>
                <!--datatables-->                
                <ol class="breadcrumb" style="    padding: 15px 8px!important">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                    <li class="active">Employee details</li>
                </ol>
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped" style="table-layout:fixed;word-break:break-all">
                            <thead>
                                <tr>
                                    <th>S.No.</th>	
                                    <th>Name</th>
                                    <th>E-mail</th>                              
                                    <th>Conact Number</th>
                                    <th>Last Login</th>
                                    <th>Status</th>
                                    <th>Action</th>                            
                                </tr>
                            </thead>
                            <tbody class="appendData">
                                @foreach($empData as $empData)
                                <tr id="{{ $empData->id }}">
                                    <td>
                                        {{ $empData->id }}
                                    </td>
                                    <td id="empName">
                                        {{ $empData->name }}
                                    </td>
                                    <td id="empEmail">
                                        {{ $empData->email }}
                                    </td>
                                    <td id="empContact">
                                        {{ $empData->contact }}
                                    </td>
                                    <td>
                                        {{ $empData->last_login }}
                                    </td>
                                    <td id="empStatus">
                                        @if(!empty($empData->status) && $empData->status == 1)
                                           @php echo "Active" @endphp
                                        @else(!empty($empData->status) && $empData->status == 0)
                                            @php echo "Deactive" @endphp                                           
                                        @endif
                                    </td>
                                    <td>
                                        <a id="emp_{{ $empData->id }}" class="editEmp " style="margin-right: 1rem; background: #337ab7; padding: 2px 2rem; text-align: center; border-radius: 4px;cursor: pointer;">
                                            <i class="fa fa-edit" style="font-size: 15px; color: #fff;"></i>
                                        </a>
                                        <a id="emp_{{ $empData->id }}" class="removeEmp" style="background: #337ab7; padding: 2px 2rem; text-align: center; border-radius: 4px;cursor: pointer;">
                                            <i class="fa fa-trash" style="font-size: 15px; color: #fff;"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.content-wrapper -->


                <!-- Control Sidebar -->
                <!-- /.control-sidebar -->
                <!-- Add the sidebar's background. This div must be placed
                     immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            <!-- ./wrapper -->
            @include('layouts.partials.modal')
    @endsection 