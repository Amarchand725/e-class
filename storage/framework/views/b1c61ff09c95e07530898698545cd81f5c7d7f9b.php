
<?php $__env->startSection('title', 'Add New State'); ?>
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
		<h1>Add New State</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route("state.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route("state.store")); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
							<label for="country_id" class="col-sm-2 control-label">Country_id <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select name="country_id" id="" class="form-control">
									<option value="" selected>Select country</option>
									<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($country->id); ?>" <?php echo e(old("country_id")==$country->id?'selected':''); ?>><?php echo e($country->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<span style="color: red"><?php echo e($errors->first("country_id")); ?></span>
							</div>
						</div>
						
						<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="text" class="form-control" name="name" value="<?php echo e(old("name")); ?>" placeholder="Enter name">
						<span style="color: red"><?php echo e($errors->first("name")); ?></span></div></div>
						
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label">Description</label>
							<div class="col-sm-8">
								<textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Enter description"><?php echo e(old("description")); ?></textarea>
								<span style="color: red"><?php echo e($errors->first("description")); ?></span>
							</div>
						</div>
						
						<div class="form-group">
						<label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
						<div class="col-sm-8"><select class="form-control" name="status"><option value="1" <?php echo e(old("status")==1?"selected":""); ?>>Active</option><option value="0" <?php echo e(old("status")==0?"selected":""); ?>>In Active</option></select><span style="color: red"><?php echo e($errors->first("status")); ?></span></div></div><div class="form-group"><label for="status" class="col-sm-2 control-label"></label><div class="col-sm-8"><button type="submit" class="btn btn-success pull-left">Save</button></div></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/states/create.blade.php ENDPATH**/ ?>