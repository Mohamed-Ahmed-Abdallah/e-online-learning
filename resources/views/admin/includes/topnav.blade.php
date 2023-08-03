<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="{{ route('admin.home') }}">E-Online-Learning</a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-left hidden-md-down">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false" style="color: black">
                    <span class="hidden-md-down" style="color: black">المدیر</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="divider"></div>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-lock"></i> خروج</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar-toggler aside-toggle"></a>
            </li>

        </ul>
    </div>
</header>
