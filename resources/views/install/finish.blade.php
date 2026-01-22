@extends('install.layout')

@section('content')
    <div class="text-center">
        <div class="mb-4">
            <span class="display-1 text-success">✓</span>
        </div>
        <h4>تم التثبيت بنجاح!</h4>
        <p>تم إعداد مشروع Khemetix الخاص بك وهو جاهز للاستخدام الآن.</p>
        <hr>
        <div class="alert alert-info text-start">
            <strong>بيانات الدخول للوحة التحكم:</strong><br>
            الرابط: <a href="{{ url('/admin') }}">{{ url('/admin') }}</a><br>
            البريد الإلكتروني: {{ session('email') }}<br>
            كلمة المرور: {{ session('password') }}
        </div>
        <p class="text-danger small">ملاحظة: تم إنشاء ملف <code>storage/installed</code> لمنع إعادة التثبيت.</p>
        <a href="{{ url('/') }}" class="btn btn-success px-5">الانتقال للموقع</a>
    </div>
@endsection
