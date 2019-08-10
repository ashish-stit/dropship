<!-- start login/ signup model -->

<!--Add Employee Image modal-->
<div class="modal fade" id="addEmployeeImageModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Add Image Layout</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
          <form method="post" enctype="multipart/form-data" action="{{url('admin/addimage-Layout')}}">
            @csrf
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="orangeForm-name">Image Size</label>
                <input type="text" name="imagesize" class="form-control">
                <span id="NameForErrorMsg" style='color:red;'></span>                    
            </div>
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="orangeForm-email">Description</label>
                <input type="text" name="description" class="form-control" id="text"> 
                <span id="EmailforErrorMsg" style='color:red;'></span> 
            </div>

            <div class="md-form mb-4">
                <label data-error="wrong" data-success="right" for="orangeForm-pass">Images</label>
                
                <input type="file" name="image" id="showImg">
                <img id="ImgId" width="21%" height="100px;">
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center" style="text-align: center">
            <button class="btn btn-deep-orange" id="addEmployee"  
            style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Add</button>
        </div>
    </form>
</div>
</div>
</div>

<!-- End Add Employee Image modal-->








<!-- Modals popup start -->
  <div class="modal fade" id="orangeModalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-warning" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header text-center">
        <div class="modal-logo"><img src="{{asset('public/img/logo.png')}}"></div>
        <button type="button" class="close2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
      </div>
      

      <!--Body-->
      <div class="modal-body">
        <h4 class="text-center modal-title"><b>Great to have you back!</b></h4> 
        <form class="needs-validation signup_form" novalidate method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustomUsername">Username</label>
                            <a class="float-right labelrem" href="">Remind me</a>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email"
                                   aria-describedby="inputGroupPrepend" value="{{ old('email') }}" name="email"  autofocus="autofocus" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror                            
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom03">Password</label>
                            <a class="float-right labelrem" href="{{ route('password.request') }}">Reset</a>
                            <input type="Password" class="form-control @error('password') is-invalid @enderror" id="password"  name="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>                    
                    <div class="text-center">
                        <button class="btn  btn-primary btn-sm justify-content-center submitButtonSignUp" type="submit">
                            <i class="fas fa-shopping-cart"></i> Sign in
                        </button>
                    </div>
                </form>
        <p class="text-center modalfotter">New here? <a data-test-selector="sign-up-modal-button" class="" href="{{route('register')}}" target="_blank">Create an account</a></p>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modals popup end -->
<!-- end login/ signup model -->

<!--Add Employee modal-->
<div class="modal fade" id="addEmployeeModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100 font-weight-bold" style="margin-top: 10px;">Add Employee</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-name" style="margin-bottom: 10px;">Name</label>
                    <input type="text" name="name" id="employeeName" class="form-control ">
                    <span id="ErrMsgForName"></span>                 
                </div>
                <div class="md-form mb-5" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-email" style="margin-bottom: 10px;">E-mail</label>
                    <input type="text" name="email" id="employeeEmail" class="form-control fffd"> 
                    <p style="color:red;font-size: 14px;display:none;" id="errorMessage">
                        User Already exists
                    </p>
                    <span class="invalidMailFormat"></span>
                </div>

                <div class="md-form mb-4">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass" style="margin-bottom: 10px;">Contact Number</label>
                    <input type="text" name="num" id="employeeContact" class="form-control" maxlength="10" style="margin-bottom: 10px;">
                    <span id="ErrMsgForContact"></span>
                </div>  
                <div class="md-form mb-4" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass" style="margin-bottom: 10px;">Status</label><br>
                    <label class="radio-inline"><input type="radio" name="optradio" id="chk_1" class="StatushideError">Active</label>
                    <label class="radio-inline" ><input type="radio" name="optradio" id="chk_0" class="StatushideError">Deactive</label>
                    <p class="chekErrorMsg"></p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                <button class="btn btn-deep-orange" id="addEmployee"  
                        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff; margin-bottom: 10px;">Add</button>
            </div>
        </div>
    </div>
