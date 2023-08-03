@extends('student.layout.app')

@section('style')
    <style>
        .list-group span,
        .list-group p {
            font-size: 25px;
        }

        .list-group p {
            min-width: 500px;
            text-align: right;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid pt-5" style="min-height: 83.3vh">
        <div class="container py-5 mt-4">
            <div class="row">
                <div class="col-lg-7 mb-5 m-auto">
                    <h3 class="text-uppercase text-center mb-4" style="font-size: 30px">البيانات الشخصية</h3>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <p class="text-decoration-none h6 m-0">{{ $info->code }}</p>
                            <span class="text-primary">الكود</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <p class="text-decoration-none h6 m-0">{{ $info->name }}</p>
                            <span class="text-primary">الاسم</span>
                        </li>
                        {{-- <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <p class="text-decoration-none h6 m-0">{{ $info->address }}</p>
                            <span class="text-primary">العنوان</span>
                        </li> --}}
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <p class="text-decoration-none h6 m-0">{{ $info->dept_name }}</p>
                            <span class="text-primary">الشعبة</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <p class="text-decoration-none h6 m-0">{{ $info->level_name }}</p>
                            <span class="text-primary">الفرقة</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
