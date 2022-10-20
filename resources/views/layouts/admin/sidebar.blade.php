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
                        <i class="fa fa-building"></i> <span>institutes</span>
                    </a>
                </li>
                @endcan
                @can('enroll-list')
                <li class="treeview">
                    <a href="{{ route('enrollstudent.index') }}" class="{{ request()->is('enrollstudent') || request()->is('enrollstudent/create') || request()->is('enrollstudent/*/edit') ? 'active' : '' }}">
                        <i class="fa fa-user"></i> <span>User Entroled</span>
                    </a>
                </li>
                @endcan
                @php 
                $account = App\Models\PayoutSetting::where('user_slug', Auth::user()->slug)->first();
                @endphp 
                @if(empty($account))
                    @can('payoutsetting-create')
                    <li class="treeview">
                        <a href="{{ route('payoutsetting.create') }}" class="{{ request()->is('payoutsetting') || request()->is('payoutsetting/create') || request()->is('payoutsetting/*/edit') ? 'active' : '' }}">
                            <i class="fa fa-money"></i> <span>Payout Setting</span>
                        </a>
                    </li>
                    @endcan
                @else 
                    @can('payoutsetting-edit')
                    <li class="treeview">
                        <a href="{{ route('payoutsetting.edit', $account->id) }}" class="{{ request()->is('payoutsetting') || request()->is('payoutsetting/create') || request()->is('payoutsetting/*/edit') ? 'active' : '' }}">
                            <i class="fa fa-money"></i> <span>Payout Setting</span>
                        </a>
                    </li>
                    @endcan
                @endif
            @endif
        </ul>
    </section>
</aside>
