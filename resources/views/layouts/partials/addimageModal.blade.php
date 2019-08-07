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