<!--Add Employee Video modal-->
<div class="modal fade" id="addAdminThumbModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title w-100 font-weight-bold" style="margin-top: 10px;">Add Thumbnail Video</h4>
        </div>
        <div class="modal-body mx-3">
          <form method="post"  action="{{url('admin/thumb') }}">
            @csrf
         <div class="md-form mb-4" style="margin-bottom: 10px;">
                <label data-error="wrong" data-success="right" for="orangeForm-pass" style="margin-bottom: 10px;">Video URL</label>
                <input type="text" name="video" id="ThumnailIdVideo" class="form-control">
           </div>
           <span id="videoShowMessages"></span>
       </div>
       <div class="modal-footer d-flex justify-content-center" style="text-align: center">
        <button type="submit" class="btn btn-deep-orange videosSavBt"  
        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;margin-bottom: 10px;">Add</button>
    </div>
</form>
</div>
</div>
</div>

<!-- End Add Employee Video modal-->