@extends('layouts.public')

@section('content')
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal">خطط الاشتراك</h1>
    <p class="fs-5 text-muted">اختر الخطة المناسبة لاحتياجاتك وابدأ في بناء مشاريعك اليوم.</p>
</div>

<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">المبتدئ</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">$10<small class="text-muted fw-light">/شهرياً</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>1,000 رصيد شهري</li>
                    <li>دعم نماذج Llama 3.1</li>
                    <li>بناء 5 مشاريع</li>
                    <li>دعم عبر البريد</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-outline-primary">اشترك الآن</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm border-primary">
            <div class="card-header py-3 text-white bg-primary border-primary">
                <h4 class="my-0 fw-normal">المحترف</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/شهرياً</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>5,000 رصيد شهري</li>
                    <li>دعم جميع النماذج</li>
                    <li>مشاريع غير محدودة</li>
                    <li>دعم فني ذو أولوية</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-primary">اشترك الآن</button>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal">الشركات</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">$99<small class="text-muted fw-light">/شهرياً</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>20,000 رصيد شهري</li>
                    <li>دعم مخصص</li>
                    <li>وصول مبكر للميزات</li>
                    <li>تدريب خاص للفريق</li>
                </ul>
                <button type="button" class="w-100 btn btn-lg btn-primary">تواصل معنا</button>
            </div>
        </div>
    </div>
</div>
@endsection
