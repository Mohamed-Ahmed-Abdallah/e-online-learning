<!--
 * CoreUI - Open Source Bootstrap Admin Template
 * @version v1.0.0-alpha.2
 * @link http://coreui.io
 * Copyright (c) 2016 creativeLabs Łukasz Holeczek
 * @license MIT
 -->
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <title>CoreUI Bootstrap 4 Admin Template</title>
    <!-- Icons -->
    @include('admin.includes.styles')
</head>

<body class="">
    <div class="container" style="display: flex; height: 100vh; align-items: center">
        <div class="row">
            <div class="col-md-8 m-x-auto pull-xs-none vamiddle">
                <div class="card-group">
                    <form action="{{ route('instructor.login') }}" method="POST" class="card p-a-2">
                        @csrf
                        <div class="card-block">
                            <h1>تسجيل الدخول</h1>
                            <p class="text-muted"></p>
                            <div class="input-group m-b-1">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input type="email" class="form-control" name='email'
                                    placeholder="البريد الالكتروني" autofocus required>
                            </div>
                            <div class="input-group m-b-2">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input type="password" class="form-control" name='password' placeholder="كلمة المرور"
                                    required>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <button type="submit" class="btn btn-primary p-x-2">
                                        <i class="icon-login"></i>
                                        دخول</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card card-inverse card-primary p-y-3" style="width:44%">
                        <div class="card-block text-xs-center">
                            <div>
                                <h2 style="color: green; background-color: yellow; border-radius: 20px">Instructor Website</h2>
                                <h2>E-Online-Learning</h2>
                                <p>تقدم خدمة تربوية وتعليمية متقدمة ومعتمدة فى مجال العلوم التجارية ونظم المعلومات
                                    الإدارية ويتحقق ذلك
                                    بالإستعانة بصفوة من أعضاء هيئة التدريس ومعاونيهم والهيئة الإدارية والفنية وكذلك
                                    بالإستعانة بأحدث
                                    الوسائل التعليمية لتنمية مهارات التعلم. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
