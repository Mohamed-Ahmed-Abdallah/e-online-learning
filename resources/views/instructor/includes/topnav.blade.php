<style>
    .c-black {
        color: black !important;
    }
</style>

<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="{{ route('instructor.home') }}">E-Online-Learning</a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-left hidden-md-down">
            {{-- <li class="nav-item">
                <a class="nav-link aside-toggle" href="#" style="margin-top: 20px;"><i class="icon-bell"></i><span
                        class="tag tag-pill tag-danger">5</span></a>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link c-black" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false">
                    <span
                        class="hidden-md-down c-black">{{ $_SESSION['instructor']->job_title . ' / ' . $_SESSION['instructor']->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    {{-- <a class="dropdown-item" href="#"><i class="fa fa-user"></i> پروفایل</a> --}}
                    <div class="divider"></div>
                    <a class="dropdown-item" href="{{ route('instructor.logout') }}"><i class="fa fa-lock"></i> خروج</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar-toggler aside-toggle"></a>
            </li>

        </ul>
    </div>
</header>
