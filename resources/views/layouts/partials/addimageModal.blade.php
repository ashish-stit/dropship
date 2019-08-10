<!--Add Employee Image modal-->
<div class="modal fade" id="addEmployeeImageModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title w-100 font-weight-bold" style="margin-top: 10px;">Add Image Layout</h4>
        </div>
        <div class="modal-body mx-3">
          <form method="post" enctype="multipart/form-data" action="{{url('admin/addimage-Layout')}}">
            @csrf
            <div class="md-form mb-5" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-name" style="margin-bottom: 10px;">Image Size</label>
                <input type="text" name="imagesize" class="form-control ImgSizs" id="addImageEmployee">
                <span id="ShowImageSizeErrorMsg"></span>                    
            </div>
            <div class="md-form mb-5" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-email" style="margin-bottom: 10px;">Description</label>
                <input type="text" name="description" class="form-control ImgDescs" id="text"> 
                <span id="DescriptionforErrorMsg"></span> 
            </div>

            <div class="md-form mb-4" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-pass" style="margin-bottom: 10px;">Image Layout</label>

                <input type="file" name="image" id="showImg" class="ImageShowErr" style="margin-bottom:10px;">
                <img id="ImgId" width="21%" height="100px">
                <span id="ImageErrorMessage"></span>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center" style="text-align: center">
            <button class="btn btn-deep-orange ErrorMessg" id="addEmployees"  
            style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff; margin-bottom: 10px;">Add</button>
        </div>
    </form>
</div>
</div>
</div>

<!-- End Add Employee Image modal-->