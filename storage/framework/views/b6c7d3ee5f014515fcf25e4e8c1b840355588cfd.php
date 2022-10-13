
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Permission</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route('permission.index')); ?>" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('permission.update', $permission->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Group Name <span style="color: red">*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="name" value="<?php echo e(Str::ucfirst($permission->name)); ?>">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Sub Permissions</label>
							<div class="col-sm-4">
								<?php $basic_permissions = ['all', 'create', 'edit', 'delete'] ?> 
								<?php $__currentLoopData = $basic_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $basic_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php $bool = true ?> 
									<?php $__currentLoopData = $permission->havePermissionUrls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission_url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($basic_permission==$permission_url->permission): ?>
											<?php $bool = false ?>
											<div class="form-check">
												<input class="form-check-input" name="permissions[]" checked  type="checkbox" value="<?php echo e($basic_permission); ?>" id="checkAll-<?php echo e($basic_permission); ?>"/>
												<label class="form-check-label" for="checkAll-<?php echo e($basic_permission); ?>"> <strong><?php echo e(Str::ucfirst($basic_permission)); ?></strong> </label>
											</div>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									<?php if($bool): ?>
										<div class="form-check">
											<input class="form-check-input" name="permissions[]" type="checkbox" value="<?php echo e($basic_permission); ?>" id="checkAll-<?php echo e($basic_permission); ?>"/>
											<label class="form-check-label" for="checkAll-<?php echo e($basic_permission); ?>"> <strong><?php echo e(Str::ucfirst($basic_permission)); ?></strong> </label>
										</div>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$("#regform").validate({
			rules: {
				name: "required",
				guard_name: "required",
			}
		});
	});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/admin/permission/edit.blade.php ENDPATH**/ ?>