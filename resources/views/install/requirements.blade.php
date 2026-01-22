@extends('install.layout')

@section('content')
    <h4>التحقق من متطلبات النظام</h4>
    <hr>
    <ul class="list-group mb-4">
        @foreach($requirements as $name => $met)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $name }}
                @if($met)
                    <span class="badge bg-success rounded-pill">✓</span>
                @else
                    <span class="badge bg-danger rounded-pill">✗</span>
                @endif
            </li>
        @endforeach
    </ul>

    <div class="d-flex justify-content-between">
        <a href="{{ route('install.welcome') }}" class="btn btn-secondary">السابق</a>
        @if($all_met)
            <a href="{{ route('install.database') }}" class="btn btn-primary">التالي: إعداد قاعدة البيانات</a>
        @else
            <button class="btn btn-primary" disabled>يرجى إصلاح المتطلبات للمتابعة</button>
        @endif
    </div>
@endsection
