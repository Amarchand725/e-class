
<?php $__env->startSection('title', 'Edit Bundle'); ?>
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
		<h1>Edit Bundle</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route("bundle.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route("bundle.update", $model->id)); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
                <?php echo e(method_field('PATCH')); ?>

				<div class="box box-info">
					<div class="box-body">
                        <div class="form-group">
							<label for="course_ids" class="col-sm-2 control-label">Courses <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select name="course_ids[]" multiple id="course_ids" class="form-control">
									<option value="" selected>Select courses</option>
									<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php $bool = true ?> 
										<?php $__currentLoopData = json_decode($model->course_ids); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php if($course->id==(int)$course_id): ?>
												<?php $bool = false ?> 
												<option value="<?php echo e($course->id); ?>" selected><?php echo e($course->title); ?></option>
											<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										<?php if($bool): ?>
											<option value="<?php echo e($course->id); ?>"><?php echo e($course->title); ?></option>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<span style="color: red"><?php echo e($errors->first("course_ids")); ?></span>
							</div>
						</div>
						
						<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Title <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="text" class="form-control" name="title" value="<?php echo e($model->title); ?>" placeholder="Enter title">
						<span style="color: red"><?php echo e($errors->first("title")); ?></span></div></div>
																		
						<div class="form-group">
							<label for="start_from" class="col-sm-2 control-label">Start_from <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<input type="date" class="form-control" name="start_from" value="<?php echo e($model->start_from); ?>" placeholder="Enter start_from">
								<span style="color: red"><?php echo e($errors->first("start_from")); ?></span>
							</div>
						</div>
						
						<div class="form-group">
						<label for="end_date" class="col-sm-2 control-label">End_date <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="date" class="form-control" name="end_date" value="<?php echo e($model->end_date); ?>" placeholder="Enter end_date">
						<span style="color: red"><?php echo e($errors->first("end_date")); ?></span></div></div>
												
						<div class="form-group">
							<label for="short_detail" class="col-sm-2 control-label">Short Detail <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<textarea class="form-control" id="short_detail" name="short_detail" rows="5" placeholder="Enter short_detail"><?php echo e($model->short_detail); ?></textarea>
								<span style="color: red"><?php echo e($errors->first("short_detail")); ?></span>
							</div>
						</div>
							
						<div class="form-group">
							<label for="details" class="col-sm-2 control-label">Details</label>
							<div class="col-sm-8">
								<textarea class="form-control ckeditor" id="details" name="details" placeholder="Enter details"><?php echo e($model->details); ?></textarea>
								<span style="color: red"><?php echo e($errors->first("details")); ?></span>
							</div>
						</div>
							
						<div class="form-group">
                            <label for="banner" class="col-sm-2 control-label">Banner <?php if(!$model->banner): ?> <span style="color:red">*</span> <?php endif; ?></label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" id="imgInput" name="banner" accept="image/*">
                                <span style="color: red"><?php echo e($errors->first("banner")); ?></span>
                            </div>
                        </div>

                        <?php if($model->banner): ?>
							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Exist Banner </label>
								<div class="col-sm-8">
									<img id="preview" src="<?php echo e(asset('public/admin/bundle/banners')); ?>/<?php echo e($model->banner); ?>" width="100px" alt="">
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
                            <label for="is_paid" class="col-sm-2 control-label">Paid</label>
                            <div class="col-sm-8">
                                <div class="switch">
                                    <input id="paid" class="cmn-toggle cmn-toggle-round-flat" <?php if($model->is_paid): ?> checked <?php endif; ?> name="is_paid" value="1" type="checkbox">
                                    <label for="paid"></label>
                                </div>
                                <span style="color: red"><?php echo e($errors->first("is_paid")); ?></span>
                            </div>
                        </div>

                        <span id="if-paid" style="display: <?php if($model->is_paid): ?> block <?php else: ?> none <?php endif; ?>">
                            <div class="form-group">
                                <label for="retail_price" class="col-sm-2 control-label">Retail Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control numberonly" readonly id="retail_price" name="retail_price" value="<?php echo e($model->retail_price); ?>" placeholder="Enter retail_price">
                                    <span style="color: red"><?php echo e($errors->first("retail_price")); ?></span>
                                </div>
                            </div>
							<div class="form-group">
                                <label for="price" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control numberonly" name="price" value="<?php echo e($model->price); ?>" placeholder="Enter price">
                                    <span style="color: red"><?php echo e($errors->first("price")); ?></span>
                                </div>
                            </div>
                        </span>

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
	<script>
		$(document).on('change', '#course_ids', function(){
			var course_ids = $(this).val();
			$.ajax({
				url : "<?php echo e(route('get_courses_price')); ?>",
				data : {'course_ids' : course_ids},
				type : 'GET',
				success : function(response){
					$('#retail_price').val(response);
				}
			});
		});
		$(document).on('click', '#paid', function(){
			if($('input[name="is_paid"]').is(':checked'))
			{
				$('#if-paid').css('display', 'block');
			}else
			{
				$('#if-paid').css('display', 'none');
			}
		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/bundles/edit.blade.php ENDPATH**/ ?>