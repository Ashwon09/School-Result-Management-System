<aside class="main-sidebar sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ABCD School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a  href="{{route('studenthome.details')}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">
                    <h4>Student</h4>
                </li>
                <li class="nav-item ">
                    <a href="{{route('studenthome.details')}}" class="nav-link">
                        <p>
                            <i class="fas fa-info mr-1"></i> Details
                        </p>
                    </a>
                </li>
                @if (Auth::User()->role == 'temp_student')
                <li class="nav-item">
                    <a href="{{route('studenthome.status')}}" class="nav-link">
                        <p>
                            <i class="fas fa-poll-h mr-1"></i> Registration Status
                        </p>
                    </a>
                </li>
                @endif
                @if (Auth::User()->role == 'student')
                <li class="nav-item">
                    <a href="{{route('studenthome.result')}}" class="nav-link">
                        <p>
                            <i class="fas fa-poll-h mr-1"></i> View All marks
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-header">
                    <h4>Account Settings</h4>
                </li>
                <li class="nav-item">
                    <a href="{{route('studenthome.password')}}" class="nav-link">
                        <p>
                            <i class="fas fa-lock mr-1"></i> Change Password
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>