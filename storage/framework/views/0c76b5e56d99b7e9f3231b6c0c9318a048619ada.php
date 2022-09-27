
<?php $__env->startSection('title', 'Edit TrustCompany'); ?>
<?php $__env->startPush('css'); ?>
    <style>
        select {
            font-family: 'Font Awesome', 'sans-serif';
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<section class="content-header">
	<div class="content-header-left">
		<h1>Edit TrustCompany</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route("trustcompany.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route("trustcompany.update", $model->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
                <?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="name" value="<?php echo e($model->name); ?>" placeholder="Enter name">
                        <span style="color: red"><?php echo e($errors->first("name")); ?></span></div></div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea name="description" class="form-control" id="description" rows="10" placeholder="Enter description"><?php echo e($model->description); ?></textarea>
                                <span style="color: red"><?php echo e($errors->first("description")); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="website_link" class="col-sm-2 control-label">Company Website Link <span style="color:red">*</span></label>
                            <div class="col-sm-8"><input id="website_link" type="text" class="form-control" name="website_link" value="<?php echo e($model->website_link); ?>" placeholder="Enter website_link e.g http://localhost/e-class/admin/trustcompany">
                            <span style="color: red"><?php echo e($errors->first("website_link")); ?></span></div></div>

                        <?php if($model->logo): ?>
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Logo </label>
								<div class="col-sm-8">
                                    <img id="preview" src="<?php echo e(asset('public/admin/images/trust-companies')); ?>/<?php echo e($model->logo); ?>" width="100px" alt="">
								</div>
							</div>
                        <?php else: ?> 
                            <div class="form-group">
								<label for="image" class="col-sm-2 control-label">Preview </label>
								<div class="col-sm-8">
                                    <img id="preview" src="<?php echo e(asset('public/default.png')); ?>" width="100px" alt="">
								</div>
							</div>
						<?php endif; ?>

                        <div class="form-group">
                            <label for="logo" class="col-sm-2 control-label">Logo</label>
                            <div class="col-sm-8">
                                <input type="file" accept="image/*" class="form-control" name="logo" id="imgInput">
                                <span style="color: red"><?php echo e($errors->first("logo")); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
                            <div class="col-sm-8">
                                <select class="form-control" name="status">
                                    <option value="1" <?php echo e($model->status==1?"selected":""); ?>>Active</option>
                                    <option value="0" <?php echo e($model->status==0?"selected":""); ?>>In Active</option>
                                </select>
                                <span style="color: red"><?php echo e($errors->first("status")); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-success pull-left">Save</button>
                            </div>
                        </div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/trustcompanies/edit.blade.php ENDPATH**/ ?>