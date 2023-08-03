@extends('admin.layout.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success text-center" id="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <strong>إضافة معلم</strong>
        </div>
        <div class="card-block">
            <form action="{{ route('admin.instructor.store') }}" method="post" class="form-horizontal ">
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="name">اسم المعلم</label>
                    <div class="col-md-9">
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="اسم المعلم" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="address">عنوان المعلم</label>
                    <div class="col-md-9">
                        <input type="text" id="address" name="address" value="{{ old('address') }}"
                            class="form-control" placeholder="عنوان المعلم" required>
                        @error('address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="email">ايميل المعلم</label>
                    <div class="col-md-9">
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"
                            placeholder="إيميل المعلم" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="password">كلمة مرور المعلم</label>
                    <div class="col-md-9">
                        <input type="password" id="password" name="password" value="{{ old('password') }}"
                            class="form-control" placeholder="كلمة مرور المعلم" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="dept_id">اختر قسم المعلم</label>
                    <div class="col-md-9">
                        <select id="dept_id" name="dept_id" class="form-control" size="1" required>
                            <option value="">اختر قسم المعلم</option>
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
                    <label class="col-md-3 form-control-label" for="job_title">اختر المسمي الوظيفي</label>
                    <div class="col-md-9">
                        <select id="job_title" name="job_title" class="form-control" size="1" required>
                            <option value="">اختر المسمي الوظيفي</option>
                            <option value="دكتور" {{ old('job_title') === 'دكتور' ? 'selected' : '' }}>
                                دكتور</option>
                            <option value="معيد" {{ old('job_title') === 'معيد' ? 'selected' : '' }}>
                                معيد</option>
                        </select>
                        @error('job_title')
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

