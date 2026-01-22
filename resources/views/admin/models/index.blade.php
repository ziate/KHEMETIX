@extends("layouts.admin")
@section("title", "Groq Models")
@section("header", "Groq Models")
@section("content")
<div class="row g-4 mb-4">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="mb-2">Catalog Status</h5>
                <p class="text-muted mb-1">Source: Groq documentation (manual).</p>
                <span class="badge bg-info">Models: {{ $models->count() }}</span>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="mb-2">Groq API</h5>
                @if($apiStatus)
                    <p class="text-success mb-1">Connected</p>
                    @if($apiLatency)
                        <small class="text-muted">Latency: {{ $apiLatency }} ms</small>
                    @endif
                @else
                    <p class="text-warning mb-1">Unavailable</p>
                    @if($apiError)
                        <small class="text-muted">{{ $apiError }}</small>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="mb-2">Legend</h5>
                <div class="d-flex flex-wrap gap-2">
                    <span class="badge bg-primary">Production</span>
                    <span class="badge bg-warning text-dark">Preview</span>
                    <span class="badge bg-secondary">System</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Pricing</th>
                        <th>Context</th>
                        <th>Limits</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($models as $model)
                        <tr>
                            <td>
                                <div class="fw-semibold">{{ $model['name'] ?? $model['model_id'] }}</div>
                                <div class="text-muted small">{{ $model['model_id'] }}</div>
                            </td>
                            <td>
                                @php($type = ucfirst($model['type'] ?? 'production'))
                                <span class="badge bg-{{ $type === 'Production' ? 'primary' : ($type === 'Preview' ? 'warning text-dark' : 'secondary') }}">
                                    {{ $type }}
                                </span>
                            </td>
                            <td>
                                @if(($model['pricing_unit'] ?? '') === 'per_hour')
                                    <div class="small">{{ $model['pricing_note'] ?? '-' }}</div>
                                @elseif(($model['pricing_unit'] ?? '') === 'per_1m_characters')
                                    <div class="small">{{ $model['pricing_note'] ?? '-' }}</div>
                                @else
                                    <div class="small">${{ number_format($model['input_price_per_1m'] ?? 0, 2) }} input</div>
                                    <div class="small text-muted">${{ number_format($model['output_price_per_1m'] ?? 0, 2) }} output</div>
                                @endif
                            </td>
                            <td>
                                <div class="small">{{ number_format($model['context_window'] ?? 0) }} tokens</div>
                                <div class="small text-muted">Max completion: {{ number_format($model['max_completion'] ?? 0) }}</div>
                            </td>
                            <td>
                                <div class="small">{{ $model['rate_limits'] ?? '-' }}</div>
                                <div class="small text-muted">Speed: {{ $model['speed_tps'] ?? '-' }} tps</div>
                            </td>
                            <td>
                                @if($model['is_available'])
                                    <span class="badge bg-success">Available</span>
                                @else
                                    <span class="badge bg-outline-secondary">Catalog only</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No models found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
