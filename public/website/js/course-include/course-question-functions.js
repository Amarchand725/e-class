$('.course-question-status-btn').on('change', function(){
    var status_update_url = $(this).attr('data-update-action');
    var tr_id = $(this).attr('data-question-id');
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
                            'You have changed course question status.',
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
                $('#course-question-body').find('#id-'+tr_id).find('#question_status-'+tr_id).prop('checked',true);
            }else{
                $('#course-question-body').find('#id-'+tr_id).find('#question_status-'+tr_id).prop('checked',false);
            }
        }
    })
});

$('.delete-course-question').on('click', function(){
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
                            'You have deleted course question.',
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

$(document).on('click', '.edit-course-question-btn', function(){
    $('#update-course-question-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();

    var course_question = $(this).data('course-questions');
    $('#update-course-question-form').find('#course-id').val(course_question.course_id);
    $('#update-course-question-form').find('#question').val(course_question.question);
    if(course_question.status){
        $('#update-course-question-form').find('#edit_status').prop('checked',true);
    }
    
    $('#course-id').val($(this).attr('data-coursequestion-id'));
    $('#edit-course-question-modal').modal('show');
});

$('#update-course-question-form').on('submit',function(e){
    e.preventDefault();

    var course_question_update_url = $('.edit-course-question-btn').attr('data-update-action');
    var formData = $(this).serializeArray({ icon: "icon", detail: 'detail', edit_status:'edit_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_question_update_url,
        type:"PUT",
        data: formData,
        success:function(response){
            $('#edit-course-question-modal').modal('hide');
            if(response.code==200){
                $('#course-question-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Coursequestion updated successfully.',
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
            if(response.responseJSON.errors.question){
                $('#error-question').text(response.responseJSON.errors.question);
            }else{
                $('#error-question').text('');
            }
        },
    });
});

$('#add-course-question-form').on('submit',function(e){
    e.preventDefault();
    var course_question_store_url = $(this).attr('data-course-form');
    var formData = $(this).serializeArray({name: 'name', ci_status:'ci_status' });
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: course_question_store_url,
        type:"POST",
        data: formData,
        success:function(response){
            $('#add-course-question-modal').modal('hide');
            if(response.code==200){
                $('#course-question-body').html(response.listing);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Coursequestion added successfully.',
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
            if(response.responseJSON.errors.question){
                $('#error-question').text(response.responseJSON.errors.question);
            }else{
                $('#error-question').text('');
            }
        },
    });
});

$(document).on('click', '.add-course-question-btn', function(){
    $('#add-course-question-form')
    .find("input,textarea")
    .val('')
    .end()
    .find("input[type=checkbox]")
    .prop("checked", "")
    .end();
    
    $('#add-course-question-form').find('#course-id').val($(this).attr('data-course-id'));
    $('#add-course-question-modal').modal('show');
});