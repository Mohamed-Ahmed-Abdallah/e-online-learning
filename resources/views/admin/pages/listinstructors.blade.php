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
            <i class="fa fa-align-justify"></i> جدول المعلمين
        </div>
        <div>
            <input type="text" id="search" class="form-control" oninput="searchNames()" placeholder="ابحث باسم المعلم">
        </div>
        <div class="card-block">
            <table class="table">
                <thead>
                    <tr>
                        <th>اسم المعلم</th>
                        <th>عنوان المعلم</th>
                        <th>ايميل المعلم</th>
                        <th>القسم</th>
                        <th>المسمي الوظيفي</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($instructors as $instructor)
                        <tr>
                            <td> {{ $instructor->name }} </td>
                            <td> {{ $instructor->address }} </td>
                            <td> {{ $instructor->email }} </td>
                            <td> {{ $instructor->dept_name }} </td>
                            <td> {{ $instructor->job_title }} </td>
                            <td>
                                <a class="page-link bg-danger" onclick="confirmDeletion(event)"
                                    href="{{ route('admin.instructor.destroy', [$instructor->id]) }}">حذف
                                    المعلم</a>
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
            let result = confirm('هل تريد حقا حذف هذا المعلم ؟');

            if (result === false) {
                ev.preventDefault();
            }
        }
    </script>
@endsection
