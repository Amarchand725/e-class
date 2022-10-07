<?php $__currentLoopData = $coursequestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$coursequestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($coursequestion->id); ?>">
        <td><?php echo e($coursequestions->firstItem()+$key); ?>.</td>
        <td><?php echo $coursequestion->question; ?></td>
        <td>
            <div class="switch">
                <input id="question_status-<?php echo e($coursequestion->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-question-status-btn" data-question-id="<?php echo e($coursequestion->id); ?>" data-update-action="<?php echo e(route('coursequestion.update', $coursequestion->id)); ?>" <?php if($coursequestion->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                <label for="question_status-<?php echo e($coursequestion->id); ?>"></label>
            </div>
        </td>
        <td width="250px">  
            <button data-toggle="tooltip" data-update-action="<?php echo e(route('coursequestion.update', $coursequestion->id)); ?>" data-course-questions="<?php echo e($coursequestion); ?>" data-question-id="<?php echo e($coursequestion->course_id); ?>"  data-placement="top" title="Edit Course coursequestion" class="btn btn-primary btn-xs edit-course-question-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
            <button data-toggle="tooltip" data-placement="top" title="Delete Course coursequestion" class="btn btn-danger btn-xs delete-course-question" data-slug="<?php echo e($coursequestion->id); ?>" data-del-url="<?php echo e(route("coursequestion.destroy", $coursequestion->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="15">
        Displying <?php echo e($coursequestions->firstItem()); ?> to <?php echo e($coursequestions->lastItem()); ?> of <?php echo e($coursequestions->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $coursequestions->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>

<script>
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
</script><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/courseincludes/questions/listing.blade.php ENDPATH**/ ?>