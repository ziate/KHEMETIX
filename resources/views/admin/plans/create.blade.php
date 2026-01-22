@extends("layouts.admin")
@section("title", "Create Plan")
@section("header", "Create Plan")
@section("content")
<div class="card">
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @php($storeUrl = \Illuminate\Support\Facades\Route::has('admin.plans.store') ? route('admin.plans.store') : url('/admin/plans'))
        <form method="POST" action="{{ $storeUrl }}" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Plan Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Billing Cycle</label>
                <select name="billing_cycle" class="form-select" required>
                    <option value="monthly" @selected(old('billing_cycle') === 'monthly')>Monthly</option>
                    <option value="annual" @selected(old('billing_cycle') === 'annual')>Annual</option>
                    <option value="custom" @selected(old('billing_cycle') === 'custom')>Custom</option>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Included Credits</label>
                <input type="number" name="included_credits" class="form-control" value="{{ old('included_credits') }}" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Overage Price (per 1K tokens)</label>
                <input type="number" step="0.01" name="overage_price_per_1k_tokens" class="form-control" value="{{ old('overage_price_per_1k_tokens') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Max Requests / Day</label>
                <input type="number" name="max_requests_per_day" class="form-control" value="{{ old('max_requests_per_day') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Max Tokens / Day</label>
                <input type="number" name="max_tokens_per_day" class="form-control" value="{{ old('max_tokens_per_day') }}">
            </div>
            <div class="col-12">
                <label class="form-label">Model Multipliers (JSON)</label>
                <textarea name="model_multipliers" class="form-control" rows="4" placeholder='{"llama-3.3-70b-versatile": 1.2}'>{{ old('model_multipliers') }}</textarea>
            </div>
            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="overageEnabled" name="overage_enabled" value="1" @checked(old('overage_enabled'))>
                    <label class="form-check-label" for="overageEnabled">Enable Overage Billing</label>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end gap-2">
                @php($indexUrl = \Illuminate\Support\Facades\Route::has('admin.plans.index') ? route('admin.plans.index') : url('/admin/plans'))
                <a href="{{ $indexUrl }}" class="btn btn-outline-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Plan</button>
            </div>
        </form>
    </div>
</div>
@endsection
