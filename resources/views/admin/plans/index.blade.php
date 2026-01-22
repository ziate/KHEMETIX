@extends("layouts.admin")
@section("title", __("messages.plans"))
@section("header", __("messages.plans"))
@section("content")
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Active Plans</h6>
                <h3 class="fw-bold mb-0">{{ $planCount }}</h3>
                <small class="text-muted">Published offers</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Subscribers</h6>
                <h3 class="fw-bold mb-0">{{ number_format($subscriberCount) }}</h3>
                <small class="text-muted">Last 30 days</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Monthly MRR</h6>
                <h3 class="fw-bold mb-0">${{ number_format($monthlyMrr, 2) }}</h3>
                <small class="text-muted">+12% MoM</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Overage Revenue</h6>
                <h3 class="fw-bold mb-0">${{ number_format($overageRevenue, 2) }}</h3>
                <small class="text-muted">Usage-based billing</small>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div class="btn-group">
        <button class="btn btn-outline-light">All Plans</button>
        <button class="btn btn-outline-light">Monthly</button>
        <button class="btn btn-outline-light">Annual</button>
        <button class="btn btn-outline-light">Enterprise</button>
    </div>
    <div class="d-flex flex-wrap gap-2">
        <button class="btn btn-outline-info">Sync Pricing</button>
        <a class="btn btn-primary" href="{{ route('admin.plans.create') }}">Create New Plan</a>
    </div>
</div>

<div class="row g-4">
    @forelse($plans as $plan)
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="fw-bold">{{ $plan->name }}</h4>
                            <p class="text-muted">Billing: {{ ucfirst($plan->billing_cycle) }}</p>
                        </div>
                        <span class="badge bg-success">Active</span>
                    </div>
                    <div class="display-6 fw-bold">${{ number_format($plan->price, 2) }}
                        <span class="fs-6 text-muted">/{{ $plan->billing_cycle }}</span>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <span>Credits</span>
                            <span class="fw-semibold">{{ number_format($plan->included_credits) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Tokens / day</span>
                            <span class="fw-semibold">{{ number_format($plan->max_tokens_per_day ?? 0) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Requests / day</span>
                            <span class="fw-semibold">{{ number_format($plan->max_requests_per_day ?? 0) }}</span>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            Overage:
                            @if($plan->overage_enabled)
                                ${{ number_format($plan->overage_price_per_1k_tokens, 2) }} / 1K tokens
                            @else
                                Disabled
                            @endif
                        </small>
                        <div class="d-flex gap-2">
                            <a class="btn btn-outline-info btn-sm" href="{{ route('admin.plans.edit', $plan) }}">Edit</a>
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePlan{{ $plan->id }}">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <form method="POST" action="{{ route('admin.plans.destroy', $plan) }}">
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
                </div>
            </div>
        </div>
    @endforelse
</div>

<div class="card mt-4">
    <div class="card-body">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
            <h5 class="fw-semibold mb-0">Plan Governance</h5>
            <button class="btn btn-outline-light btn-sm">View Change Log</button>
        </div>
        <div class="row g-3">
            <div class="col-lg-4">
                <label class="form-label">Default Trial Days</label>
                <input type="number" class="form-control" value="14">
            </div>
            <div class="col-lg-4">
                <label class="form-label">Grace Period (days)</label>
                <input type="number" class="form-control" value="7">
            </div>
            <div class="col-lg-4">
                <label class="form-label">Auto-cancel Idle Plans</label>
                <select class="form-select">
                    <option>Disabled</option>
                    <option>After 30 days</option>
                    <option>After 60 days</option>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary">Save Governance Rules</button>
        </div>
    </div>
</div>
@endsection
