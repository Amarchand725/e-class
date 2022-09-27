
<?php $__env->startSection('title', 'Edit Country'); ?>
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
		<h1>Edit Country</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route("country.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route("country.update", $model->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
                <?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="text" class="form-control" name="name" value="<?php echo e($model->name); ?>" placeholder="Enter name">
						<span style="color: red"><?php echo e($errors->first("name")); ?></span></div></div><div class="form-group">
						<label for="country_code" class="col-sm-2 control-label">Country_code</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="country_code" value="<?php echo e($model->country_code); ?>" placeholder="Enter country_code">
						<span style="color: red"><?php echo e($errors->first("country_code")); ?></span></div></div><div class="form-group">
						<label for="currency" class="col-sm-2 control-label">Currency</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="currency" value="<?php echo e($model->currency); ?>" placeholder="Enter currency">
						<span style="color: red"><?php echo e($errors->first("currency")); ?></span></div></div><div class="form-group">
						<label for="currency_symbol" class="col-sm-2 control-label">Currency_symbol</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="currency_symbol" value="<?php echo e($model->currency_symbol); ?>" placeholder="Enter currency_symbol">
						<span style="color: red"><?php echo e($errors->first("currency_symbol")); ?></span></div></div><div class="form-group">
						<label for="description" class="col-sm-2 control-label">Description</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="description" value="<?php echo e($model->description); ?>" placeholder="Enter description">
						<span style="color: red"><?php echo e($errors->first("description")); ?></span></div></div>

						<div class="form-group">
							<label for="flag" class="col-sm-2 control-label">Flag</label>
							<div class="col-sm-8">
								<input type="file" id="imgInput" accept="image/*" class="form-control" name="flag">
							<span style="color: red"><?php echo e($errors->first("flag")); ?></span></div></div>
						
						<?php if($model->flag): ?>
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Flag </label>
								<div class="col-sm-8">
									<img id="preview" src="<?php echo e(asset('public/admin/images/countries')); ?>/<?php echo e($model->flag); ?>" width="100px" alt="">
								</div>
							</div>
                        <?php else: ?> 
                            <div class="form-group">
                                <label for="image" class="col-sm-2 control-label">Preview</label>
                                <div class="col-sm-8">
                                    <img id="preview" src="<?php echo e(asset('public/default.png')); ?>" width="100px" alt="">
                                </div>
                            </div>
						<?php endif; ?>
						
						<div class="form-group">
						<label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
						<div class="col-sm-8"><select class="form-control" name="status"><option value="1" <?php echo e($model->status==1?"selected":""); ?>>Active</option><option value="0" <?php echo e($model->status==0?"selected":""); ?>>In Active</option></select><span style="color: red"><?php echo e($errors->first("status")); ?></span></div></div><div class="form-group"><label for="status" class="col-sm-2 control-label"></label><div class="col-sm-8"><button type="submit" class="btn btn-success pull-left">Save</button></div></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/countries/edit.blade.php ENDPATH**/ ?>