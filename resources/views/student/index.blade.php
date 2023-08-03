<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ECOURSES - Online Courses HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    @include('student.includes.style')
</head>

<body>

    <!-- Registration Start -->
    <div class="container-fluid bg-registration" style="min-height: 100vh">
        <div class="container py-5">
            <div class="row align-items-center" style="margin-top: 50px">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="mb-4 text-center">
                        <h5 class="text-primary text-uppercase mb-3" style="font-size: 30px"></h5>
                        <h1 class="text-white">E-Online-Learning</h1>
                    </div>
                    <p class="text-white text-right" dir="rtl" style="font-size: 20px">تقدم خدمة تربوية وتعليمية
                        متقدمة ومعتمدة فى مجال العلوم التجارية ونظم
                        المعلومات
                        الإدارية ويتحقق ذلك
                        بالإستعانة بصفوة من أعضاء هيئة التدريس ومعاونيهم والهيئة الإدارية والفنية وكذلك بالإستعانة بأحدث
                        الوسائل التعليمية لتنمية مهارات التعلم.</p>
                </div>
                <div class="col-lg-5">
                    @if (Session::has('error'))
                        <div class="alert alert-danger text-center" style="font-size: 20px">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <div class="card border-0">
                        <div class="card-header bg-light text-center p-4">
                            <h1 class="m-0">تسجيل الدخول</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form action="{{ route('student.login') }}" method="POST" dir="rtl">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="code" value="{{ old('code') }}" class="form-control border-0 p-4"
                                        placeholder="الكود" required="required" autofocus style="font-size: 20px;" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name='password' class="form-control border-0 p-4"
                                        placeholder="كلمة المرور" required="required" style="font-size: 20px;" />
                                </div>
                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-2" type="submit"
                                        style="font-size: 23px;">دخول
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->

    @include('student.includes.script')
</body>

</html>
