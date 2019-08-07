<!--Add Employee Video modal-->
<div class="modal fade" id="addAdminThumbModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Add Thumbnail Video</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
          <form method="post"  action="{{url('admin/thumb') }}">
            @csrf
         <div class="md-form mb-4">
                <label data-error="wrong" data-success="right" for="orangeForm-pass">Video</label>
                <input type="text" name="video">
                
           </div>
       </div>
       <div class="modal-footer d-flex justify-content-center" style="text-align: center">
        <button type="submit" class="btn btn-deep-orange"  
        style="width:30%;letter-spacing: 1px;background-color:#08c;color: #fff;">Add</button>
    </div>
</form>
</div>
</div>
</div>

<!-- End Add Employee Video modal-->