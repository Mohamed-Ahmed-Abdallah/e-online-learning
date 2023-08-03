@extends('student.layout.app')

@section('style')
    <style>
        .list-group span,
        .list-group a {
            font-size: 25px;
        }

        .list-group a {
            color: blue;
            text-decoration: underline !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid pt-5" style="min-height: 83.3vh">
        <div class="container py-5 mt-4">
            <div class="row">
                <div class="col-lg-9 mb-5 m-auto">
                    <h3 class="text-uppercase text-center mb-4" style="font-size: 30px">الجداول الدراسية</h3>
                    <ul class="list-group list-group-flush">
                        @forelse ($schedules as $schedule)
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <a href="{{ asset('/upload/pdf/' . $schedule->file_path) }}"
                                    class="text-decoration-none h6 m-0">تحميل</a>
                                <span>{{ $schedule->title }}</span>
                            </li>
                        @empty
                            <p class="text-center w-100" style="font-size: 25px; color: black">لا توجد جداول دراسية حتي الان
                                حتي الان
                            </p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
