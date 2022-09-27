
<?php $__env->startSection('title', 'Edit Category'); ?>
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
		<h1>Edit Category</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route("category.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route("category.update", $model->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
                <?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
                            <label for="parent_id" class="col-sm-2 control-label">Parent</label>
                            <div class="col-sm-8">
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="" selected>Select parent</option>
                                    <?php $__currentLoopData = categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>" <?php echo e($model->parent_id==$category->id?"selected":''); ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span style="color: red"><?php echo e($errors->first("parent_id")); ?></span>
                            </div>
                        </div>

                        <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name <span style="color:red">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="name" value="<?php echo e($model->name); ?>" placeholder="Enter name">
                        <span style="color: red"><?php echo e($errors->first("name")); ?></span></div></div>

                        <div class="form-group">
							<label for="" class="col-sm-2 control-label">Icon <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="icon" value="<?php echo e($model->icon); ?>" placeholder="Copy font awesome tag from library and paste here e.g <i class='fa fa-user' aria-hidden='true'></i>" required>
                                <a href="https://fontawesome.com/v4/icons/" style="margin-top: 5px" target="_blank" class="btn btn-success">Choose Icon</a><br />
                                <span style="color: red"><?php echo e($errors->first('icon')); ?></span>
							</div>
						</div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-8">
                                <textarea name="description" id="description" class="form-control" placeholder="Enter description"><?php echo e($model->description); ?></textarea>
                                <span style="color: red"><?php echo e($errors->first("description")); ?></span>
                            </div>
                        </div>

                        <?php if($model->thumbnail): ?>
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Thumbnail </label>
								<div class="col-sm-8">
									<img id="preview" src="<?php echo e(asset('public/admin/images/courses')); ?>/<?php echo e($model->thumbnail); ?>" width="100px" alt="">
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
                            <label for="thumbnail" class="col-sm-2 control-label">Thumbnail <?php if(!$model->thumbnail): ?> <span style="color:red">*</span> <?php endif; ?></label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imgInput" accept="image/*" name="thumbnail">
                            <span style="color: red"><?php echo e($errors->first("thumbnail")); ?></span></div></div>

                        <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status <span style="color:red">*</span></label>
                        <div class="col-sm-8"><select class="form-control" name="status"><option value="1" <?php echo e($model->status==1?"selected":""); ?>>Active</option><option value="0" <?php echo e($model->status==0?"selected":""); ?>>In Active</option></select><span style="color: red"><?php echo e($errors->first("status")); ?></span></div></div><label for="" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6"><button type="submit" class="btn btn-success pull-left">Save</button></div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/categories/edit.blade.php ENDPATH**/ ?>