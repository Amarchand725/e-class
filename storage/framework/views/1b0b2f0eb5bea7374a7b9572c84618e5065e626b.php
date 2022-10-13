<header class="main-header">
    <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo">
        <span class="logo-lg"><?php echo e(Auth::user()->name); ?></span>
    </a>

    <nav class="navbar navbar-static-top">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <?php if(Auth::check() && Auth::user()->hasRole('Admin')): ?>
            <span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin Panel</span>
        <?php else: ?> 
            <span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Instructor Panel</span>
        <?php endif; ?>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo e(url('/')); ?>" target="_blank">Visit Website</a>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if(Auth::user()->image): ?>
                            <img src="<?php echo e(asset('public/admin/img')); ?>/<?php echo e(Auth::user()->image); ?>" class="user-image" alt="user photo">
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/admin/img/dummy-user.png')); ?>" class="user-image" alt="user photo">
                        <?php endif; ?>
                        <span class="hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-footer">
                            <div>
                                <?php if(Auth::user()->hasRole('Admin')): ?>
                                    <a href="<?php echo e(route('admin.profile.edit')); ?>" class="btn btn-default btn-flat">Edit Profile</a>
                                <?php elseif(Auth::user()->hasRole('Instructor')): ?>
                                    <a href="<?php echo e(route('instructor.profile.edit')); ?>" class="btn btn-default btn-flat">Edit Profile</a>
                                <?php else: ?> 
                                    <a href="<?php echo e(route('user.profile.edit')); ?>" class="btn btn-default btn-flat">Edit Profile</a>
                                <?php endif; ?>
                            </div>
                            <div>
                                <a class="dropdown-item btn btn-default btn-flat" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>

                                </a>

                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

    </nav>
</header>
<?php /**PATH C:\xampp\htdocs\e-class\resources\views/layouts/admin/header.blade.php ENDPATH**/ ?>