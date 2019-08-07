//Add Employees
var _active;
$(document).on('click', '#addEmployee', function () {
    var empName = $(this).parent().siblings('.modal-body').find('#employeeName').val();
    var empEmail = $(this).parent().siblings('.modal-body').find('#employeeEmail').val();    
    var empContact = $(this).parent().siblings('.modal-body').find('#employeeContact').val();
    var activeChkId = $(this).parent().siblings('.modal-body').find('#chk_1');
    var deActiveChkId = $(this).parent().siblings('.modal-body').find('#chk_0');
    //    validation
    if(empEmail == "" ){
         $('#errorMessage').css('display','block').html('Email can not be left blank');
        $('#employeeEmail').css('border','1px solid red').focus();
        return false;
     }
    if ($(activeChkId).prop('checked') == false && $(deActiveChkId).prop('checked') == false){
        $('.chekErrorMsg').html('Please Select One').css('color','red');
        return false;
    }
  
    if ($(activeChkId).is(':checked') == true)
    {      
        _active = 1;
        
    } else if ($(deActiveChkId).is(':checked') == true)
    {       
        _active = 0;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/addEmployee',
        type: "POST",
        data: {empValue: empName, empEmail: empEmail, empContact: empContact, status: _active},
        dataType: 'json',
        success: function (data)
        {
            if (data.message == 'success') {
                $('#employeeName').val("");
                $('#employeeEmail').val("");
                $('#employeeContact').val("");
                $('#chk_1').prop('checked', false);
                $('#chk_0').prop('checked', false);
                alert('Record Added Successfully');
                $('#addEmployeeModalForm').modal('hide');
                $('#employeeEmail').removeAttr('style');
                $('.appendData').append('<tr id='+ data.employeeData.id +'><td>' + data.employeeData.id + '</td>\n\
                    <td id="empName">' + data.employeeData.name + '</td><td id="empEmail">' + data.employeeData.email + '</td>\n\
                    <td id="empContact">' + data.employeeData.contact + '</td>\n\
                    <td>' + data.employeeData.last_login + '</td><td id="empStatus">' + (data.employeeData.status == 1 ?  "Active"  :  "") + (data.employeeData.status == 0 ?  "Deactive"  :  "") + '</td>\n\
                    <td><a id="emp_' + data.employeeData.id + '" class="editEmp" style="margin:1rem 1rem"><i class="fa fa-edit"></i></a>\n\
                    <a id="emp_' + data.employeeData.id + '" class="removeEmp"><i class="fa fa-trash"></i></a>\n\
                    </td>\n\
                    </tr>')
                }else if(data.message == 'user_exists'){
                    $('#errorMessage').css('display','block').html('User Already exists');
                    $('#employeeEmail').css('border','1px solid red').focus();
                }
                else {
                    alert(data.error);
                }
        }
    });

});
//end

//Delete Employee
$(document).on('click', '.removeEmp', function () {
    if (!confirm("Are you sure you want to delete.?")) {
        return false;
    }
    var OBJ = $(this);
    var id = $(this).attr('id').split('_');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/removeEmployee',
        type: "delete",
        data: {empid: id[1]},
        dataType: 'json',
        success: function (data) {
            if (data.message == 'success') {
                //alert("Data Succesfully Deleted");
                $(OBJ).parent().parent().remove();
            } else {
                alert(data.error);
            }
        }
    });
});

//end

//edit Employee
var _empId;
$(document).on('click', '.editEmp', function () {
    var empId = $(this).attr('id').split('_');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/updateEmp',
        type: "post",
        data: {empIds: empId[1]},
        dataType: 'json',
        success: function (data)
        {
            if (data.message == 'success') {
                $("#editEmployeeModalForm").modal('show');
                $("#emp_id").val(data.emp_data.id);
                $("#user_id").val(data.emp_data.user_id);
                $("#emp_name").val(data.emp_data.name);
                $("#emp_email").val(data.emp_data.email);
                $("#emp_contact").val(data.emp_data.contact);
                if (data.emp_data.status == 1) {
                    $("#chek_1").prop('checked', true);
                } else {
                    $("#chek_0").prop('checked', true);
                }
            } else {
                alert(data.error);
            }
        }
    });
    _empId = empId[1];
});
//end

