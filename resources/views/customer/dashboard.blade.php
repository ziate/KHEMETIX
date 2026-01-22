@extends('layouts.public')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="fw-bold">مرحباً بك، {{ auth()->user()->name ?? 'مستخدم' }}</h2>
            <p class="text-muted">إليك نظرة عامة على نشاطك ورصيدك الحالي.</p>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3 bg-primary text-white">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-2" style="opacity: 0.8;">الرصيد المتبقي</h6>
                            <h2 class="display-6 fw-bold mb-0">1,250</h2>
                        </div>
                        <div class="fs-1"><i class="bi bi-coin"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">المشاريع النشطة</h6>
                            <h2 class="display-6 fw-bold mb-0">3</h2>
                        </div>
                        <div class="fs-1 text-primary"><i class="bi bi-folder"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted mb-2">خطة الاشتراك</h6>
                            <h2 class="h4 fw-bold mb-0">الخطة الاحترافية</h2>
                        </div>
                        <div class="fs-1 text-success"><i class="bi bi-star"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">آخر المشاريع</h5>
                    <a href="#" class="btn btn-sm btn-outline-primary">عرض الكل</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>اسم المشروع</th>
                                    <th>تاريخ الإنشاء</th>
                                    <th>الحالة</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>إضافة متجر إلكتروني</td>
                                    <td>2026-01-20</td>
                                    <td><span class="badge bg-success">مكتمل</span></td>
                                    <td><button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button></td>
                                </tr>
                                <tr>
                                    <td>نظام حجز مواعيد</td>
                                    <td>2026-01-22</td>
                                    <td><span class="badge bg-warning">قيد التنفيذ</span></td>
                                    <td><button class="btn btn-sm btn-light"><i class="bi bi-eye"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">إجراءات سريعة</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('customer.chat.index') }}" class="btn btn-primary py-2"><i class="bi bi-chat-dots me-2"></i> ابدأ محادثة جديدة</a>
                        <button class="btn btn-outline-secondary py-2"><i class="bi bi-plus-circle me-2"></i> إنشاء مشروع جديد</button>
                        <button class="btn btn-outline-secondary py-2"><i class="bi bi-credit-card me-2"></i> شحن الرصيد</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