</div>
<!-- End Add Employee modal-->

<!--Edit Employee modal-->
<div class="modal fade" id="editEmployeeModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100 font-weight-bold" style="margin-top: 10px;">Edit Employee</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">                   
                    <input type="hidden" name="id" class="form-control" id="emp_id">                         
                </div>
                <div class="md-form mb-5">                   
                    <input type="hidden" name="user_id" class="form-control" id="user_id">                         
                </div>
                <div class="md-form mb-5" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-name" style="margin-bottom: 10px;">Name</label>
                    <input type="text" name="name" id="emp_name" class="form-control ">
                    <span id="ErrMsgFName"></span>                         
                </div>
                <div class="md-form mb-5" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-email" style="margin-bottom: 10px;">E-mail</label>
                    <input type="email" name="email" id="emp_email" class="form-control ">
                    <p style="color:red;font-size: 14px;display:none;" id="erroMessag">
                        User Already exists
                    </p>                            
                </div>

                <div class="md-form mb-4" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass" style="margin-bottom: 10px;">Contact Number</label>
                    <input type="text" name="contact" id="emp_contact" class="form-control ">
                    <span id="ErroMsgCont"></span>
                </div>  
                <div class="md-form mb-4" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass" style="margin-bottom: 10px;">Status</label><br>
                    <label class="radio-inline"><input type="radio" name="optradio" id="chek_1">Active</label>
                    <label class="radio-inline"><input type="radio" name="optradio" id="chek_0">Deactive</label>
                     <p class="chekErrorMsgs"></p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                <button class="btn btn-deep-orange" id="UpdateEmp"  
                        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Employee modal-->





<!--Edit image modal-->
<div class="modal fade" id="editImageModalForm" tabindex="-1" enctype="multipart/form-data" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100 font-weight-bold" style="margin-top: 10px;">Edit Image Layout</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">                   
                    <input type="hidden" name="id" class="form-control" id="img_id">                         
                </div>
                <div class="md-form mb-5" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-name" style="margin-bottom: 10px;">ImageSize</label>
                    <input type="text" name="Imgsize" id="img_size" class="form-control editLayImg">
                    <span id="EditImfLyt"></span>                         
                </div>
                <div class="md-form mb-5" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-desc" style="margin-bottom: 10px;">Description</label>
                    <input type="text" name="Imgdesc" id="img_desc" class="form-control editdesptn">
                    <span id="EditDes"></span>                 
                </div>
                <div class="md-form mb-5" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-Img" style="margin-bottom: 10px;">Image Layout </label>
                    <input type="file" name="Img" id="img" class="form-control EditImges">
                    <span id="editImg"></span>                            
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                <button class="btn btn-deep-orange" id="UpdateImglayout"  
                        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff; margin-bottom: 10px;">Update</button>
            </div>
        </div>
    </div>
</div>
<!-- End Edit Employee modal-->


<!--Edit image modal-->
<div class="modal fade" id="editThumbModalForm" tabindex="-1" enctype="multipart/form-data" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100 font-weight-bold" style="margin-top: 10px;">Edit Thumb Layout</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">                   
                    <input type="hidden" name="id" class="form-control" id="img_id">                         
                </div>
                <div class="md-form mb-5" style="margin-bottom: 10px;">
                    <label data-error="wrong" data-success="right" for="orangeForm-name" style="margin-bottom: 10px;">Video URL</label>
                    <input type="text" name="video" id="thum_video" class="form-control">
                    <span id="thumsVid"></span>                         
                </div>
                
            </div>
            <div class="modal-footer d-flex justify-content-center" style="text-align: center">
                <button class="btn btn-deep-orange" id="UpdateThumbnaillayout"  
                        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;margin-bottom: 10px;">Update</button>
            </div>
        </div>
    </div>
</div>


















<style>
    
.close {
    float: right;
    font-size: 40px;
    font-weight: 100;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: 17.2;
    
}
.modal-logo{
    margin-left: 200px;
}
.close2{
      font-size: 40px;
 }   
</style>