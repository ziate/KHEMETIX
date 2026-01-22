@extends("layouts.admin")
@section("title", __("messages.plans"))
@section("header", __("messages.plans"))
@section("content")
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Active Plans</h6>
                <h3 class="fw-bold mb-0">4</h3>
                <small class="text-muted">Published offers</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Subscribers</h6>
                <h3 class="fw-bold mb-0">2,480</h3>
                <small class="text-muted">Last 30 days</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Monthly MRR</h6>
                <h3 class="fw-bold mb-0">$86,200</h3>
                <small class="text-muted">+12% MoM</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Overage Revenue</h6>
                <h3 class="fw-bold mb-0">$5,420</h3>
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
        <button class="btn btn-primary">Create New Plan</button>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="fw-bold">Starter</h4>
                        <p class="text-muted">Best for pilots & MVPs</p>
                    </div>
                    <span class="badge bg-success">Active</span>
                </div>
                <div class="display-6 fw-bold">$10<span class="fs-6 text-muted">/mo</span></div>
                <div class="mt-3">
                    <div class="d-flex justify-content-between">
                        <span>Credits</span>
                        <span class="fw-semibold">1,000</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tokens / day</span>
                        <span class="fw-semibold">50K</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Requests / day</span>
                        <span class="fw-semibold">2K</span>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Overage: $0.25 / 1K tokens</small>
                    <button class="btn btn-outline-primary btn-sm">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100 border border-2 border-info">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="fw-bold">Growth</h4>
                        <p class="text-muted">For scaling teams</p>
                    </div>
                    <span class="badge bg-info">Popular</span>
                </div>
                <div class="display-6 fw-bold">$49<span class="fs-6 text-muted">/mo</span></div>
                <div class="mt-3">
                    <div class="d-flex justify-content-between">
                        <span>Credits</span>
                        <span class="fw-semibold">10,000</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tokens / day</span>
                        <span class="fw-semibold">250K</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Requests / day</span>
                        <span class="fw-semibold">10K</span>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Overage: $0.18 / 1K tokens</small>
                    <button class="btn btn-outline-info btn-sm">Edit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="fw-bold">Enterprise</h4>
                        <p class="text-muted">Custom SLAs & governance</p>
                    </div>
                    <span class="badge bg-secondary">Custom</span>
                </div>
                <div class="display-6 fw-bold">Custom</div>
                <div class="mt-3">
                    <div class="d-flex justify-content-between">
                        <span>Credits</span>
                        <span class="fw-semibold">Unlimited</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Tokens / day</span>
                        <span class="fw-semibold">Unlimited</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Requests / day</span>
                        <span class="fw-semibold">Unlimited</span>
                    </div>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">Overage: Negotiated</small>
                    <button class="btn btn-outline-secondary btn-sm">Edit</button>
                </div>
            </div>
        </div>
    </div>
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
