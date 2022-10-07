<?php $__env->startSection('title', 'Add New UserProfile'); ?>
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
		<h1>Add New UserProfile</h1>
	</div>
	<div class="content-header-right">
		<a href="<?php echo e(route("userprofile.index")); ?>" data-toggle="tooltip" data-placement="left" title="<?php echo e($view_all_title); ?>" class="btn btn-primary btn-sm"><?php echo e($view_all_title); ?></a>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form action="<?php echo e(route("userprofile.store")); ?>" id="regform" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
				<?php echo csrf_field(); ?>
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
						<label for="role_id" class="col-sm-2 control-label">Role <span style="color:red">*</span></label>
							<div class="col-sm-8">
								<select class="form-control" name="role_id" id="">
									<option value="" selected>Select role</option>
									<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($role->id); ?>" <?php echo e(old('role_id')==$role->id?'selected':''); ?>><?php echo e($role->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<span style="color: red"><?php echo e($errors->first("role_id")); ?></span>
							</div>
						</div>

						<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">First_name</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="first_name" value="<?php echo e(old("first_name")); ?>" placeholder="Enter first_name">
						<span style="color: red"><?php echo e($errors->first("first_name")); ?></span></div></div>
						
						<div class="form-group">
						<label for="last_name" class="col-sm-2 control-label">Last_name</label>
						<div class="col-sm-8"><input type="text" class="form-control" name="last_name" value="<?php echo e(old("last_name")); ?>" placeholder="Enter last_name">
						<span style="color: red"><?php echo e($errors->first("last_name")); ?></span></div></div>
						
						<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="text" class="form-control" name="email" value="<?php echo e(old("email")); ?>" placeholder="Enter email">
						<span style="color: red"><?php echo e($errors->first("email")); ?></span></div></div>
						
						<div class="form-group">
						<label for="mobile" class="col-sm-2 control-label">Mobile</label>
						<div class="col-sm-8"><input type="text" class="form-control numberonly" name="mobile" value="<?php echo e(old("mobile")); ?>" placeholder="Enter mobile">
						<span style="color: red"><?php echo e($errors->first("mobile")); ?></span></div></div>
						
						<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="password" class="form-control" name="password" value="<?php echo e(old("password")); ?>" placeholder="Enter password">
						<span style="color: red"><?php echo e($errors->first("password")); ?></span></div></div>

						<div class="form-group">
						<label for="confirmed" class="col-sm-2 control-label">Confirmed Password <span style="color:red">*</span></label>
						<div class="col-sm-8"><input type="password" class="form-control" name="confirmed" value="<?php echo e(old("confirmed")); ?>" placeholder="Enter confirmed">
						<span style="color: red"><?php echo e($errors->first("confirmed")); ?></span></div></div>
						
						<div class="form-group">
						<label for="country_id" class="col-sm-2 control-label">Country</label>
						<div class="col-sm-8">
							<select class="form-control" name="country_id" id="country">
								<option value="" selected>Select country</option>
								<?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						<span style="color: red"><?php echo e($errors->first("country_id")); ?></span></div></div>
						
						<div class="form-group">
						<label for="state_id" class="col-sm-2 control-label">State</label>
						<div class="col-sm-8">
							<select class="form-control" name="state_id" id="state_id">
								<option value="" selected>Select state</option>
							</select>
						<span style="color: red"><?php echo e($errors->first("state_id")); ?></span></div></div>
						
						<div class="form-group">
							<label for="city_id" class="col-sm-2 control-label">City</label>
							<div class="col-sm-8">
								<select class="form-control" name="city_id" id="city_id">
									<option value="" selected>Select city</option>
								</select>
								<span style="color: red"><?php echo e($errors->first("city_id")); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="address" class="col-sm-2 control-label">Address</label>
							<div class="col-sm-8">
								<textarea class="form-control" id="address" name="address" placeholder="Enter address"><?php echo e(old("address")); ?></textarea>
								<span style="color: red"><?php echo e($errors->first("address")); ?></span>
							</div>
						</div>
						
						<div class="form-group">
						<label for="facebook_url" class="col-sm-2 control-label">Facebook_url</label>
						<div class="col-sm-8"><textarea class="form-control" id="facebook_url" name="facebook_url" placeholder="Enter facebook_url"><?php echo e(old("facebook_url")); ?></textarea>
						<span style="color: red"><?php echo e($errors->first("facebook_url")); ?></span></div></div><div class="form-group">
						<label for="twitter_url" class="col-sm-2 control-label">Twitter_url</label>
						<div class="col-sm-8"><textarea class="form-control" id="twitter_url" name="twitter_url" placeholder="Enter twitter_url"><?php echo e(old("twitter_url")); ?></textarea>
						<span style="color: red"><?php echo e($errors->first("twitter_url")); ?></span></div></div><div class="form-group">
						<label for="youtube_url" class="col-sm-2 control-label">Youtube_url</label>
						<div class="col-sm-8"><textarea class="form-control" id="youtube_url" name="youtube_url" placeholder="Enter youtube_url"><?php echo e(old("youtube_url")); ?></textarea>
						<span style="color: red"><?php echo e($errors->first("youtube_url")); ?></span></div></div><div class="form-group">
						<label for="linked_in_url" class="col-sm-2 control-label">Linked_in_url</label>
						<div class="col-sm-8"><textarea class="form-control" id="linked_in_url" name="linked_in_url" placeholder="Enter linked_in_url"><?php echo e(old("linked_in_url")); ?></textarea>
						<span style="color: red"><?php echo e($errors->first("linked_in_url")); ?></span></div></div>
						
						<div class="form-group">
						<label for="details" class="col-sm-2 control-label">Details</label>
						<div class="col-sm-8"><textarea class="form-control ckeditor" id="details" name="details" placeholder="Enter details"><?php echo e(old("details")); ?></textarea>
						<span style="color: red"><?php echo e($errors->first("details")); ?></span></div></div>

						<div class="form-group">
							<label for="profile_image" class="col-sm-2 control-label">Profile</label>
							<div class="col-sm-8"><input type="file" id="imgInput" accept="image/*" class="form-control" name="profile_image" value="<?php echo e(old("profile_image")); ?>" placeholder="Enter profile_image">
							<span style="color: red"><?php echo e($errors->first("profile_image")); ?></span></div></div>
								
						<div class="form-group">
							<label for="image" class="col-sm-2 control-label">Preview </label>
							<div class="col-sm-8">
								<img src="<?php echo e(asset('public/default.png')); ?>" id="preview"  width="100px" alt="">
							</div>
						</div>
						
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label">Status </label>
							<div class="col-sm-8">
								<select class="form-control" name="status">
									<option value="1" <?php echo e(old("status")==1?"selected":""); ?>>Active</option>
									<option value="0" <?php echo e(old("status")==0?"selected":""); ?>>In Active</option>
								</select>
								<span style="color: red"><?php echo e($errors->first("status")); ?></span>
							</div>
						</div>

						<div class="form-group">
							<label for="is_featured" class="col-sm-2 control-label">Featured</label>
							<div class="col-sm-8">
								<select class="form-control" name="is_featured">
									<option value="1" <?php echo e(old("is_featured")==1?"selected":""); ?>>Active</option>
									<option value="0" <?php echo e(old("is_featured")==0?"selected":""); ?>>In Active</option>
								</select>
								<span style="color: red"><?php echo e($errors->first("status")); ?></span>
							</div>
						</div>
						<div class="form-group">
							<label for="status" class="col-sm-2 control-label"></label>
							<div class="col-sm-8"><button type="submit" class="btn btn-success pull-left">Save</button></div>
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
	$(document).on('change', '#country', function(){
		var country_id = $(this).val();
		$.ajax({
			url : "<?php echo e(route('admin.get_states')); ?>",
			data : {'country_id' : country_id},
			type : 'GET',
			success : function(response){	
				var html = '';
				html += '<option value="" selected>Select state</option>';
				jQuery.each(response.states, function(index, state) {
					html += '<option value="'+state.id+'">'+state.name+'</option>';
				});

				$('#state_id').html(html);
			}
		});
	});

	$(document).on('change', '#state_id', function(){
		var state_id = $(this).val();
		$.ajax({
			url : "<?php echo e(route('admin.get_cities')); ?>",
			data : {'state_id' : state_id},
			type : 'GET',
			success : function(response){	
				var html = '';
				html += '<option value="" selected>Select city</option>';
				jQuery.each(response.states, function(index, state) {
					html += '<option value="'+state.id+'">'+state.name+'</option>';
				});

				$('#city_id').html(html);
			}
		});
	});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/userprofiles/create.blade.php ENDPATH**/ ?>