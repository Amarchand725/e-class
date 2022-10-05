$('.course-whatlearn-status-btn').on('change', function(){
    var status_update_url = $(this).attr('data-update-action');
    var tr_id = $(this).attr('data-whatlearn-id');
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
                            'You have changed course whatlearn status.',
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

$('.delete-course-whatlearn').on('click', function(){
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
                        $('#id-'+slug).remove();
                        Swal.fire(
                            'Deleted!',
                            'You have deleted course whatlearn.',
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

$(document).on('click', '.edit-course-whatlearn-btn', function(){
    $('#update-course-whatlearn-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();

    var course_whatlearn = $(this).data('course-whatlearns');
    $('#update-course-whatlearn-form').find('#course-id').val(course_whatlearn.course_id);
    $('#update-course-whatlearn-form').find('#icon').val(course_whatlearn.icon);
    $('#update-course-whatlearn-form').find('#detail').val(course_whatlearn.detail);
    if(course_whatlearn.status){
        $('#update-course-whatlearn-form').find('#edit_status').prop('checked',true);
    }
    
    $('#course-whatlearn-id').val($(this).attr('data-coursewhatlearn-id'));
    $('#edit-course-whatlearn-modal').modal('show');
});

$('#update-course-whatlearn-form').on('submit',function(e){
    e.preventDefault();

    var course_whatlearn_update_url = $('.edit-course-whatlearn-btn').attr('data-update-action');
    // alert(course_whatlearn_update_url);
    var formData = $(this).serializeArray({ icon: "icon", detail: 'detail', edit_status:'edit_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_whatlearn_update_url,
        type:"PUT",
        data: formData,
        success:function(response){
            $('#edit-course-whatlearn-modal').modal('hide');
            if(response.code==200){
                $('#course-whatlearn-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Coursewhatlearn updated successfully.',
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

$('#add-course-whatlearn-form').on('submit',function(e){
    e.preventDefault();
    var course_whatlearn_store_url = $(this).attr('data-course-form');
    var formData = $(this).serializeArray({ icon: "icon", detail: 'detail', ci_status:'ci_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_whatlearn_store_url,
        type:"POST",
        data: formData,
        success:function(response){
            $('#add-course-whatlearn-modal').modal('hide');
            // console.log(response);
            if(response.code==200){
                $('#course-whatlearn-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Coursewhatlearn added successfully.',
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

$(document).on('click', '.add-course-whatlearn-btn', function(){
    $('#add-course-whatlearn-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();
    
    $('#add-course-whatlearn-form').find('#course-id').val($(this).attr('data-course-id'));
    $('#add-course-whatlearn-modal').modal('show');
});