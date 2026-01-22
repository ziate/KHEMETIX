@extends('install.layout')

@section('content')
    <div class="text-center">
        <h4>مرحباً بك في معالج التثبيت</h4>
        <p class="text-muted">سيساعدك هذا المعالج في إعداد مشروع Khemetix الخاص بك في بضع خطوات بسيطة.</p>
        <hr>
        <div class="my-4">
            <p>قبل البدء، يرجى التأكد من توفر معلومات قاعدة البيانات الخاصة بك.</p>
        </div>
        <a href="{{ route('install.requirements') }}" class="btn btn-primary px-5">ابدأ التثبيت الآن</a>
    </div>
@endsection
