<div class="box-body">
	<input type="hidden" name="course_id" value="<?php echo e($model->course_id); ?>">
	<div class="form-group">
		<label for="chapter_id" class="col-sm-3 control-label">Chapter Name <span style="color:red">*</span></label>
		<div class="col-sm-8">
			<select id="chapter_id" class="form-control" name="chapter_id">
				<option value="" selected>Select Chapter</option>
				<?php $__currentLoopData = $coursechapters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($chapter->id); ?>" <?php echo e($model->chapter_id==$chapter->id?'selected':''); ?>><?php echo e($chapter->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<span style="color: red" id="error-chapter_id"><?php echo e($errors->first("chapter_id")); ?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="title" class="col-sm-3 control-label">Title <span style="color:red">*</span></label>
		<div class="col-sm-8">
			<input type="text" id="title" class="form-control" name="title" placeholder="Enter title" value="<?php echo e($model->title); ?>">
			<span style="color: red" id="error-title"><?php echo e($errors->first("title")); ?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="detail" class="col-sm-3 control-label">Detail </label>
		<div class="col-sm-8">
			<textarea class="form-control" id="detail" rows="5" name="detail" placeholder="Enter detail" ><?php echo e($model->detail); ?></textarea>
			<span style="color: red" id="error-detail"><?php echo e($errors->first("detail")); ?></span>
		</div>
	</div>
	<div class="form-group">
		<label for="type" class="col-sm-3 control-label">Type <span style="color:red">*</span></label>
		<div class="col-sm-8">
			<?php $types = ['Video', 'Audio', 'Image', 'Zip', 'Pdf / Powerpoint / Notepad'] ?> 
			<select id="type" class="form-control edit-file-type" name="type">
				<option value="" selected>Select Type</option>
				<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($type); ?>" <?php echo e($model->type==$type?'selected':''); ?>><?php echo e($type); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<span style="color: red" id="error-type"><?php echo e($errors->first("type")); ?></span>
		</div>
	</div>
	
	<span id="edit-class-custom">
		<?php if($model->type=='Video'): ?>
			<div class="form-group">
				<label for="lecture" class="col-sm-3 control-label">Exist Lecture </label>
				<div class="col-sm-8">
					<video width="220" height="140" controls>
						<source src="<?php echo e(asset('public/admin/course_class/lectures')); ?>/<?php echo e($model->lecture); ?>" type="video/mp4">
						<source src="<?php echo e(asset('public/admin/course_class/lectures')); ?>/<?php echo e($model->lecture); ?>" type="video/ogg">
						Your browser does not support the video tag.
					</video>
				</div>
			</div>
		<?php elseif($model->type=='Image'): ?>
			<div class="form-group">
				<label for="image" class="col-sm-3 control-label">Exist Image </label>
				<div class="col-sm-8">
					<img id="preview" src="<?php echo e(asset('public/admin/course_class/attachments')); ?>/<?php echo e($model->attachment); ?>" width="100px" alt="">
				</div>
			</div>
		<?php else: ?> 
			<div class="form-group">
				<label for="image" class="col-sm-3 control-label">Exist Attachment </label>
				<div class="col-sm-8">
					<a href="<?php echo e(asset('public/admin/course_class/attachments')); ?>/<?php echo e($model->attachment); ?>" download><i class="fa fa-download"></i> <?php echo e($model->attachment); ?></a>
				</div>
			</div>
		<?php endif; ?>
	</span>

	<div class="form-group">
		<label for="status" class="col-sm-3 control-label"></label>
		<div class="col-sm-8">
			<button type="submit" class="btn btn-success pull-left">Save</button>
		</div>
	</div>
</div><?php /**PATH C:\xampp\htdocs\e-class\resources\views/courseclasses/ajax/edit.blade.php ENDPATH**/ ?>