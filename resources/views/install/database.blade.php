@extends('install.layout')

@section('content')
    <h4>إعداد قاعدة البيانات</h4>
    <hr>
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ route('install.database.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Host</label>
            <input type="text" name="db_host" class="form-label" value="127.0.0.1" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">اسم قاعدة البيانات</label>
            <input type="text" name="db_name" class="form-control" placeholder="khemetix" required>
        </div>
        <div class="mb-3">
            <label class="form-label">اسم المستخدم</label>
            <input type="text" name="db_user" class="form-control" placeholder="root" required>
        </div>
        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input type="password" name="db_pass" class="form-control">
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('install.requirements') }}" class="btn btn-secondary">السابق</a>
            <button type="submit" class="btn btn-primary">التحقق والمتابعة</button>
        </div>
    </form>
@endsection
