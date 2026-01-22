@extends('layouts.admin')

@section('title', __('messages.dashboard'))
@section('header', __('messages.dashboard'))

@section('content')

<style>
    /* Dashboard Specific High-Tech Styles */
    .stat-card {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        border-color: var(--ai-primary) !important;
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.1);
    }
    .stat-icon {
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        position: relative;
        z-index: 2;
    }
    .stat-glow {
        position: absolute;
        top: -20px;
        right: -20px;
        width: 100px;
        height: 100px;
        filter: blur(40px);
        opacity: 0.15;
        z-index: 1;
    }
    .pulse-online {
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: #22c55e;
        border-radius: 50%;
        margin-right: 8px;
        box-shadow: 0 0 0 rgba(34, 197, 94, 0.4);
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
        70% { transform: scale(1); box-shadow: 0 0 0 10px rgba(34, 197, 94, 0); }
        100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
    }
    .table thead th {
        background: rgba(255,255,255,0.03);
        border-bottom: 1px solid var(--ai-border);
        color: #94a3b8;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 1px;
        padding: 15px;
    }
    .table tbody td {
        padding: 15px;
        color: #cbd5e1;
        border-bottom: 1px solid rgba(255,255,255,0.02);
    }
</style>

{{-- Stats Cards --}}
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card stat-card shadow-lg h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small fw-bold mb-1">@lang('messages.total_users')</p>
                    <h2 class="mb-0 fw-bold" style="font-family: 'Orbitron';">150</h2>
                </div>
                <div class="stat-icon bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">
                    <i class="bi bi-people-fill fs-4"></i>
                    <div class="stat-glow bg-primary"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card shadow-lg h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small fw-bold mb-1">@lang('messages.active_subscriptions')</p>
                    <h2 class="mb-0 fw-bold" style="font-family: 'Orbitron';">45</h2>
                </div>
                <div class="stat-icon bg-success bg-opacity-10 text-success border border-success border-opacity-25">
                    <i class="bi bi-shield-check fs-4"></i>
                    <div class="stat-glow bg-success"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card shadow-lg h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small fw-bold mb-1">@lang('messages.total_credits')</p>
                    <h2 class="mb-0 fw-bold" style="font-family: 'Orbitron';">1.2M</h2>
                </div>
                <div class="stat-icon bg-info bg-opacity-10 text-info border border-info border-opacity-25">
                    <i class="bi bi-lightning-charge-fill fs-4"></i>
                    <div class="stat-glow bg-info"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card stat-card shadow-lg h-100">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <p class="text-muted small fw-bold mb-1">@lang('messages.ai_requests')</p>
                    <h2 class="mb-0 fw-bold" style="font-family: 'Orbitron';">8.4K</h2>
                </div>
                <div class="stat-icon bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">
                    <i class="bi bi-cpu-fill fs-4"></i>
                    <div class="stat-glow bg-warning"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Main Content --}}
<div class="row g-4">

    {{-- Recent Subscriptions --}}
    <div class="col-lg-8">
        <div class="card shadow-lg border-0 h-100 overflow-hidden">
            <div class="card-header bg-transparent py-3 border-bottom border-white border-opacity-10">
                <div class="d-flex align-items-center">
                    <i class="bi bi-clock-history text-primary me-2"></i>
                    <span class="fw-bold">@lang('messages.recent_subscriptions')</span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle border-0">
                        <thead>
                            <tr>
                                <th>@lang('messages.user')</th>
                                <th>@lang('messages.plan')</th>
                                <th>@lang('messages.status')</th>
                                <th>@lang('messages.date')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 bg-secondary bg-opacity-10 rounded me-2">
                                            <i class="bi bi-person text-white-50"></i>
                                        </div>
                                        Ahmed Ali
                                    </div>
                                </td>
                                <td><span class="text-primary fw-bold">PRO_MODEL</span></td>
                                <td><span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 rounded-pill px-3">@lang('messages.active')</span></td>
                                <td class="small text-muted">2026-01-22</td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 bg-secondary bg-opacity-10 rounded me-2">
                                            <i class="bi bi-person text-white-50"></i>
                                        </div>
                                        John Doe
                                    </div>
                                </td>
                                <td><span class="text-info fw-bold">STARTER</span></td>
                                <td><span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25 rounded-pill px-3">@lang('messages.pending')</span></td>
                                <td class="small text-muted">2026-01-21</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- System Status --}}
    <div class="col-lg-4">
        <div class="card shadow-lg border-0 h-100">
            <div class="card-header bg-transparent py-3 border-bottom border-white border-opacity-10 text-white fw-bold">
                <i class="bi bi-activity text-danger me-2"></i>
                @lang('messages.system_status')
            </div>
            <div class="card-body">
                <div class="list-group list-group-flush bg-transparent">
                    <div class="list-group-item bg-transparent px-0 border-white border-opacity-10 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-terminal me-2 text-primary"></i>
                            Groq Neural Engine
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2">
                            <span class="pulse-online"></span> @lang('messages.online')
                        </span>
                    </div>
                    <div class="list-group-item bg-transparent px-0 border-white border-opacity-10 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-database me-2 text-primary"></i>
                            @lang('messages.database')
                        </div>
                        <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25 px-2">@lang('messages.healthy')</span>
                    </div>
                    <div class="list-group-item bg-transparent px-0 border-0 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-hdd-network me-2 text-primary"></i>
                            @lang('messages.storage')
                        </div>
                        <div class="w-50">
                            <div class="progress" style="height: 6px; background: rgba(255,255,255,0.05);">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <small class="text-muted d-block text-end mt-1" style="font-size: 10px;">85% Capacity</small>
                        </div>
                    </div>
                </div>

                <div class="mt-4 p-3 rounded-3 bg-primary bg-opacity-5 border border-primary border-opacity-10">
                    <div class="d-flex align-items-center gap-2 mb-2 text-primary">
                        <i class="bi bi-info-circle-fill"></i>
                        <small class="fw-bold">AI_LOGS_STREAM</small>
                    </div>
                    <code class="small text-muted" style="font-size: 10px;">
                        > Processing nodes: 12 active<br>
                        > Latency: 42ms<br>
                        > SSL Encryption: Active
                    </code>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection