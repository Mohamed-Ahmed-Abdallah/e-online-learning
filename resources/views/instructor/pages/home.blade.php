@extends('instructor.layout.app')

@section('style')
    <style>
        img {
            width: 80%;
            height: 400px;
            display: block;
            margin: auto;
            margin-top: 15px;
            border-radius: 20px;
            box-shadow: 5px 5px 10px blue, -5px -5px 10px blue;
        }
    </style>
@endsection

@section('content')
    <h1 style="text-align: center">المعهد العالي يرحب بالأساتذة الكرام</h1>
    <img src="{{ asset('assets/admin/img/m2.jpg') }}">
@endsection;
