
<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startSection('content'); ?>
	<section class="content-header">
		<div class="content-header-left">
			<h1><?php echo e($page_title); ?></h1>
		</div>
		<div class="content-header-right">
			<a href="<?php echo e(route('role.index')); ?>" class="btn btn-primary btn-sm">View All</a>
		</div>
	</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route('role.update', ['id', $role->id])); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<?php echo e(method_field('PATCH')); ?>

				<input type="hidden" name="role_id" value="<?php echo e($role->id); ?>">
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Role Name <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="<?php echo e($role->name); ?>" name="name" placeholder="Enter role name">
								<span style="color: red"><?php echo e($errors->first('name')); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Short Description </label>
							<div class="col-sm-9">
								<textarea class="form-control" name="description" style="height:80px;" placeholder="Enter short description"><?php echo e($role->description); ?></textarea>
								<span style="color: red"><?php echo e($errors->first('description')); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Permission: <span style="color: red">*</span></label>
							<div class="col-sm-9">
								<?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<div class="col-sm-3">
										<label>
											<?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name'))); ?> <?php echo e(ucfirst($value->name)); ?>

										</label>
										<br />
										<div class="col-sm-6">
											<?php if(!empty($value->havePermissionUrls)): ?>
												<?php $__currentLoopData = $value->havePermissionUrls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="form-check">
													<input class="form-check-input" name="permissions[]"  type="checkbox" value="" id="checkAll-"/>
													<label class="form-check-label" for="checkAll-}"> <strong><?php echo e($permission->permission); ?></strong> </label>
												</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/admin/role/edit.blade.php ENDPATH**/ ?>