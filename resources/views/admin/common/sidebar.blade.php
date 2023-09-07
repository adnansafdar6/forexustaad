<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ str_contains(url()->current(), "home") ? 'active' : '' }}">
                    <a href="{{ route('admin.home') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ str_contains(url()->current(), "role") ? 'active' : '' }}">
                    <a href="{{ route('admin.role.index') }}"><i class="fe fe-home"></i> <span>Roles</span></a>
                </li>
                <li class="{{ str_contains(url()->current(), "permissions") ? 'active' : '' }}">
                    <a href="{{ route('admin.permissions.index') }}"><i class="fe fe-home"></i> <span>Permissions</span></a>
                </li>
                <li  class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Categories</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li>
                            <a href="{{ route('admin.categories.index') }}">Categories</a></li>

                        <li >
                            <a href="{{ route('admin.subcategories.index') }}"><span><Sub></Sub>SubCategories</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.post.index') }}"><i class="fe fe-layout"></i> <span>Posts</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.training.index') }}"><i class="fe fe-user-plus"></i> <span>Training </span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-users"></i> <span>Brokers</span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-user-plus"></i> <span>Header</span></a>
                </li>

                <li>
                    <a href="no.html"><i class="fe fe-user-plus"></i> <span>Comments</span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-user-plus"></i> <span>FAQ’s</span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-user"></i> <span>Static Pages</span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-star-o"></i> <span>Banner</span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-activity"></i> <span>Footer</span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-activity"></i> <span>Subscribers</span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-activity"></i> <span>Users</span></a>
                </li>
                <li>
                    <a href="no.html"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href="no"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Invoice Reports</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li>
                    <a href="profile.html"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="login.html"> Login </a></li>
                        <li><a href="register.html"> Register </a></li>
                        <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li>
                <li>
                    <a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
                </li>
                <li class="menu-title">
                    <span>UI Interface</span>
                </li>
                <li>
                    <a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html">Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html"> Form Mask </a></li>
                        <li><a href="form-validation.html"> Form Validation </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> <span>Level 1</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->

{{--<div class="left-menu">--}}
{{--    <div class="menubar-content">--}}
{{--        <nav class="animated inOut">--}}
{{--            <ul id="sidebar">--}}
{{--                <li class="{{ str_contains(url()->current(), "dashboard") ? 'active' : '' }}">--}}
{{--                    <a href="{{ route('admin.home') }}">--}}
{{--                        <i class="fas fa-home"></i>--}}
{{--                        <span class="font-hide">Dashboard</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @can('allow')--}}
{{--                    <li class="{{ str_contains(url()->current(), "role") ? 'active' : '' }}">--}}
{{--                        <a href="{{ route('admin.roles.index') }}">--}}
{{--                            <i class="fas fa-home"></i>--}}
{{--                            <span class="font-hide">Role</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                @endcan--}}
{{--                <li class="{{ str_contains(url()->current(), "role") ? 'active' : '' }}">--}}
{{--                    <a href="{{ route('admin.role.index') }}">--}}
{{--                        <i class="fas fa-home"></i>--}}
{{--                        <span class="font-hide">Role</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ str_contains(url()->current(), "permissions") ? 'active' : '' }}">--}}
{{--                    <a href="{{ route('admin.permissions.index') }}">--}}
{{--                        <i class="fas fa-home"></i>--}}
{{--                        <span class="font-hide">Permission</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                --}}{{--                <li class="{{ str_contains(url()->current(), "blank-page") ? 'active' : '' }}">--}}
{{--                --}}{{--                    <a href="{{ route('admin.blank-page') }}">--}}
{{--                --}}{{--                        <i class="fas fa-toolbox"></i>--}}
{{--                --}}{{--                        <span class="font-hide">Blank Page</span>--}}
{{--                --}}{{--                    </a>--}}
{{--                --}}{{--                </li>--}}
{{--                --}}{{--                <li class="{{ str_contains(url()->current(), "settings") ? 'active' : '' }}">--}}
{{--                --}}{{--                    <a href="{{ route('admin.settings.index') }}">--}}
{{--                --}}{{--                        <i class="fas fa-toolbox"></i>--}}
{{--                --}}{{--                        <span class="font-hide">Settings</span>--}}
{{--                --}}{{--                    </a>--}}
{{--                --}}{{--                </li>--}}
{{--                <li>--}}
{{--                    <a class="dropdown-item" href="{{ route('admin.logout') }}"--}}
{{--                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                        {{ __('Logout') }}--}}
{{--                    </a>--}}

{{--                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">--}}
{{--                        @csrf--}}
{{--                    </form>--}}
{{--                </li>--}}
{{--                <li class="sub-menu">--}}
{{--                    <a href="#"><i class="fas fa-arrow-down"></i><span class="font-hide">Submenu</span>--}}
{{--                        <span class="font-hide" style="margin-left: 15px;"><i--}}
{{--                                class="fas fa-caret-down right"></i></span>--}}
{{--                    </a>--}}
{{--                    <ul class="left-menu-dp">--}}
{{--                        <li><a href="#"><i class="fas fa-circle"></i><span class="font-hide">Account</span></a></li>--}}
{{--                        <li><a href="#"><i class="fas fa-circle"></i><span class="font-hide">Account</span></a></li>--}}
{{--                        <li><a href="#"><i class="fas fa-circle"></i><span class="font-hide">Account</span></a></li>--}}
{{--                        <li><a href="#"><i class="fas fa-circle"></i><span class="font-hide">Account</span></a></li>--}}
{{--                        <li><a href="#"><i class="fas fa-circle"></i><span class="font-hide">Account</span></a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </nav>--}}
{{--    </div>--}}
{{--</div>--}}