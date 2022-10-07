<?php $__currentLoopData = $courseannouncements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$courseannouncement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr id="id-<?php echo e($courseannouncement->id); ?>">
        <td><?php echo e($courseannouncements->firstItem()+$key); ?>.</td>
        <td><?php echo $courseannouncement->announcement; ?></td>
        <td>
            <div class="switch">
                <input id="announcement_status-<?php echo e($courseannouncement->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-announcement-status-btn" data-announcement-id="<?php echo e($courseannouncement->id); ?>" data-update-action="<?php echo e(route('courseannouncement.update', $courseannouncement->id)); ?>" <?php if($courseannouncement->status): ?> value="1" checked <?php endif; ?> name="status" type="checkbox">
                <label for="announcement_status-<?php echo e($courseannouncement->id); ?>"></label>
            </div>
        </td>
        <td width="250px">  
            <button data-toggle="tooltip" data-update-action="<?php echo e(route('courseannouncement.update', $courseannouncement->id)); ?>" data-course-announcements="<?php echo e($courseannouncement); ?>" data-announcement-id="<?php echo e($courseannouncement->course_id); ?>"  data-placement="top" title="Edit Course courseannouncement" class="btn btn-primary btn-xs edit-course-announcement-btn" style="margin-left: 3px;"><i class="fa fa-edit"></i></button>
            <button data-toggle="tooltip" data-placement="top" title="Delete Course courseannouncement" class="btn btn-danger btn-xs delete-course-announcement" data-slug="<?php echo e($courseannouncement->id); ?>" data-del-url="<?php echo e(route("courseannouncement.destroy", $courseannouncement->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="15">
        Displying <?php echo e($courseannouncements->firstItem()); ?> to <?php echo e($courseannouncements->lastItem()); ?> of <?php echo e($courseannouncements->total()); ?> records
        <div class="d-flex justify-content-center">
            <?php echo $courseannouncements->links('pagination::bootstrap-4'); ?>

        </div>
    </td>
</tr>

<script>
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
</script><?php /**PATH C:\xampp\htdocs\e-class\resources\views/web-views/website/courseincludes/announcements/listing.blade.php ENDPATH**/ ?>