@extends('frontend.layout.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">المحاضرات</h3>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Contact Start -->
    <div class="container-fluid py-5" dir="rtl">
        <div class="container">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;"></h5>
                <h1>شاهد فيديوهات المحاضرات</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-secondary rounded p-5 border border-primary">
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">

                            <div class="control-group mb-4">
                                <select class="form-control" style="font-size: 20px">
                                    <option>اختر المادة الدراسية</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary py-2 px-5" style="font-size: 20px" type="submit"
                                    id="sendMessageButton">
                                    شاهد الان</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
