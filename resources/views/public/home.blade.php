@extends('layouts.public')

@section('content')
<style>
    .hero-section { background: linear-gradient(45deg, #0c1a3e, #1a3e6e); }
    .feature-icon { width: 4rem; height: 4rem; }
</style>

<div class="hero-section text-center py-5 text-white rounded-3 mb-5">
    <div class="container py-5">
        <h1 class="display-4 fw-bold mb-4">@lang('messages.welcome')</h1>
        <p class="lead mb-5">المنصة المتكاملة لمطوري ووردبريس المدعومة بالذكاء الاصطناعي. ابدأ ببناء إضافاتك الاحترافية في دقائق.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="{{ route('register') }}" class="btn btn-primary btn-lg px-4 gap-3">ابدأ الآن مجاناً</a>
            <a href="{{ route('pricing') }}" class="btn btn-outline-light btn-lg px-4">عرض الخطط</a>
        </div>
    </div>
</div>

<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom text-center">لماذا Khemetix؟</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="feature col text-center">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3 rounded-circle p-3 mx-auto">
                <i class="bi bi-cpu"></i>
            </div>
            <h3 class="fs-2">ذكاء اصطناعي متطور</h3>
            <p>نستخدم أحدث نماذج Llama 3 و Groq لضمان سرعة ودقة استجابة فائقة في توليد الأكواد.</p>
        </div>
        <div class="feature col text-center">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3 rounded-circle p-3 mx-auto">
                <i class="bi bi-wordpress"></i>
            </div>
            <h3 class="fs-2">بناء إضافات ووردبريس</h3>
            <p>حوّل أفكارك إلى إضافات ووردبريس كاملة مع هيكلية ملفات منظمة وأكواد برمجية آمنة.</p>
        </div>
        <div class="feature col text-center">
            <div class="feature-icon d-inline-flex align-items-center justify-content-center bg-primary bg-gradient text-white fs-2 mb-3 rounded-circle p-3 mx-auto">
                <i class="bi bi-shield-check"></i>
            </div>
            <h3 class="fs-2">أمان وموثوقية</h3>
            <p>نظام متكامل لفحص الأمان والتأكد من توافق الأكواد مع معايير ووردبريس العالمية.</p>
        </div>
    </div>
</div>
@endsection
