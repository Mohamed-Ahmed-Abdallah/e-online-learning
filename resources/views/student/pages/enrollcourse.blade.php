@extends('student.layout.app')

@section('content')
    <!-- Contact Start -->
    <div class="container-fluid py-5" dir="rtl">
        <div class="container">
            <div class="text-center mb-3" style="margin-top: 66px">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"></h5>
                <h1>سجل الدخول لمادة دراسية جديدة</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center" style="font-size: 20px">
                            {{ Session::get('error') }} </div>
                    @endif
                    <div class="contact-form bg-secondary rounded p-5 border border-primary">
                        <form action="{{ route('course.store') }}" method="POST">
                            @csrf
                            <div class="control-group mb-4">
                                <select class="form-control" value="" style="font-size: 20px" required
                                    id='levelselect'>
                                    <option value="">اختر الفرقة </option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}"> {{ $level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="control-group mb-4">
                                <select class="form-control" name="course_id" value="{{ old('course_id') }}"
                                    style="font-size: 20px" required id='courseselect' disabled required>
                                    <option value="">اختر المادة الدراسية</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" levelid="{{ $course->level_id }}">
                                            {{ $course->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="control-group mb-4">
                                <input type="text" class="form-control py-4" style="font-size: 20px" name="crscode"
                                    placeholder="كود المادة" required="required" disabled id='crscode' required />
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-2 px-5" style="font-size: 20px" type="submit"
                                    id="sendMessageButton">
                                    تسجيل</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection

@section('script')
    <script>
        let levelSelect = document.getElementById('levelselect');
        let courseSelect = document.getElementById('courseselect');
        let courseSelectOptions = courseSelect.querySelectorAll('option');
        let crsCode = document.getElementById('crscode');

        levelSelect.onchange = () => {

            // first we hide all courses in the course (select tag).
            for (let i = 0; i < courseSelectOptions.length; i++) {
                if (courseSelectOptions[i].value !== "")
                    courseSelectOptions[i].style.display = 'none';
            }

            let found = false;
            for (let i = 1; i < courseSelectOptions.length; i++) {
                if (courseSelectOptions[i].getAttribute('levelid') === levelSelect.value) {
                    courseSelectOptions[i].style.display = 'block';
                    found = true;
                }
            }

            if (found === true) {
                crsCode.removeAttribute('disabled');
                courseSelect.removeAttribute('disabled');
            } else {
                courseSelect.value = '';
                crsCode.value = '';
                courseSelect.setAttribute('disabled', 'disabled');
                crsCode.setAttribute('disabled', 'disabled');
            }
        }
    </script>
@endsection
