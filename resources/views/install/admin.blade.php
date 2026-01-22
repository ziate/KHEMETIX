@extends('install.layout')

@section('content')
    <h4>إعداد حساب المدير</h4>
    <p class="text-muted small">سيتم إنشاء قاعدة البيانات وتنصيب الجداول عند الضغط على زر المتابعة.</p>
    <hr>
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ route('install.admin.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">الاسم الكامل</label>
            <input type="text" name="name" class="form-control" placeholder="Admin" required>
        </div>
        <div class="mb-3">
            <label class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" placeholder="admin@example.com" required>
        </div>
        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input type="password" name="password" class="form-control" required minlength="8">
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('install.database') }}" class="btn btn-secondary">السابق</a>
            <button type="submit" class="btn btn-primary">إنهاء التثبيت</button>
        </div>
    </form>
@endsection
