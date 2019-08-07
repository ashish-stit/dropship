<!--Add Employee Video modal-->
<div class="modal fade" id="addEmployeeVideoModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Add Video</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
          <form method="post" enctype="multipart/form-data" action="{{ url('admin/video') }}">
            @csrf
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                <input type="text" name="name" class="form-control">
                <span id="NameForErrorMsg" style='color:red;'></span>                    
            </div>
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="orangeForm-email">Description</label>
                <input type="text" name="description" class="form-control" id="text"> 
                <span id="EmailforErrorMsg" style='color:red;'></span> 
            </div>

            <div class="md-form mb-4">
                <label data-error="wrong" data-success="right" for="orangeForm-pass">Video</label>
                <input type="file" name="video" class="showvideo" id="file" accept="video/*">
                <div style="display: none;" class='video-prev' class="pull-right">
                   <video height="200" width="300" class="video-preview" controls="controls"/>
               </div>
           </div>
       </div>
       <div class="modal-footer d-flex justify-content-center" style="text-align: center">
        <button type="submit" class="btn btn-deep-orange" id="addEmployee"  
        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Add</button>
    </div>
</form>
</div>
</div>
</div>

<!-- End Add Employee Video modal-->

<div class="modal fade" id="addEmployeeEditVideoModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Edit Video</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <div class="md-form mb-5">                   
                <input type="hidden" name="id" class="form-control" id="empl_id">                         
            </div>
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                <input type="text" name="name" class="form-control" id="video_name">
                <span id="NameForErrorMsg" style='color:red;'></span>                    
            </div>
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="orangeForm-email">Description</label>
            <input type="text" name="description" class="form-control" class="text" id="video_description"> 
                <span id="EmailforErrorMsg" style='color:red;'></span> 
            </div>

            <div class="md-form mb-4">
                <label data-error="wrong" data-success="right" for="orangeForm-pass">Video</label>
                <input type="text" name="links" class="showvideo" id="displayVideo" accept="video/*">
                <div style="display: none;" class='video-prev' class="pull-right">
                 <video height="200" width="300" class="video-preview" controls="controls"/>
             </div>
         </div>
         <div class="modal-footer d-flex justify-content-center" style="text-align: center">
        <button type="submit" class="btn btn-deep-orange" id="updateEmployee"  
        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Edit</button>
    </div>
     </div>
     
</div>
</div>
</div>