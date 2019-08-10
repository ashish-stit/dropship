<!--Add Employee Video modal-->
<div class="modal fade" id="addEmployeeVideoModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="font-size: 40px; font-weight: 100; line-height: 1; color:black;">&times;</span>
            </button>
            <h4 class="modal-title w-100 font-weight-bold">Add Video</h4>
        </div>
        <div class="modal-body mx-3">
          <form method="post" enctype="multipart/form-data" action="{{ url('admin/video') }}">
            @csrf
            <div class="md-form mb-5" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-name" style="margin-bottom: 10px;">Name</label>
                <input type="text" name="name" class="form-control VidNam">
                <span id="NameForErrorMsg" style='color:red;'></span>                    
            </div>
            <div class="md-form mb-5" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-email" style="margin-bottom: 10px;">Description</label>
                <input type="text" name="description" class="form-control DesVdo" id="text"> 
                <span id="DescriptionforErrorMsg" style='color:red;'></span> 
            </div>

            <div class="md-form mb-4" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-pass" style="margin-bottom: 10px;">Video URL</label>
                <input type="file" name="video" class="form-control showvideo VidStyl" id="file" accept="video/*">
                <div style="display: none;" class='video-prev' class="pull-right">
                   <video height="200" width="300" class="video-preview" controls="controls"/>
               </div>
               <span id="Vidsty"></span>
           </div>
       </div>
       <div class="modal-footer d-flex justify-content-center" style="text-align: center">
        <button type="submit" class="btn btn-deep-orange stylesVideos" id="addEmployes"  
        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff; margin-bottom: 10px;">Add</button>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true" style="font-size: 40px; font-weight: 100; line-height: 1; color:black;">&times;</span>
            </button>
            <h4 class="modal-title w-100 font-weight-bold" style="margin-top: 10px;">Edit Video</h4>
        </div>
        <div class="modal-body mx-3">
            <div class="md-form mb-5">                   
                <input type="hidden" name="id" class="form-control" id="empl_id">                         
            </div>
            <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="orangeForm-name" style="margin-bottom: 10px;">Name</label>
                <input type="text" name="name" class="form-control VidesNm" id="video_name" style="margin-bottom: 10px;">
                <span id="NamessForErrorMsg"></span>                    
            </div>
            <div class="md-form mb-5" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-email" style="margin-bottom: 10px;">Description</label>
            <input type="text" name="description" class="form-control vdodsc" class="text" id="video_description"> 
                <span id="descpnnforErrorMsg"></span> 
            </div>

            <div class="md-form mb-4" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-pass" style="margin-bottom: 10px;">Video URL</label>
                <input type="text" name="links" class="form-control showvideo vdosss" id="displayVideo" accept="video/*">
                <div style="display: none;" class='video-prev' class="pull-right">
                 <video height="200" width="300" class="video-preview" controls="controls"/>
             </div>
             
         </div>
         <span id="videosss"></span>
     </div>
     <div class="modal-footer d-flex justify-content-center" style="text-align: center">
        <button type="submit" class="btn btn-deep-orange updateStylessVideos" id="updateEmployee"  
        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;margin-bottom: 10px;">Update</button>
    </div>
</div>
</div>
</div>