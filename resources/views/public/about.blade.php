@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">عن Khemetix</h1>
            <p class="lead">نحن نسعى لتغيير طريقة تطوير إضافات ووردبريس من خلال دمج قوة الذكاء الاصطناعي مع خبرة المطورين. منصتنا توفر الأدوات اللازمة لإنشاء أكواد برمجية نظيفة، آمنة، وفعالة في وقت قياسي.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-lg px-4 me-md-2">تواصل معنا</a>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=600&q=80" class="d-block mx-lg-auto img-fluid rounded-3 shadow" alt="Coding" width="700" height="500" loading="lazy">
        </div>
    </div>
</div>
@endsection
