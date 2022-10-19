<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>

            @if(Auth::user()->roles[0]->name=='Admin')
                @foreach (menus() as $menu)
                    @if(Auth::user()->hasRole(Str::ucfirst($menu->menu_of)) || $menu->menu_of=='general')
                        <li class="treeview id-{{ $menu->id }}">
                            <a href="{{ route(str_replace(' ', '_', strtolower($menu->menu)).'.index') }}" class="{{ request()->is($menu->url) || request()->is($menu->url.'/*')? 'active' : '' }}">
                                {!! $menu->icon !!} <span>{{ $menu->label }}</span>
                            </a>
                        </li>
                    @elseif(Auth::user()->hasRole($menu->menu_of))
                        <li class="treeview id-{{ $menu->id }}">
                            <a href="{{ route($menu->url.'.index') }}" class="{{ request()->is($menu->url) || request()->is($menu->menu.'/*')? 'active' : '' }}">
                                <i class="fas fa-biking"></i> <span>{{ $menu->label }}</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            @else 
                @can('course-list')
                <li class="treeview">
                    <a href="{{ route('course.index') }}" class="{{ request()->is('course') || request()->is('course/create') || request()->is('course/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-list-alt"></i> <span>Course</span>
                    </a>
                </li>
                @endcan
                @can('blog-list')
                <li class="treeview">
                    <a href="{{ route('blog.index') }}" class="{{ request()->is('blog') || request()->is('blog/create') || request()->is('blog/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-sticky-note"></i> <span>Blogs</span>
                    </a>
                </li>
                @endcan
                @can('institute-list')
                <li class="treeview">
                    <a href="{{ route('institute.index') }}" class="{{ request()->is('institute') || request()->is('institute/create') || request()->is('institute/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-sticky-note"></i> <span>institutes</span>
                    </a>
                </li>
                @endcan
                @can('enrollstudent-list')
                <li class="treeview">
                    <a href="{{ route('enrollstudent.index') }}" class="{{ request()->is('enrollstudent') || request()->is('enrollstudent/create') || request()->is('enrollstudent/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-sticky-note"></i> <span>User Entroled</span>
                    </a>
                </li>
                @endcan
            @endif

            {{-- 
            <li class="treeview">
                    <a href="{{ route('page.index') }}" class="{{ request()->is('page') || request()->is('page/*') || request()->is('page_setting/*') ? 'active' : '' }}">
                        <i class="fa fa-cog"></i> <span>Settings</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ route('menu.index') }}" class="{{ request()->is('menu') || request()->is('menu/*') ? 'active' : '' }}">
                        <i class="fa fa-bars"></i> <span>Menus</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="{{ route('role.index') }}" class="{{ request()->is('role') || request()->is('role/create') || request()->is('role/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-tasks"></i> <span>Roles</span>
                    </a>
                </li>    
            @can('user-list')
            <li class="treeview">
                <a href="{{ route('user.index') }}" class="{{ request()->is('user') || request()->is('user/create') || request()->is('user/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
            @endcan
            @can('permission-list')
            <li class="treeview">
                <a href="{{ route('permission.index') }}" class="{{ request()->is('permission') || request()->is('permission/create') || request()->is('permission/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-lock"></i> <span>Permissions</span>
                </a>
            </li>
            @endcan
            
            @can('slider-list')
            <li class="treeview">
                <a href="{{ route('slider.index') }}" class="{{ request()->is('slider') || request()->is('slider/create') || request()->is('slider/*/edit') || request()->is('slider/*') ? 'active' : '' }}">
                    <i class="fa fa-sliders"></i> <span>Sliders</span>
                </a>
            </li>
            @endcan
            @can('category-list')
            <li class="treeview">
                <a href="{{ route('category.index') }}" class="{{ request()->is('category') || request()->is('category/create') || request()->is('category/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-list-alt"></i> <span>Category</span>
                </a>
            </li>
            @endcan
            @can('course-list')
            <li class="treeview">
                <a href="{{ route('course.index') }}" class="{{ request()->is('course') || request()->is('course/create') || request()->is('course/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-list-alt"></i> <span>Course</span>
                </a>
            </li>
            @endcan
            @can('blog-list')
            <li class="treeview">
                <a href="{{ route('blog.index') }}" class="{{ request()->is('blog') || request()->is('blog/create') || request()->is('blog/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-sticky-note"></i> <span>Blogs</span>
                </a>
            </li>
            @endcan
            @can('testimonial-list')
            <li class="treeview">
                <a href="{{ route('testimonial.index') }}" class="{{ request()->is('testimonial') || request()->is('testimonial/create') || request()->is('testimonial/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-quote-right"></i> <span>Testimonial</span>
                </a>
            </li>
            @endcan --}}
        </ul>
    </section>
</aside>
