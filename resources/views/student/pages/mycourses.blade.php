@extends('student.layout.app')

@section('content')
    <!-- Courses Start -->
    <div class="container-fluid pt-5" style="min-height: 83.2vh">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1>My Courses</h1>
            </div>
            <div class="row" dir="rtl">
                @forelse ($courses as $course)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rounded overflow-hidden mb-2 border border-primary">
                            <img class="img-fluid" src="{{ asset('assets/frontend/img/course.jpg') }}" alt="">
                            <div class="bg-secondary p-4 text-right">
                                <a class="h5"
                                    href="{{ route('course.videos', [$course->id, $course->title]) }}">{{ $course->title }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-100" style="font-size: 25px; color: black">لم تقم بتسجيل أي مواد دراسية حتي الان
                    </p>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Courses End -->
@endsection
