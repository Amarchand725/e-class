<?php $__currentLoopData = $includes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$include): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($include->id); ?>">
        <td><?php echo e($includes->firstItem()+$key); ?>.</td>
        <td><?php echo $include->icon; ?></td>
        <td><?php echo $include->detail; ?></td>
        <td>
            <div class="switch">
                <input id="inc_status-<?php echo e($include->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-include-status-btn" data-include-id="<?php echo e($include->id); ?>" data-update-action="<?php echo e(route('courseinclude.update', $include->id)); ?>" <?php if($include->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                <label for="inc_status-<?php echo e($include->id); ?>"></label>
            </div>
        </td>
        <td width="250px">  
            <button data-toggle="tooltip" data-update-action="<?php echo e(route('courseinclude.update', $include->id)); ?>" data-course-id="<?php echo e($include->course_id); ?>" data-course-includes="<?php echo e($include); ?>" data-placement="top" title="Edit Course include" class="btn btn-primary btn-xs edit-course-include-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
            <button data-toggle="tooltip" data-placement="top" title="Delete Course include" class="btn btn-danger btn-xs delete-course-include" data-slug="<?php echo e($include->id); ?>" data-del-url="<?php echo e(route("courseinclude.destroy", $include->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="15">
        Displying <?php echo e($includes->firstItem()); ?> to <?php echo e($includes->lastItem()); ?> of <?php echo e($includes->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $includes->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>

<script>
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
</script><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/courseincludes/includes/listing.blade.php ENDPATH**/ ?>