@extends('instructor.layout.app')

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
            <i class="fa fa-align-justify"></i> جدول الفيديوهات
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
                        <th>نوع الفيديو</th>
                        <th>ملف الفيديو</th>
                        <th>عنوان الفيديو</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($videos as $video)
                        <tr>
                            <td> {{ $video->course_title }} </td>
                            <td> {{ $video->video_type }} </td>
                            <td> <video src="{{ asset('upload/video/' . $video->file_path) }}" width="200" height="100"
                                    controls style="background-color: black"></video></td>
                            <td> {{ $video->title }} </td>
                            <td>
                                <a class="page-link bg-danger" onclick="confirmDeletion(event)"
                                    href="{{ route('instructor.video.destroy', [$video->id]) }}">حذف
                                    الفيديو</a>
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
            let result = confirm('هل تريد حقا حذف هذا الفيديو ؟');

            if (result === false) {
                ev.preventDefault();
            }
        }
    </script>
@endsection
