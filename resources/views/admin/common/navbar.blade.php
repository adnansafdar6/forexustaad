
<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="index.html" class="logo">
            <img src="{{ asset('assets/admin/new/img/logo.png') }}" alt="Logo">
        </a>
        <a href="index.html" class="logo logo-small">
            <img src="{{ asset('assets/admin/new/img/favicon.png') }}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">

        <!-- Notifications -->
        <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fe fe-messanger"></i> <span class="badge badge-pill">3</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
												<span class="avatar avatar-sm">
{{--													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/doctors/doctor-thumb-01.jpg">--}}
												</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
												<span class="avatar avatar-sm">
{{--													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient1.jpg">--}}
												</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
												<span class="avatar avatar-sm">
{{--													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient2.jpg">--}}
												</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
												<span class="avatar avatar-sm">
{{--													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient3.jpg">--}}
												</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->
        <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fe fe-bell"></i> <span class="badge badge-pill">1</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
												<span class="avatar avatar-sm">
{{--													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/doctors/doctor-thumb-01.jpg">--}}
												</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
												<span class="avatar avatar-sm">
{{--													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient1.jpg">--}}
												</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
												<span class="avatar avatar-sm">
{{--													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient2.jpg">--}}
												</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
                                        <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
												<span class="avatar avatar-sm">
{{--													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/patients/patient3.jpg">--}}
												</span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                @if(is_null(auth()->user()->img))

                    <span class="user-img"><img class="rounded-circle" src="{{ asset('assets/admin/new/img/profile.png') }}" width="31" alt="Ryan Taylor"></span>
                @else
                            <span class="user-img"> <img src="{{ asset(auth()->user()->img) }}" alt="no image" class="img-fluid"></span>
                @endif
            </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm">
                        @if(is_null(auth()->user()->img))
                            <img src="{{ asset('assets/admin/new/img/profile.png') }}" alt="no image" class="img-fluid">
                        @else
                            <img src="{{ asset(auth()->user()->img) }}" alt="no image" class="img-fluid">
                        @endif
                    </div>
                    <div class="user-text">
                        <h6>{{ucfirst(auth()->user()->name)}}</h6>
{{--                        <p class="text-muted mb-0">{{auth()->user()->role->name}}</p>--}}
                    </div>
                </div>
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
                <a href="{{ route('admin.logout') }}" class="admin-logout dropdown-item"><span class="fas fa-sign-out-alt spa"></span>Logout</a>
{{--                <a class="dropdown-item" href="login.html">Logout</a>--}}
            </div>
        </li>
        <!-- /User Menu -->
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">@csrf</form>

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->

{{--<div class="header-container fixed-top shadow">--}}
{{--    <header class="header navbar navbar-expand-sm expand-header">--}}
{{--        <div class="header-left d-flex">--}}
{{--            <a href="#" class="sidebarCollapse">--}}
{{--                <i class="fas fa-bars text-muted"></i>--}}
{{--            </a>--}}
{{--            <div class="logo">--}}
{{--                ADMIN--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <ul class="navbar-item flex-row ml-auto">--}}
{{--            <!-- ==========Notification=========== -->--}}
{{--            <li class="nav-item dropdown user-profile-dropdown">--}}
{{--                <a href="#" class="nav-link user" id="notify" data-bs-toggle="dropdown">--}}
{{--                    <p class="count">5</p>--}}
{{--                    <img src="{{ asset('assets/admin/img/notification.png') }}" alt="Pic" class="icon animate__animated animate__swing">--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu">--}}
{{--                    <div class="dp-main-menu">--}}
{{--                        <a href="#" class="dropdown-item message-item">--}}
{{--                            <img src="{{ asset('assets/admin/img/server.png') }}" class="user-note">--}}
{{--                            <div class="note-info-desmis">--}}
{{--                                <div class="user-notify-info">--}}
{{--                                    <p class="note-name">Server Rebooted</p>--}}
{{--                                    <p class="note-time">20 min ago</p>--}}
{{--                                </div>--}}
{{--                                <p class="status-link"><span class="fas fa-times"></span></p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="dropdown-item message-item">--}}
{{--                            <img src="{{ asset('assets/admin/img/garage.png') }}" class="user-note">--}}
{{--                            <div class="note-info-desmis">--}}
{{--                                <div class="user-notify-info">--}}
{{--                                    <p class="note-name">Ypur Car is Repaired</p>--}}
{{--                                    <p class="note-time">40 min ago</p>--}}
{{--                                </div>--}}
{{--                                <p class="status-link"><span class="fas fa-times"></span></p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="dropdown-item message-item">--}}
{{--                            <img src="{{ asset('assets/admin/img/bank.png') }}" class="user-note">--}}
{{--                            <div class="note-info-desmis">--}}
{{--                                <div class="user-notify-info">--}}
{{--                                    <p class="note-name">Your Installment is Due</p>--}}
{{--                                    <p class="note-time">1 Hour ago</p>--}}
{{--                                </div>--}}
{{--                                <p class="status-link"><span class="fas fa-times"></span></p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="dropdown-item message-item">--}}
{{--                            <img src="{{ asset('assets/admin/img/coffin.png') }}" class="user-note">--}}
{{--                            <div class="note-info-desmis">--}}
{{--                                <div class="user-notify-info">--}}
{{--                                    <p class="note-name">Your Future Coffin is Coming</p>--}}
{{--                                    <p class="note-time">1 min ago</p>--}}
{{--                                </div>--}}
{{--                                <p class="status-link"><span class="fas fa-times"></span></p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="dropdown-item message-item">--}}
{{--                            <img src="{{ asset('assets/admin/img/coffin.png') }}" class="user-note">--}}
{{--                            <div class="note-info-desmis">--}}
{{--                                <div class="user-notify-info">--}}
{{--                                    <p class="note-name">Your Future Coffin</p>--}}
{{--                                    <p class="note-time">1 min ago</p>--}}
{{--                                </div>--}}
{{--                                <p class="status-link"><span class="fas fa-times"></span></p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="dropdown-item message-item">--}}
{{--                            <img src="{{ asset('assets/admin/img/coffin.png') }}" class="user-note">--}}
{{--                            <div class="note-info-desmis">--}}
{{--                                <div class="user-notify-info">--}}
{{--                                    <p class="note-name">Your Future Coffin</p>--}}
{{--                                    <p class="note-time">1 min ago</p>--}}
{{--                                </div>--}}
{{--                                <p class="status-link"><span class="fas fa-times"></span></p>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    <a href="#" class="mt-1 mb-2"><button type="button" class="btn btn-secondary border-0 w-100" style="margin-left: 20px;">View All</button></a>--}}
{{--                    <a href="#" class="mt-1 mb-2"><button type="button" class="btn btn-primary border-0 w-100" style="margin-left: 20px;">Clear All</button></a>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <!-- ==========Notification End=========== -->--}}
{{--            <!-- =========Profile=========== -->--}}
{{--            <li class="nav-item dropdown user-profile-dropdown">--}}
{{--                <a href="#" class="nav-link user" id="notify" data-bs-toggle="dropdown">--}}
{{--                    <img src="{{ asset('assets/admin/img/profile.png') }}" alt="Pic" class="icon">--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu">--}}
{{--                    <div class="user-profile-section">--}}
{{--                        <div class="media mx-auto">--}}
{{--                            <img src="{{ asset('assets/admin/img/profile.png') }}" class="img-fluid">--}}
{{--                            <div class="media-body">--}}
{{--                                <h5>Thanda</h5>--}}
{{--                                <p>Super Admin</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="dp-main-menu">--}}
{{--                        <a href="#" class="dropdown-item"><span class="fas fa-user spa"></span>Profile</a>--}}
{{--                        <a href="#" class="dropdown-item"><span class="fas fa-inbox spa"></span>Inbox</a>--}}
{{--                        <a href="#" class="dropdown-item"><span class="fas fa-sign-out-alt spa"></span>Logout</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <!-- =========Profile End=========== -->--}}
{{--            <!-- =========Settings=========== -->--}}
{{--            <li class="nav-item dropdown user-profile-dropdown">--}}
{{--                <a href="#" class="nav-link user" id="notify" data-bs-toggle="dropdown">--}}
{{--                    <img src="{{ asset('assets/admin/img/setting.png') }}" alt="Pic" class="icon">--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu">--}}
{{--                    <div class="dp-main-menu">--}}
{{--                        <a href="#" class="dropdown-item"><span class="fas fa-users spa"></span>Admins</a>--}}
{{--                        <a href="#" class="dropdown-item"><span class="fas fa-object-ungroup spa"></span>Design Type</a>--}}
{{--                        <a href="#" class="dropdown-item"><span class="fas fa-palette spa"></span>Color</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--            <!-- =========Settings End=========== -->--}}
{{--        </ul>--}}
{{--    </header>--}}
{{--</div>--}}
