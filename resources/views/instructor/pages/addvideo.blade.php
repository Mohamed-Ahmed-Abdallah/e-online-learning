@extends('instructor.layout.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success text-center" id="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <strong>إضافة فيديو</strong>
        </div>
        <div class="card-block">
            <form action="{{ route('instructor.video.store') }}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="course_id">اختر المادة</label>
                    <div class="col-md-9">
                        <select id="course_id" name="course_id" class="form-control" size="1" required>
                            <option value="">اختر المادة</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    {{ (int) old('course_id') === $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}</option>
                            @endforeach
                        </select>
                        @error('course_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @if ($_SESSION['instructor']->job_title === 'معيد')
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label" for="video_type">اختر نوع الفيديو</label>
                        <div class="col-md-9">
                            <select id="video_type" name="video_type" class="form-control" size="1" required>
                                <option value="">اختر نوع الفيديو </option>
                                <option value="سكشن" {{ old('video_type') === 'سكشن' ? 'selected' : '' }}>
                                    سكشن</option>
                                <option value="معمل" {{ old('video_type') === 'معمل' ? 'selected' : '' }}>
                                    معمل</option>
                            </select>
                            @error('video_type')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                @else
                    <input type="hidden" name="video_type" value="محاضرة">
                @endif
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="title">عنوان الفيديو</label>
                    <div class="col-md-9">
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required
                            class="form-control" placeholder="عنوان الفيديو">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="file_path">ملف الفيديو</label>
                    <div class="col-md-9">
                        <input type="file" id="file_path" name="file_path" value="{{ old('file_path') }}" required
                            class="form-control">
                        @error('file_path')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer" style="text-align: center">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                        Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection;
