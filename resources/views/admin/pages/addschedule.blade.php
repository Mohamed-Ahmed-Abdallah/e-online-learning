@extends('admin.layout.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success text-center" id="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <strong>إضافة جدول</strong>
        </div>
        <div class="card-block">
            <form action="{{ route('admin.schedule.store') }}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="dept_id">اختر القسم</label>
                    <div class="col-md-9">
                        <select id="dept_id" name="dept_id" class="form-control" size="1" required>
                            <option value="">اختر القسم</option>
                            @foreach ($depts as $dept)
                                <option value="{{ $dept->id }}"
                                    {{ (int) old('dept_id') === $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}</option>
                            @endforeach
                        </select>
                        @error('dept_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="level_id">اختر الفرقة</label>
                    <div class="col-md-9">
                        <select id="level_id" name="level_id" class="form-control" size="1" required>
                            <option value="">اختر الفرقة </option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}"
                                    {{ (int) old('level_id') === $level->id ? 'selected' : '' }}>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="title">عنوان الملف</label>
                    <div class="col-md-9">
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required
                            class="form-control" placeholder="عنوان الملف">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="file_path">ملف الجدول</label>
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

