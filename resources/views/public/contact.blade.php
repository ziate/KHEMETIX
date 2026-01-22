@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-5">
                    <h2 class="text-center mb-4 fw-bold">تواصل معنا</h2>
                    <p class="text-center text-muted mb-5">لديك استفسار أو تحتاج إلى دعم؟ نحن هنا للمساعدة.</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">الاسم الكامل</label>
                                <input type="text" class="form-control" placeholder="أدخل اسمك">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control" placeholder="name@example.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label">الموضوع</label>
                                <input type="text" class="form-control" placeholder="كيف يمكننا مساعدتك؟">
                            </div>
                            <div class="col-12">
                                <label class="form-label">الرسالة</label>
                                <textarea class="form-control" rows="5" placeholder="اكتب رسالتك هنا..."></textarea>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5 py-2 rounded-pill">إرسال الرسالة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