//update
$(document).on('click','#UpdateEmp', function () {
    var id = _empId;
    var active;
    var name = $(this).parents('.modal-content').find('#emp_name').val();
    var userId = $(this).parents('.modal-content').find('#user_id').val();
    var email = $(this).parents('.modal-content').find('#emp_email').val();
    var contact = $(this).parents('.modal-content').find('#emp_contact').val();
    var activeChkId = $(this).parents('.modal-content').find('#chek_1');
    var deActiveChkId = $(this).parents('.modal-content').find('#chek_0');
    
    if ($(activeChkId).is(':checked') == true)
    {
        active = 1;
        
    } else if ($(deActiveChkId).is(':checked') == true)
    {
        active = 0;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/updateEmpData',
        type: "POST",
        data: {id: id, user_id : userId, emp_name: name, emp_email: email, emp_cnt: contact, sts: active},
        dataType: 'json',
        success: function (data)
        {           
            if (data.messsage == 'success') {
                 alert('Record Updated Successfully');
                $('#emp_name').val("");
                $('#emp_email').val("");
                $('#emp_contact').val("");
                $('#chek_1').prop('checked', false);
                $('#chek_0').prop('checked', false);               
                $('#editEmployeeModalForm').modal('hide');              
                $('#' + data.emp_data.id).find('#empName').html(data.emp_data.name);
                $('#' + data.emp_data.id).find('#empEmail').html(data.emp_data.email);
                $('#' + data.emp_data.id).find('#empContact').html(data.emp_data.contact);
                if(data.emp_data.status == 1){
                    $('#' + data.emp_data.id).find('#empStatus').html('Active');
                }else if( data.emp_data.status == 0 ){
                    $('#' + data.emp_data.id).find('#empStatus').html('Deactive');
                }
             
            } else {
                alert(data.error);
            }
        }
    });

});
//end

//upload video by Emp
$(document).on('click', '.openUploadVideoModal', function () {
    $('#AddCustomerVideo').modal('show');
    var orderVideoId = $(this).attr('id').split('_');
    $('#orderIdForUploadVideo').val(orderVideoId[1]);
});
//upload video Modal
$(document).on('submit', '.customerVideo', function () {
    var video_path = $('.customerVideo')[0];
    var data = new FormData(video_path);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        enctype: 'multipart/form-data',
        url: webUrl + '/addVideo',
        data: data,
        type: "post",
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data)
        {
            if (data.message == 'success') {
                alert('Uploaded SuccesFully !!');
                $('#AddCustomerVideo').modal('hide');
                $('#uploadedVideo').val('');
            } else {
                alert(data.error);
            }
        }
    });
});
function readURL(input){
    if(input.files && input.files[0]){
      var reader = new FileReader();
      reader.onload = function(e){
          $('#ImgId').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
}
$('#showImg').change(function(){
    readURL(this);
});
$(function() {
    $('.showvideo').on('change', function(){
      if (isVideo($(this).val())){
        $('.video-preview').attr('src', URL.createObjectURL(this.files[0]));
        $('.video-prev').show();
      }
      else
      {
        $('.showvideo').val('');
        $('.video-prev').hide();
        alert("Only video files are allowed to upload.")
      }
    });
  });
  function isVideo(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
      case 'm4v':
      case 'avi':
      case 'mpg':
      case 'mp4':
      case 'mov':
      case 'mpg':
      case 'mpeg':
      case 'webm':
      case '3gp':
        // etc
        return true;
      }
      return false;
    }

    function getExtension(filename) {
      var parts = filename.split('.');
      return parts[parts.length - 1];
    }
    
    
    //edit Imagelayout
var _empId;
$(document).on('click', '.editImg', function () {
    var img_Id = $(this).attr('id');
   
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/updateImg',
        type: "post",
        enctype:'multipart/form-data',
        data: {ImgId: img_Id},
        dataType: 'json',
        
        success: function (data)
        {
            if (data.message == 'success') {
                $("#editImageModalForm").modal('show');
                $("#img_id").val(data.admin_img_data.id);
                $("#img_size").val(data.admin_img_data.image_size);
                $("#img_desc").val(data.admin_img_data.description);
                $("#img").val(data.admin_img_data.img);
               
            } 
            else {
                alert(data.error);
            }
        }
    });
    _empId = img_Id;
});
//end Image layout
  $(document).on('click','#UpdateImglayout', function () {
    var id = _empId;
    var size = $(this).parents('.modal-content').find('#img_size').val();
    var desc= $(this).parents('.modal-content').find('#img_desc').val();
    var img = $(this).parents('.modal-content').find('#img').val();
     $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/UpdateImglayout',
        type: "POST",
        data: {id: id,  img_size: size, img_desc: desc, image:img},
        dataType: 'json',
        success: function (data)
        {           
            if (data.messsage == 'success') {
                 alert('Record Updated Successfully');
                $('#img_size').val("");
                $('#img_desc').val("");
                $('#img').val("");               
                $('#editEmployeeModalForm').modal('hide');              
                $('#' + data.admin_img_data.id).find('#empName').html(data.admin_img_data.size);
                $('#' + data.admin_img_data.id).find('#empEmail').html(data.admin_img_data.desc);
                $('#' + data.admin_img_data.id).find('#empContact').html(data.admin_img_data.img);
            } 
            else {
                alert(data.error);
            }
        }
    });

});
//end


