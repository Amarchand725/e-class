$('.course-chapter-status-btn').on('change', function(){
    var status_update_url = $(this).attr('data-update-action');
    var tr_id = $(this).attr('data-chapter-id');
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
                            'You have changed course chapter status.',
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

$('.delete-course-chapter').on('click', function(){
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
                            'You have deleted course chapter.',
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

$(document).on('click', '.edit-course-chapter-btn', function(){
    $('#update-course-chapter-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();

    var course_chapter = $(this).data('course-chapters');
    $('#update-course-chapter-form').find('#course-id').val(course_chapter.course_id);
    $('#update-course-chapter-form').find('#name').val(course_chapter.name);
    if(course_chapter.status){
        $('#update-course-chapter-form').find('#edit_status').prop('checked',true);
    }
    
    $('#course-id').val($(this).attr('data-coursechapter-id'));
    $('#edit-course-chapter-modal').modal('show');
});

$('#update-course-chapter-form').on('submit',function(e){
    e.preventDefault();

    var course_chapter_update_url = $('.edit-course-chapter-btn').attr('data-update-action');
    var formData = $(this).serializeArray({ icon: "icon", detail: 'detail', edit_status:'edit_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_chapter_update_url,
        type:"PUT",
        data: formData,
        success:function(response){
            $('#edit-course-chapter-modal').modal('hide');
            if(response.code==200){
                $('#course-chapter-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Coursechapter updated successfully.',
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

$('#add-course-chapter-form').on('submit',function(e){
    e.preventDefault();
    var course_chapter_store_url = $(this).attr('data-course-form');
    var formData = $(this).serializeArray({name: 'name', ci_status:'ci_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_chapter_store_url,
        type:"POST",
        data: formData,
        success:function(response){
            $('#add-course-chapter-modal').modal('hide');
            if(response.code==200){
                $('#course-chapter-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Coursechapter added successfully.',
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
            if(response.responseJSON.errors.name){
                $('#error-name').text(response.responseJSON.errors.name);
            }else{
                $('#error-name').text('');
            }
        },
    });
});

$(document).on('click', '.add-course-chapter-btn', function(){
    $('#add-course-chapter-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();
    
    $('#add-course-chapter-form').find('#course-id').val($(this).attr('data-course-id'));
    $('#add-course-chapter-modal').modal('show');
});