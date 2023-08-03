@extends('admin.layout.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success text-center" id="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <strong>إضافة طالب</strong>
        </div>
        <div class="card-block">
            <form action="{{ route('admin.student.store') }}" method="post" class="form-horizontal ">
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="name">اسم الطالب</label>
                    <div class="col-md-9">
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="اسم الطالب" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="address">عنوان الطالب</label>
                    <div class="col-md-9">
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                            class="form-control" placeholder="عنوان الطالب" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="code">كود الطالب</label>
                    <div class="col-md-9">
                        <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control"
                            placeholder="كود الطالب" required>
                        @error('code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="password">كلمة مرور الطالب</label>
                    <div class="col-md-9">
                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                            class="form-control" placeholder="كلمة مرور الطالب" required>
                        @error('password')
                            <div class="text-danger" required>{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="dept_id">اختر قسم الطالب</label>
                    <div class="col-md-9">
                        <select id="dept_id" name="dept_id" class="form-control" size="1" required>
                            <option value="">اختر قسم الطالب</option>
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
                    <label class="col-md-3 form-control-label" for="level_id">اختر فرقة الطالب</label>
                    <div class="col-md-9">
                        <select id="level_id" name="level_id" class="form-control" size="1" required>
                            <option value="">اختر فرقة الطالب</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}"
                                    {{ (int) old('level_id') === $level->id ? 'selected' : '' }}>
                                    {{ $level->name }}</option>
                            @endforeach
                        </select>
                        @error('level_id')
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
