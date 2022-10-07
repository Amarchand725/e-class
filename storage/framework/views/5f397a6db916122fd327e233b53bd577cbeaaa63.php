
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="page_url" value="<?php echo e(route('bundle.index')); ?>">
<section class="content-header">
    <div class="content-header-left">
        <h1><?php echo e($page_title); ?></h1>
    </div>
    <div class="content-header-right">
        <a href="<?php echo e(route('bundle.create')); ?>" data-toggle="tooltip" data-placement="left" title="Add New Bundle" class="btn btn-primary btn-sm">Add New Bundle</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('success')): ?>
                <div class="callout callout-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-1">Search:</div>
                        <div class="d-flex col-sm-11">
                            <input type="text" id="search" class="form-control" placeholder="Search" style="margin-bottom:5px">
                            <input type="hidden" id="status" value="All" class="form-control">
                        </div>
                    </div>
                    <table id="" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>BANNER</th>
                                <th>TITLE</th>
                                <th>START_FROM</th>
                                <th>END_DATE</th>
                                <th>RETAIL_PRICE</th>
                                <th>PRICE</th>
                                <th>IS_PAID</th>
                                <th>IS_FEATURED</th>
                                <th>STATUS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="body">
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="id-<?php echo e($model->id); ?>">
                                    <td><?php echo e($models->firstItem()+$key); ?>.</td>
                                    <td>
                                        <?php if($model->banner): ?>
                                            <img style="border-radius: 50%;" src="<?php echo e(asset('public/admin/bundle/banners')); ?>/<?php echo e($model->banner); ?>" width="50px" height="50px" alt="">
                                        <?php else: ?>
                                            <img style="border-radius: 50%;" src="<?php echo e(asset('public/default.png')); ?>" width="50px" height="50px" alt="">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($model->title); ?></td>
                                    <td>
                                        <span class="badge badge-info"><?php echo e(date("d, M-Y", strtotime($model->start_from))); ?></span>
                                    </td>
                                    <td>
                                        <span class="badge badge-info"><?php echo e(date("d, M-Y", strtotime($model->end_date))); ?></span>
                                    </td>
                                    <td>$<?php echo e(number_format($model->retail_price,2)); ?></td>
                                    <td>$<?php echo e(number_format($model->price, 2)); ?></td>
                                    <td>
                                        <?php if($model->is_paid): ?>
                                            <span class="label label-info">Paid</span>
                                        <?php else: ?>
                                            <span class="label label-danger">FREE</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="switch">
                                            <input id="is_featured-<?php echo e($model->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-bundle-featured-btn" data-bundle-id="<?php echo e($model->id); ?>" data-update-action="<?php echo e(route('bundle.update', $model->id)); ?>" value="1" <?php if($model->is_featured): ?> checked <?php endif; ?> name="is_featured" type="checkbox">
                                            <label for="is_featured-<?php echo e($model->id); ?>"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="switch">
                                            <input id="status-<?php echo e($model->id); ?>" class="cmn-toggle cmn-toggle-round-flat course-bundle-status-btn" data-bundle-id="<?php echo e($model->id); ?>" data-update-action="<?php echo e(route('bundle.update', $model->id)); ?>" value="1" <?php if($model->status): ?> checked <?php endif; ?> name="status" type="checkbox">
                                            <label for="status-<?php echo e($model->id); ?>"></label>
                                        </div>
                                    </td>
                                    <td width="250px">
                                        <a href="<?php echo e(route("bundle.show", $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Show Bundle" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Show</a>
                                        <a href="<?php echo e(route("bundle.edit", $model->id)); ?>" data-toggle="tooltip" data-placement="top" title="Edit Bundle" class="btn btn-primary btn-xs" style="margin-left: 3px;"><i class="fa fa-edit"></i> Edit</a>
                                        <button data-toggle="tooltip" data-placement="top" title="Delete Bundle" class="btn btn-danger btn-xs delete" data-slug="<?php echo e($model->id); ?>" data-del-url="<?php echo e(route("bundle.destroy", $model->id)); ?>" style="margin-left: 3px;"><i class="fa fa-trash"></i> Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td colspan="16">
                                    Displying <?php echo e($models->firstItem()); ?> to <?php echo e($models->lastItem()); ?> of <?php echo e($models->total()); ?> records
                                    <div class="d-flex justify-content-center">
                                        <?php echo $models->links('pagination::bootstrap-4'); ?>

                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $('.course-bundle-status-btn').on('change', function(){
            var status_update_url = $(this).attr('data-update-action');
            var tr_id = $(this).attr('data-bundle-id');
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
                        $('#body').find('#id-'+tr_id).find('#status-'+tr_id).prop('checked',true);
                    }else{
                        $('#body').find('#id-'+tr_id).find('#status-'+tr_id).prop('checked',false);
                    }
                }
            })
        });

        $('.course-bundle-featured-btn').on('change', function(){
            var status_update_url = $(this).attr('data-update-action');
            var tr_id = $(this).attr('data-bundle-id');
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
                        $('#body').find('#id-'+tr_id).find('#is_featured-'+tr_id).prop('checked',true);
                    }else{
                        $('#body').find('#id-'+tr_id).find('#is_featured-'+tr_id).prop('checked',false);
                    }
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/bundles/index.blade.php ENDPATH**/ ?>