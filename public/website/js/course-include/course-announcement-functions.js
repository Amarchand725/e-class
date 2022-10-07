$('.course-announcement-status-btn').on('change', function(){
    var status_update_url = $(this).attr('data-update-action');
    var tr_id = $(this).attr('data-announcement-id');
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
                            'You have changed course announcement status.',
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
                $('#course-announcement-body').find('#id-'+tr_id).find('#announcement_status-'+tr_id).prop('checked',true);
            }else{
                $('#course-announcement-body').find('#id-'+tr_id).find('#announcement_status-'+tr_id).prop('checked',false);
            }
        }
    })
});

$('.delete-course-announcement').on('click', function(){
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
                        $('#course-announcement-body').find('#id-'+slug).remove();
                        Swal.fire(
                            'Deleted!',
                            'You have deleted course announcement.',
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

$(document).on('click', '.edit-course-announcement-btn', function(){
    $('#update-course-announcement-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();

    var course_announcement = $(this).data('course-announcements');
    $('#update-course-announcement-form').find('#course-id').val(course_announcement.course_id);
    $('#update-course-announcement-form').find('#announcement').val(course_announcement.announcement);
    if(course_announcement.status){
        $('#update-course-announcement-form').find('#edit_status').prop('checked',true);
    }
    
    $('#course-id').val($(this).attr('data-courseannouncement-id'));
    $('#edit-course-announcement-modal').modal('show');
});

$('#update-course-announcement-form').on('submit',function(e){
    e.preventDefault();

    var course_announcement_update_url = $('.edit-course-announcement-btn').attr('data-update-action');
    var formData = $(this).serializeArray({ icon: "icon", detail: 'detail', edit_status:'edit_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_announcement_update_url,
        type:"PUT",
        data: formData,
        success:function(response){
            $('#edit-course-announcement-modal').modal('hide');
            if(response.code==200){
                $('#course-announcement-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Courseannouncement updated successfully.',
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
            if(response.responseJSON.errors.announcement){
                $('#error-announcement').text(response.responseJSON.errors.announcement);
            }else{
                $('#error-announcement').text('');
            }
        },
    });
});

$('#add-course-announcement-form').on('submit',function(e){
    e.preventDefault();
    var course_announcement_store_url = $(this).attr('data-course-form');
    var formData = $(this).serializeArray({name: 'name', ci_status:'ci_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_announcement_store_url,
        type:"POST",
        data: formData,
        success:function(response){
            $('#add-course-announcement-modal').modal('hide');
            if(response.code==200){
                $('#course-announcement-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Courseannouncement added successfully.',
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
            if(response.responseJSON.errors.announcement){
                $('#error-announcement').text(response.responseJSON.errors.announcement);
            }else{
                $('#error-announcement').text('');
            }
        },
    });
});

$(document).on('click', '.add-course-announcement-btn', function(){
    $('#add-course-announcement-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();
    
    $('#add-course-announcement-form').find('#course-id').val($(this).attr('data-course-id'));
    $('#add-course-announcement-modal').modal('show');
});