@extends("layouts.admin")
@section("title", __("messages.settings"))
@section("header", __("messages.settings") . " (AI & Platform)")
@section("content")
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Environment</h6>
                <h4 class="fw-bold mb-0">Production</h4>
                <small class="text-muted">APP_ENV</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Default Locale</h6>
                <h4 class="fw-bold mb-0">Arabic (AR)</h4>
                <small class="text-muted">APP_LOCALE</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">Active Plan</h6>
                <h4 class="fw-bold mb-0">Enterprise</h4>
                <small class="text-muted">Billing</small>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 class="text-uppercase text-muted">AI Usage</h6>
                <h4 class="fw-bold mb-0">78%</h4>
                <small class="text-muted">Monthly quota</small>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="fw-semibold mb-3">Quick Actions</h5>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-info">Sync Groq Models</button>
                    <button class="btn btn-outline-warning">Rotate API Keys</button>
                    <button class="btn btn-outline-secondary">Export Settings</button>
                </div>
                <hr class="border-secondary-subtle">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="maintenanceMode">
                    <label class="form-check-label" for="maintenanceMode">Maintenance Mode</label>
                </div>
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="debugMode">
                    <label class="form-check-label" for="debugMode">Debug Mode</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="aiGuardrails" checked>
                    <label class="form-check-label" for="aiGuardrails">AI Safety Guardrails</label>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="settingsTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="general-tab" data-bs-toggle="pill" data-bs-target="#general" type="button" role="tab">General</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="ai-tab" data-bs-toggle="pill" data-bs-target="#ai" type="button" role="tab">AI Defaults</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="security-tab" data-bs-toggle="pill" data-bs-target="#security" type="button" role="tab">Security</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="integrations-tab" data-bs-toggle="pill" data-bs-target="#integrations" type="button" role="tab">Integrations</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">App Name</label>
                                <input type="text" class="form-control" value="Khemetix">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Public URL</label>
                                <input type="url" class="form-control" placeholder="https://ai.hooksource.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Default Locale</label>
                                <select class="form-select">
                                    <option>Arabic (ar)</option>
                                    <option>English (en)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Timezone</label>
                                <select class="form-select">
                                    <option>Asia/Riyadh</option>
                                    <option>UTC</option>
                                    <option>Africa/Cairo</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Support Email</label>
                                <input type="email" class="form-control" placeholder="support@khemetix.ai">
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary">Save General Settings</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="ai" role="tabpanel" aria-labelledby="ai-tab">
                        <form class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Default Model</label>
                                <select class="form-select">
                                    <option>llama-3.3-70b-versatile</option>
                                    <option>llama-3.1-8b-instant</option>
                                    <option>openai/gpt-oss-120b</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Temperature</label>
                                <input type="number" step="0.1" class="form-control" value="0.7">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Max Tokens</label>
                                <input type="number" class="form-control" value="4096">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">System Prompt</label>
                                <textarea class="form-control" rows="3" placeholder="Define base assistant behavior..."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Safety Level</label>
                                <select class="form-select">
                                    <option>High</option>
                                    <option>Medium</option>
                                    <option>Low</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="streaming">
                                        <label class="form-check-label" for="streaming">Enable Streaming</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="tooling" checked>
                                        <label class="form-check-label" for="tooling">Enable Tooling</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="logPrompts">
                                        <label class="form-check-label" for="logPrompts">Log Prompts</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary">Update AI Defaults</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Session Lifetime (mins)</label>
                                <input type="number" class="form-control" value="120">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password Policy</label>
                                <select class="form-select">
                                    <option>Strong (12+ chars)</option>
                                    <option>Standard (8+ chars)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">MFA Provider</label>
                                <select class="form-select">
                                    <option>Authenticator App</option>
                                    <option>SMS</option>
                                    <option>Email OTP</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Login Alert Email</label>
                                <input type="email" class="form-control" placeholder="security@khemetix.ai">
                            </div>
                            <div class="col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="ipAllowlist">
                                    <label class="form-check-label" for="ipAllowlist">Enable IP Allowlist</label>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary">Save Security Settings</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="integrations" role="tabpanel" aria-labelledby="integrations-tab">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Groq API Key</label>
                                <input type="password" class="form-control" value="************************">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Groq Base URL</label>
                                <input type="url" class="form-control" value="https://api.groq.com/openai/v1">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Webhook URL</label>
                                <input type="url" class="form-control" placeholder="https://hooks.khemetix.ai/events">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Slack Channel</label>
                                <input type="text" class="form-control" placeholder="#ai-alerts">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Allowed Origins</label>
                                <textarea class="form-control" rows="2" placeholder="https://ai.hooksource.com"></textarea>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button class="btn btn-primary">Update Integrations</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <h5 class="fw-semibold mb-3">Advanced Limits & Quotas</h5>
        <div class="row g-3">
            <div class="col-lg-4">
                <label class="form-label">Daily Requests Limit</label>
                <input type="number" class="form-control" value="25000">
            </div>
            <div class="col-lg-4">
                <label class="form-label">Daily Tokens Limit</label>
                <input type="number" class="form-control" value="5000000">
            </div>
            <div class="col-lg-4">
                <label class="form-label">Overage Price (per 1K tokens)</label>
                <input type="number" step="0.01" class="form-control" value="0.15">
            </div>
        </div>
        <div class="d-flex justify-content-end mt-3">
            <button class="btn btn-primary">Save Limits</button>
        </div>
    </div>
</div>
@endsection
