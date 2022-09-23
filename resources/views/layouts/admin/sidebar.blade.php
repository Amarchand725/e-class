<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('dashboard') || request()->is('profile/*') ? 'active' : '' }}">
                    <i class="fa fa-laptop"></i> <span>Dashboard</span>
                </a>
            </li>

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

            {{-- <li class="treeview">
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
            @can('booking_type-list')
            <li class="treeview">
                <a href="{{ route('booking_type.index') }}" class="{{ request()->is('booking_type') || request()->is('booking_type/*')? 'active' : '' }}">
                    <i class="fa fa-book"></i> <span>Booking Types</span>
                </a>
            </li>
            @endcan
            @can('interview_type-list')
            <li class="treeview">
                <a href="{{ route('interview_type.index') }}" class="{{ request()->is('interview_type') || request()->is('interview_type/*')? 'active' : '' }}">
                    <i class="fa fa-info"></i> <span>Interview Types</span>
                </a>
            </li>
            @endcan
            @can('language-list')
            <li class="treeview">
                <a href="{{ route('language.index') }}" class="{{ request()->is('language') || request()->is('language/create') || request()->is('language/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-language"></i> <span>Languages</span>
                </a>
            </li>
            @endcan
            @can('degree-list')
            <li class="treeview">
                <a href="{{ route('degree.index') }}" class="{{ request()->is('degree') || request()->is('degree/create') || request()->is('degree/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-graduation-cap"></i> <span>Degrees</span>
                </a>
            </li>
            @endcan
            @can('course-list')
            <li class="treeview">
                <a href="{{ route('course.index') }}" class="{{ request()->is('course') || request()->is('course/create') || request()->is('course/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-certificate"></i> <span>Courses</span>
                </a>
            </li>
            @endcan
            @can('service-list')
            <li class="treeview">
                <a href="{{ route('service.index') }}" class="{{ request()->is('service') || request()->is('service/create') || request()->is('service/*/edit') || request()->is('service/*') ? 'active' : '' }}">
                    <i class="fa fa-wrench"></i> <span>Services</span>
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
            @endcan
            @can('advantage-list')
            <li class="treeview">
                <a href="{{ route('advantage.index') }}" class="{{ request()->is('advantage') || request()->is('advantage/create') || request()->is('advantage/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-tag"></i> <span>Mock Advantage</span>
                </a>
            </li>
            @endcan
            @can('how_work-list')
            <li class="treeview">
                <a href="{{ route('how_work.index') }}" class="{{ request()->is('how_work') || request()->is('how_work/create') || request()->is('how_work/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-spinner"></i> <span>How Works</span>
                </a>
            </li>
            @endcan
            @can('package-list')
            <li class="treeview">
                <a href="{{ route('package.index') }}" class="{{ request()->is('package') || request()->is('package/create') || request()->is('package/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-gift"></i> <span>Packages</span>
                </a>
            </li>
            @endcan
            @can('team-list')
            <li class="treeview">
                <a href="{{ route('team.index') }}" class="{{ request()->is('team') || request()->is('team/create') || request()->is('team/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-user-plus"></i> <span>Team</span>
                </a>
            </li>
            @endcan
            @can('help-list')
            <li class="treeview">
                <a href="{{ route('help.index') }}" class="{{ request()->is('help') || request()->is('help/create') || request()->is('help/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-question-circle"></i> <span>Help</span>
                </a>
            </li>
            @endcan
            @can('why_choose-list')
            <li class="treeview">
                <a href="{{ route('why_choose.index') }}" class="{{ request()->is('why_choose') || request()->is('why_choose/create') || request()->is('why_choose/*/edit') ? 'active' : '' }}">
                    <i class="fa fa-question"></i> <span>Why Choose Us</span>
                </a>
            </li>
            @endcan
            @can('social media-list')
            <li class="treeview">
                <a href="{{ route('social_media.index') }}" class="{{ request()->is('social_media') || request()->is('social_media/create') || request()->is('social_media/edit/*') ? 'active' : '' }}">
                    <i class="fa fa-address-book"></i> <span>Social Media</span>
                </a>
            </li>
            @endcan --}}
        </ul>
    </section>
</aside>
