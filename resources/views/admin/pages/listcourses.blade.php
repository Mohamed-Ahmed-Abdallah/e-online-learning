@extends('admin.layout.app')

@section('style')
    <style>
        #search {
            width: 96.5%;
            margin: auto;
            margin-top: 20px;
            border: 1px solid#2196f3;
        }
    </style>
@endsection

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success text-center" id="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> جدول المواد الدراسية
        </div>
        <div>
            <input type="text" id="search" class="form-control" oninput="searchNames()"
                placeholder="ابحث باسم المادة الدراسية">
        </div>
        <div class="card-block">
            <table class="table">
                <thead>
                    <tr>
                        <th>اسم المادة</th>
                        <th>القسم</th>
                        <th>الفرقة الدراسية</th>
                        <th>الفصل الدراسي</th>
                        <th>الدكتور</th>
                        <th>المعيد</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td> {{ $course->title }} </td>
                            <td> {{ $course->dept_name }} </td>
                            <td> {{ $course->level_name }} </td>
                            <td> {{ $course->term_name }} </td>
                            <td> {{ $course->job_title . '/ ' . $course->instructor_name }} </td>
                            <td> {{ $course->TA_title . '/ ' . $course->TA_name }} </td>
                            <td>
                                <a class="page-link bg-danger" onclick="confirmDeletion(event)"
                                    href="{{ route('admin.course.destroy', [$course->id]) }}">حذف
                                    المادة</a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function searchNames() {
            let tableRows = document.querySelectorAll("table tr");
            let searchValue = document.getElementById("search").value.trim();

            for (let i = 1; i < tableRows.length; i++) {
                if (!tableRows[i].children[0].innerText.toLowerCase().startsWith(searchValue.toLowerCase())) {
                    tableRows[i].style.display = "none";
                } else {
                    tableRows[i].style.display = null;
                }
            }
        }

        function confirmDeletion(ev) {
            let result = confirm('هل تريد حقا حذف هذه المادة ؟');

            if (result === false) {
                ev.preventDefault();
            }
        }
    </script>
@endsection
