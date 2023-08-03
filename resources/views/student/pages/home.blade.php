@extends('student.layout.app')

@section('style')
    <style>
        h5 {
            font-size: 25px;
        }

        img {
            height: 370px !important;
        }

        p {
            line-height: 1.5;
            font-size: 20px;
        }
    </style>
@endsection

@section('content')
    <!-- Carousel Start -->
    <div style="height: 1px"></div>
    <div class="container-fluid p-0 mb-3">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="{{ asset('assets/frontend/img/m1.jpg') }}"
                        style="min-height: 600px;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="{{ asset('assets/frontend/img/m2.jpg') }}"
                        style="min-height: 600px;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid pt-3" dir="rtl">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('assets/frontend/img/m2.jpg') }}"
                        alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-right mb-4">
                        <h5 class="text-primary text-uppercase mb-3">عن المعهد</h5>
                        <h1>طريقة مبتكرة للتعلم</h1>
                    </div>
                    <p class="text-right">تقدم خدمة تربوية وتعليمية متقدمة ومعتمدة فى مجال العلوم التجارية ونظم المعلومات
                        الإدارية ويتحقق ذلك
                        بالإستعانة بصفوة من أعضاء هيئة التدريس ومعاونيهم والهيئة الإدارية والفنية وكذلك بالإستعانة بأحدث
                        الوسائل التعليمية لتنمية مهارات التعلم كما . يعمل المعهد على توفير المناخ المناسب لتنمية الطلاب
                        ثقافياً واجتماعياً ورياضياً وتشجيعهم على الإبداع والتميز وكذلك الإسهام الإيجابى فى تسويق خريجى
                        المعهد بما يمكنهم من مواكبة التطور فى متطلبات سوق العمل بما يحقق المسئولية المجتمعية الفعالة.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