//Edit tumbnail
var _empId;
$(document).on('click', '.Editthumb', function () {
    var thum_Id= $(this).attr('id');
    //alert(img_Id);
   
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/Editthum',
        type: "post",
        enctype:'multipart/form-data',
        data: {ThumId: thum_Id},
        dataType: 'json',
        
        success: function (data)
        {
            if (data.message == 'success') {
                $("#editThumbModalForm").modal('show');
                $("#img_id").val(data.admin_thum_data.id);
                $("#thum_video").val(data.admin_thum_data.thum_video);
               
            } 
            else {
                alert(data.error);
            }
        }
    });
    _empId = thum_Id;
});
//end
//update thumbnail
$(document).on('click','#UpdateThumbnaillayout', function () {
    var id = _empId;
    var thum_video = $(this).parents('.modal-content').find('#thum_video').val();
     $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/UpdateThumblayout',
        type: "POST",
        data: {id: id,  thumb: thum_video},
        dataType: 'json',
        success: function (data)
        {           
            if (data.messsage == 'success') {
                 alert('Record Updated Successfully');
                $('#thum_video').val("");
                 $('#editThumbModalForm').modal('hide');              
                $('#' + data.thumb_video_data.id).find('#thum_video').html(data.thumb_video_data.video);
               } 
            else {
                alert(data.error);
            }
        }
    });

});
var _employeeId;
$(document).on('click', '.editAddVideo', function() {
    var EmployId = $(this).attr('id');

    //alert(EmployId);return false;
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/updateEditEmp',
        type: "post",
        data: {empEditId: EmployId},
        dataType: 'json',
        success: function (data)
        {
            if(data.message == 'success'){
                $("#addEmployeeEditVideoModalForm").modal('show');
                $("#empl_id").val(data.empdata.id);
                $("#video_name").val(data.empdata.name);
                $("#video_description").val(data.empdata.description);
                $("#displayVideo").val(data.empdata.links);

            }else{
                alert(data.error);
            }
        }
    });
    _employeeId = EmployId;
});
//edit Employee

$(document).on('click', '#updateEmployee', function () {
    var id = _employeeId;
    //alert(id);return false;
    var name = $(this).parents('.modal-content').find('#video_name').val();
    var description = $(this).parents('.modal-content').find('#video_description').val();
    var links = $(this).parents('.modal-content').find('#displayVideo').val();
    //alert(links);return false;

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: webUrl + '/updateEditEmpData',
        type: "POST",
        data: {id: id, links: links, name: name, description: description},
        dataType: 'json',
        success: function (data)
        {
            if(data.message == 'success'){
                alert('Record Updated Successfully');
                $('#video_name').val("");
                $('#video_description').val("");
                $('#displayVideo').val("");
                $('#' + data.employDat.id).find('#vidName').html(data.employDat.name);
                $('#' + data.employDat.id).find('#vidDesc').html(data.emp_data.description);
                $('#' + data.employDat.id).find('#vidLinks').html(data.emp_data.links);

            }else{
               alert(data.error);
           }
       }
   });
});

//end

    
    
    