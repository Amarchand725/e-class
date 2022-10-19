<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php echo e(request()->is('dashboard') || request()->is('profile/*') ? 'active' : ''); ?>">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>

            <?php if(Auth::user()->roles[0]->name=='Admin'): ?>
                <?php $__currentLoopData = menus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Auth::user()->hasRole(Str::ucfirst($menu->menu_of)) || $menu->menu_of=='general'): ?>
                        <li class="treeview id-<?php echo e($menu->id); ?>">
                            <a href="<?php echo e(route(str_replace(' ', '_', strtolower($menu->menu)).'.index')); ?>" class="<?php echo e(request()->is($menu->url) || request()->is($menu->url.'/*')? 'active' : ''); ?>">
                                <?php echo $menu->icon; ?> <span><?php echo e($menu->label); ?></span>
                            </a>
                        </li>
                    <?php elseif(Auth::user()->hasRole($menu->menu_of)): ?>
                        <li class="treeview id-<?php echo e($menu->id); ?>">
                            <a href="<?php echo e(route($menu->url.'.index')); ?>" class="<?php echo e(request()->is($menu->url) || request()->is($menu->menu.'/*')? 'active' : ''); ?>">
                                <i class="fas fa-biking"></i> <span><?php echo e($menu->label); ?></span>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?> 
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('course-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('course.index')); ?>" class="<?php echo e(request()->is('course') || request()->is('course/create') || request()->is('course/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-list-alt"></i> <span>Course</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('blog.index')); ?>" class="<?php echo e(request()->is('blog') || request()->is('blog/create') || request()->is('blog/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-sticky-note"></i> <span>Blogs</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('institute-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('institute.index')); ?>" class="<?php echo e(request()->is('institute') || request()->is('institute/create') || request()->is('institute/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-sticky-note"></i> <span>institutes</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('enrollstudent-list')): ?>
                <li class="treeview">
                    <a href="<?php echo e(route('enrollstudent.index')); ?>" class="<?php echo e(request()->is('enrollstudent') || request()->is('enrollstudent/create') || request()->is('enrollstudent/*/edit') ? 'active' : ''); ?>">
                        <i class="fa fa-sticky-note"></i> <span>User Entroled</span>
                    </a>
                </li>
                <?php endif; ?>
            <?php endif; ?>

            
        </ul>
    </section>
</aside>
<?php /**PATH C:\xampp\htdocs\e-class\resources\views/layouts/admin/sidebar.blade.php ENDPATH**/ ?>