@extends('layouts.public')

@section('content')
<style>
    .chat-container { height: 600px; display: flex; flex-direction: column; }
    .chat-messages { flex-grow: 1; overflow-y: auto; padding: 20px; background: #f8f9fa; border-radius: 10px; }
    .message { margin-bottom: 15px; max-width: 80%; padding: 12px 16px; border-radius: 15px; }
    .message-user { align-self: flex-end; background: #007bff; color: white; margin-left: auto; }
    .message-assistant { align-self: flex-start; background: white; border: 1px solid #dee2e6; }
</style>

<div class="container py-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">المحادثات السابقة</h5>
                </div>
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action active">بناء إضافة ووردبريس</a>
                    <a href="#" class="list-group-item list-group-item-action">تعديل قالب CSS</a>
                    <a href="#" class="list-group-item list-group-item-action">استفسار عن API</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card border-0 shadow-sm rounded-3 chat-container">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">مساعد Khemetix الذكي</h5>
                    <select class="form-select form-select-sm w-auto">
                        <option>Llama 3.3 70B (احترافي)</option>
                        <option>Llama 3.1 8B (سريع)</option>
                    </select>
                </div>
                <div class="chat-messages d-flex flex-column" id="chat-box">
                    <div class="message message-assistant">
                        مرحباً بك! أنا مساعدك الذكي في Khemetix. كيف يمكنني مساعدتك في مشروع ووردبريس الخاص بك اليوم؟
                    </div>
                    <div class="message message-user">
                        أريد بناء إضافة بسيطة لعرض أحدث المقالات في شريط جانبي.
                    </div>
                    <div class="message message-assistant">
                        بالتأكيد! سأقوم بتوليد الكود اللازم لك. هل تريد إضافة خيارات تخصيص معينة مثل عدد المقالات؟
                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <form id="chat-form">
                        <div class="input-group">
                            <input type="text" class="form-control py-2" placeholder="اكتب رسالتك هنا...">
                            <button class="btn btn-primary px-4" type="submit"><i class="bi bi-send"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
