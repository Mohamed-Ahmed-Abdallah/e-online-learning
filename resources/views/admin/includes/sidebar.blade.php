<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.home') }}"><i class="icon-speedometer"></i> لوحة التحكم </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> التحكم بالطلاب</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.student.create') }}"><i class="icon-puzzle"></i> إضافة
                            طالب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.student.list') }}"><i class="icon-puzzle"></i> عرض
                            الطلاب</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> التحكم بالمعلمين</a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.instructor.create') }}"><i class="icon-puzzle"></i>
                            إضافة معلم</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.instructor.list') }}"><i class="icon-puzzle"></i> عرض
                            المعلمين</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> التحكم بالمواد
                    </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.course.create') }}"><i class="icon-puzzle"></i> إضافة
                            مادة دراسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.course.list') }}"><i class="icon-puzzle"></i> عرض
                            المواد الدراسية</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.schedule.create') }}"><i class="icon-puzzle"></i>أضف جدول
                    دراسي</a>
            </li>

        </ul>
    </nav>
</div>
