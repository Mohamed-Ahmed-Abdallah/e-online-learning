@extends('admin.layout.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success text-center" id="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <strong>إضافة مادة دراسية</strong>
        </div>
        <div class="card-block">
            <form action="{{ route('admin.course.store') }}" method="post" class="form-horizontal ">
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="title">اسم المادة</label>
                    <div class="col-md-9">
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control"
                            placeholder="اسم المادة" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="crscode">كود المادة</label>
                    <div class="col-md-9">
                        <input type="text" id="crscode" name="crscode" value="{{ old('crscode') }}"
                            class="form-control" placeholder="كود المادة" required>
                        @error('crscode')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="dept_id">اختر قسم المادة</label>
                    <div class="col-md-9">
                        <select id="dept_id" name="dept_id" class="form-control" size="1" required>
                            <option value="">اختر قسم المادة</option>
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
                                    {{ $level->name }}</option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="term_name">اختر الفصل الدراسي</label>
                    <div class="col-md-9">
                        <select id="term_name" name="term_name" class="form-control" size="1" required>
                            <option value="">اختر الفصل الدراسي </option>
                            <option value="الفصل الأول" {{ old('term_name') === 'الفصل الأول' ? 'selected' : '' }}>
                                الفصل الأول
                            </option>
                            <option value="الفصل الثاني" {{ old('term_name') === 'الفصل الثاني' ? 'selected' : '' }}>
                                الفصل الثاني</option>
                        </select>
                        @error('term_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="doctor_id">اختر الدكتور </label>
                    <div class="col-md-9">
                        <select id="doctor_id" name="doctor_id" class="form-control" size="1" required>
                            <option value="">اختر الدكتور</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}"
                                    {{ (int) old('doctor_id') === $doctor->id ? 'selected' : '' }}>
                                    {{ $doctor->job_title . '/ ' . $doctor->name }}</option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="TA_id">اختر المعيد </label>
                    <div class="col-md-9">
                        <select id="TA_id" name="TA_id" class="form-control" size="1" required>
                            <option value="">اختر المعيد</option>
                            @foreach ($TAs as $TA)
                                <option value="{{ $TA->id }}"
                                    {{ (int) old('TA_id') === $TA->id ? 'selected' : '' }}>
                                    {{ $TA->job_title . '/ ' . $TA->name }}</option>
                            @endforeach
                        </select>
                        @error('TA_id')
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
