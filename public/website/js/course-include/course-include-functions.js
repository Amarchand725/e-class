$('.course-include-status-btn').on('change', function(){
    var status_update_url = $(this).attr('data-update-action');
    var tr_id = $(this).attr('data-include-id');
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
                            'You have changed course include status.',
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
                $('#id-'+tr_id).find('#inc_status-'+tr_id).prop('checked',true);
            }else{
                $('#id-'+tr_id).find('#inc_status-'+tr_id).prop('checked',false);
            }
        }
    })
});

$('.delete-course-include').on('click', function(){
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
                        $('#id-'+slug).hide();
                        Swal.fire(
                            'Deleted!',
                            'You have deleted course include.',
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

$(document).on('click', '.edit-course-include-btn', function(){
    $('#update-course-include-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();

    var course_include = $(this).data('course-includes');
    $('#update-course-include-form').find('#course-id').val(course_include.course_id);
    $('#update-course-include-form').find('#icon').val(course_include.icon);
    $('#update-course-include-form').find('#detail').val(course_include.detail);
    if(course_include.status){
        $('#update-course-include-form').find('#edit_status').prop('checked',true);
    }
    
    $('#course-include-id').val($(this).attr('data-courseinclude-id'));
    $('#edit-course-include-modal').modal('show');
});

$('#update-course-include-form').on('submit',function(e){
    e.preventDefault();

    var course_include_update_url = $('.edit-course-include-btn').attr('data-update-action');
    var formData = $(this).serializeArray({ icon: "icon", detail: 'detail', edit_status:'edit_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_include_update_url,
        type:"PUT",
        data: formData,
        success:function(response){
            $('#edit-course-include-modal').modal('hide');
            if(response.code==200){
                $('#course-include-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Courseinclude updated successfully.',
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

$('#add-course-include-form').on('submit',function(e){
    e.preventDefault();
    var course_include_store_url = $(this).attr('data-course-form');
    var formData = $(this).serializeArray({ icon: "icon", detail: 'detail', ci_status:'ci_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_include_store_url,
        type:"POST",
        data: formData,
        success:function(response){
            $('#add-course-include-modal').modal('hide');
            if(response.code==200){
                $('#course-include-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Courseinclude added successfully.',
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

$(document).on('click', '.add-course-include-btn', function(){
    $('#add-course-include-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();
    
    $('#course-id').val($(this).attr('data-course-id'));
    $('#add-course-include-modal').modal('show');
});