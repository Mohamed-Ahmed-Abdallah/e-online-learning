<!-- Navbar Start -->
<div class="container-fluid shadow bg-white position-fixed" style="z-index: 1000">
    <div class="row border-top px-xl-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0"><span class="text-primary">E</span>COURSES</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="font-size: 18px; cursor: pointer"
                            data-toggle="dropdown" style="cursor: pointer">
                            {{ $_SESSION['student']->name }}
                        </a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="{{ route('student.info') }}" class="dropdown-item">البيانات الشخصية</a>
                            <a href="{{ route('student.logout') }}" class="dropdown-item">تسجيل الخروج</a>
                        </div>
                    </div>
                    <div class="navbar-nav py-0 flex-row-reverse">
                        <a href="{{ route('student.home') }}" class="nav-item nav-link">الرئيسية</a>
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" style="cursor: pointer">المواد
                                الدراسية</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{ route('course.create') }}" class="dropdown-item">إضافة مادة دراسية</a>
                                <a href="{{ route('course.list') }}" class="dropdown-item">عرض المواد الدراسية</a>
                            </div>
                        </div>
                        <a href="{{ route('student.about') }}" class="nav-item nav-link">عن المعهد</a>
                        <a href="{{ route('schedule.list') }}" class="nav-item nav-link">الجداول الدراسية</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-lg-3 d-none d-lg-block">
            <a class="d-flex align-items-center flex-row-reverse w-100 text-decoration-none"
                href="{{ route('student.home') }}" style="height: 67px;">
                <h5 class="text-primary m-0"><i class="fa fa-book-open mr-2"></i>E-Online-Learning</h5>
            </a>
        </div>
    </div>
</div>
<!-- Navbar End -->
