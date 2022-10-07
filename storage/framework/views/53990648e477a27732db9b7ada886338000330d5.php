

<?php $__env->startSection('title', $page_title); ?>
<?php $__env->startPush('css'); ?>
  <style>
    .info-box-text{
      color: #4172a5 !important
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Team Members</span>
            <span class="info-box-number" style="color: #4172a5 !important">0</span>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Categories</span>
            <span class="info-box-number" style="color: #4172a5 !important">0</span>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-hand-o-right"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Blogs</span>
            <span class="info-box-number" style="color: #4172a5 !important">0</span>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-class\resources\views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>