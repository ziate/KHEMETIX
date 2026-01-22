@extends('layouts.admin')

@section('title', __('messages.plans'))
@section('header', __('messages.plans'))

@section('content')

@if(session('success'))
    <div class="alert alert-success mb-3">{{ session('success') }}</div>
@endif

@php
    // روابط آمنة حتى لو بعض الراوتات غير موجودة
    $createUrl = \Illuminate\Support\Facades\Route::has('admin.plans.create')
        ? route('admin.plans.create')
        : url('/admin/plans/create');
@endphp

<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Active Plans</h6>
                <h3 class="fw-bold mb-0">{{ (int)($planCount ?? 0) }}</h3>
                <small class="text-muted">Published offers</small>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Subscribers</h6>
                <h3 class="fw-bold mb-0">{{ number_format((int)($subscriberCount ?? 0)) }}</h3>
                <small class="text-muted">Last 30 days</small>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Monthly MRR</h6>
                <h3 class="fw-bold mb-0">${{ number_format((float)($monthlyMrr ?? 0), 2) }}</h3>
                <small class="text-muted">Estimated</small>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Overage Revenue</h6>
                <h3 class="fw-bold mb-0">${{ number_format((float)($overageRevenue ?? 0), 2) }}</h3>
                <small class="text-muted">Usage-based billing</small>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div class="btn-group">
        <button type="button" class="btn btn-outline-light">All Plans</button>
        <button type="button" class="btn btn-outline-light">Monthly</button>
        <button type="button" class="btn btn-outline-light">Annual</button>
        <button type="button" class="btn btn-outline-light">Enterprise</button>
    </div>

    <div class="d-flex flex-wrap gap-2">
        <button type="button" class="btn btn-outline-info">Sync Pricing</button>
        <a class="btn btn-primary" href="{{ $createUrl }}">Create New Plan</a>
    </div>
</div>

<div class="row g-4">
    @forelse($plans as $plan)
        @php
            $editUrl = \Illuminate\Support\Facades\Route::has('admin.plans.edit')
                ? route('admin.plans.edit', $plan)
                : url('/admin/plans/' . $plan->id . '/edit');

            $deleteUrl = \Illuminate\Support\Facades\Route::has('admin.plans.destroy')
                ? route('admin.plans.destroy', $plan)
                : url('/admin/plans/' . $plan->id);

            $isActive = (bool)($plan->is_active ?? true);
            $badgeClass = $isActive ? 'success' : 'secondary';
            $badgeText  = $isActive ? 'Active' : 'Inactive';
        @endphp

        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="fw-bold mb-1">{{ $plan->name }}</h4>
                            <p class="text-muted mb-0">Billing: {{ ucfirst($plan->billing_cycle ?? 'monthly') }}</p>
                        </div>
                        <span class="badge bg-{{ $badgeClass }}">{{ $badgeText }}</span>
                    </div>

                    <div class="display-6 fw-bold mt-3">
                        ${{ number_format((float)($plan->price ?? 0), 2) }}
                        <span class="fs-6 text-muted">/{{ $plan->billing_cycle ?? 'monthly' }}</span>
                    </div>

                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <span>Credits</span>
                            <span class="fw-semibold">{{ number_format((int)($plan->included_credits ?? 0)) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tokens / day</span>
                            <span class="fw-semibold">{{ number_format((int)($plan->max_tokens_per_day ?? 0)) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Requests / day</span>
                            <span class="fw-semibold">{{ number_format((int)($plan->max_requests_per_day ?? 0)) }}</span>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Overage:
                            @if(!empty($plan->overage_enabled))
                                ${{ number_format((float)($plan->overage_price_per_1k_tokens ?? 0), 2) }} / 1K tokens
                            @else
                                Disabled
                            @endif
                        </small>

                        <div class="d-flex gap-2">
                            <a class="btn btn-outline-info btn-sm" href="{{ $editUrl }}">Edit</a>
                            <button type="button"
                                    class="btn btn-outline-danger btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deletePlan{{ $plan->id }}">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delete Modal --}}
        <div class="modal fade" id="deletePlan{{ $plan->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Plan</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        Are you sure you want to delete <strong>{{ $plan->name }}</strong>? This action cannot be undone.
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>

                        <form method="POST" action="{{ $deleteUrl }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Yes, delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center text-muted">
                    No plans yet. Create your first plan to get started.
                    <div class="mt-3">
                        <a class="btn btn-primary" href="{{ $createUrl }}">Create New Plan</a>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
</div>

@endsection
