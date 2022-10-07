$('.course-class-status-btn').on('change', function(){
    var status_update_url = $(this).attr('data-update-action');
    var tr_id = $(this).attr('data-class-id');
    var change_status = $(this).val();
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to change status!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : status_update_url,
                type : 'PUT',
                data : {change_status:change_status},
                success : function(response){
                    if(response){
                        Swal.fire(
                            'Changed!',
                            'You have changed course class status.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Not Changed!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }else{
            if(change_status==1){
                $('#course-class-body').find('#id-'+tr_id).find('#class_status-'+tr_id).prop('checked',true);
            }else{
                $('#course-class-body').find('#id-'+tr_id).find('#class_status-'+tr_id).prop('checked',false);
            }
        }
    })
});

$('.course-class-featured-btn').on('change', function(){
    var status_update_url = $(this).attr('data-update-action');
    var tr_id = $(this).attr('data-class-id');
    var is_featured = $(this).val();
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to change status!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : status_update_url,
                type : 'PUT',
                data : {is_featured:is_featured},
                success : function(response){
                    if(response){
                        Swal.fire(
                            'Changed!',
                            'You have changed course class featured.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Not Changed!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }else{
            if(is_featured){
                $('#course-class-body').find('#id-'+tr_id).find('#is_featured-'+tr_id).prop('checked',true);
            }else{
                $('#course-class-body').find('#id-'+tr_id).find('#is_featured-'+tr_id).prop('checked',false);
            }
        }
    })
});

$('.delete-course-class').on('click', function(){
    var slug = $(this).attr('data-slug');
    var delete_url = $(this).attr('data-del-url');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url : delete_url,
                type : 'DELETE',
                success : function(response){
                    if(response){
                        $('#course-class-body').find('#id-'+slug).remove();
                        Swal.fire(
                            'Deleted!',
                            'You have deleted course class.',
                            'success'
                        )
                    }else{
                        Swal.fire(
                            'Not Deleted!',
                            'Sorry! Something went wrong.',
                            'danger'
                        )
                    }
                }
            });
        }
    })
});

$(document).on('click', '.edit-course-class-btn', function(){
    $('#update-course-class-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();

    var edit_course_class_url = $(this).attr('data-edit-class-url');

    $.ajax({
        type:'get',
        url: edit_course_class_url,
        success: function( response ) {
            $('.edit-course-class-details').html(response);
        }
    });
    
    $('#course-id').val($(this).attr('data-courseclass-id'));
    $('#edit-course-class-modal').modal('show');
});

$('#update-course-class-form').on('submit',function(e){
    e.preventDefault();

    var course_class_update_url = $('.edit-course-class-btn').attr('data-update-action');
    var formData = $(this).serializeArray();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_class_update_url,
        type:"PUT",
        data: formData,
        success:function(response){
            $('#edit-course-class-modal').modal('hide');
            if(response.code==200){
                $('#course-class-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Courseclass updated successfully.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong try again.',
                })
            }
        },
        error: function(response) {
            if(response.responseJSON.errors.icon){
                $('#error-icon').text(response.responseJSON.errors.icon);
            }else{
                $('#error-icon').text('');
            }
            if(response.responseJSON.errors.detail){
                $('#error-detail').text(response.responseJSON.errors.detail);
            }else{
                $('#error-detail').text('');
            }
        },
    });
});

$('#add-course-class-form').on('submit',function(e){
    e.preventDefault();
    var course_class_store_url = $(this).attr('data-course-form');
        
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_class_store_url,
        type:"POST",
        // data: formData,
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success:function(response){
            $('#add-course-class-modal').modal('hide');
            if(response.code==200){
                $('#course-class-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Courseclass added successfully.',
                    showConfirmButton: false,
                    timer: 1500
                })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong try again.',
                })
            }
        },
        error: function(response) {
            if(response.responseJSON.errors.course_id){
                $('#error-course_id').text(response.responseJSON.errors.course_id);
            }else{
                $('#error-course_id').text('');
            }
            if(response.responseJSON.errors.chapter_id){
                $('#error-chapter_id').text(response.responseJSON.errors.chapter_id);
            }else{
                $('#error-chapter_id').text('');
            }
            if(response.responseJSON.errors.title){
                $('#error-title').text(response.responseJSON.errors.title);
            }else{
                $('#error-title').text('');
            }
            if(response.responseJSON.errors.type){
                $('#error-type').text(response.responseJSON.errors.type);
            }else{
                $('#error-type').text('');
            }
        },
    });
});

$(document).on('click', '.add-course-class-btn', function(){
    $('#add-course-class-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();
    
    $('#add-course-class-form').find('#course-id').val($(this).attr('data-course-id'));
    $('#add-course-class-modal').modal('show');
});

$(document).on('change', '.file-type', function(){
    var type = $(this).val();
    var html = '';
    if(type=='Video'){
            html = '<div class="form-group">'+
                        '<label for="lecture" class="col-sm-3 control-label">Lecture </label>'+
                        '<div class="col-sm-8">'+
                            '<input type="file" class="form-control" id="lecture" name="lecture" accept="video/*">'+
                        '</div>'+
                    '</div>';
    }else if(type=='Audio'){
        html = '<div class="form-group">'+
                    '<label for="attachment" class="col-sm-3 control-label">Audio </label>'+
                    '<div class="col-sm-8">'+
                        '<input type="file" class="form-control" id="attachment" name="attachment" accept="audio/*">'+
                    '</div>'+
                '</div>';
    }else if(type=='Image'){
        html = '<div class="form-group">'+
                    '<label for="attachment" class="col-sm-3 control-label">Image </label>'+
                    '<div class="col-sm-8">'+
                        '<input type="file" class="form-control" id="attachment" name="attachment" accept="image/*">'+
                    '</div>'+
                '</div>';
    }else{
        html = '<div class="form-group">'+
                    '<label for="attachment" class="col-sm-3 control-label">Attachment Docs </label>'+
                    '<div class="col-sm-8">'+
                        '<input type="file" class="form-control" id="attachment" name="attachment" accept="application/pdf,application/msword">'+
                    '</div>'+
                '</div>';
    }

    $('#class-custom').html(html);
});

$(document).on('change', '.edit-file-type', function(){
    var type = $(this).val();
    var html = '';
    if(type=='Video'){
            html = '<div class="form-group">'+
                        '<label for="lecture" class="col-sm-3 control-label">Lecture </label>'+
                        '<div class="col-sm-8">'+
                            '<input type="file" class="form-control" id="lecture" name="lecture" accept="video/*">'+
                        '</div>'+
                    '</div>';
    }else if(type=='Audio'){
        html = '<div class="form-group">'+
                    '<label for="attachment" class="col-sm-3 control-label">Audio </label>'+
                    '<div class="col-sm-8">'+
                        '<input type="file" class="form-control" id="attachment" name="attachment" accept="audio/*">'+
                    '</div>'+
                '</div>';
    }else if(type=='Image'){
        html = '<div class="form-group">'+
                    '<label for="attachment" class="col-sm-3 control-label">Image </label>'+
                    '<div class="col-sm-8">'+
                        '<input type="file" class="form-control" id="attachment" name="attachment" accept="image/*">'+
                    '</div>'+
                '</div>';
    }else{
        html = '<div class="form-group">'+
                    '<label for="attachment" class="col-sm-3 control-label">Attachment Docs </label>'+
                    '<div class="col-sm-8">'+
                        '<input type="file" class="form-control" id="attachment" name="attachment" accept="application/pdf,application/msword">'+
                    '</div>'+
                '</div>';
    }

    $('#edit-class-custom').html(html);
});