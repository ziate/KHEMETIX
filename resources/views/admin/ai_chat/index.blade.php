@extends('layouts.admin')

@section('title', __('messages.ai_chat'))
@section('header', __('messages.ai_chat'))

@section('content')
    <style>
        .ai-chat-shell {
            background: radial-gradient(circle at top, rgba(99, 102, 241, 0.15), transparent 60%);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
            border-radius: 24px;
            overflow: hidden;
        }
        .ai-chat-sidebar {
            background: rgba(15, 23, 42, 0.65);
            border-right: 1px solid rgba(148, 163, 184, 0.15);
        }
        .ai-chat-header {
            background: linear-gradient(120deg, rgba(99, 102, 241, 0.25), rgba(14, 165, 233, 0.2));
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
        }
        .ai-chat-area {
            min-height: 520px;
            background: rgba(2, 6, 23, 0.6);
        }
        .ai-message {
            border-radius: 18px;
            padding: 14px 18px;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .ai-message.ai-user {
            background: rgba(99, 102, 241, 0.2);
            border: 1px solid rgba(99, 102, 241, 0.35);
            color: #e2e8f0;
        }
        .ai-message.ai-assistant {
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(148, 163, 184, 0.2);
            color: #cbd5f5;
        }
        .ai-badge {
            background: rgba(148, 163, 184, 0.15);
            color: #e2e8f0;
            border-radius: 999px;
            font-size: 0.75rem;
            padding: 6px 12px;
            border: 1px solid rgba(148, 163, 184, 0.2);
        }
        .ai-input {
            background: rgba(15, 23, 42, 0.9);
            border: 1px solid rgba(148, 163, 184, 0.3);
            color: #e2e8f0;
        }
        .ai-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(99, 102, 241, 0.25);
            border-color: rgba(99, 102, 241, 0.6);
        }
        .ai-action {
            border-radius: 12px;
        }
        .ai-module-card {
            border-radius: 16px;
            border: 1px solid rgba(148, 163, 184, 0.15);
            background: rgba(15, 23, 42, 0.6);
        }
    </style>

    <div class="ai-chat-shell" data-send-url="{{ route('admin.ai-chat.send') }}">
        <div class="row g-0">
            <div class="col-lg-3 ai-chat-sidebar p-4">
                <div class="d-flex align-items-center gap-2 mb-4">
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25">
                        <i class="bi bi-stars fs-4"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-white">@lang('messages.ai_chat') </div>
                        <small class="text-muted">@lang('messages.ai_chat_subtitle')</small>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-uppercase text-muted small mb-2 d-block">@lang('messages.project_profile')</label>
                    <div class="ai-module-card p-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="ai-badge">KHEMETIX</span>
                            <span class="text-success small">@lang('messages.connected')</span>
                        </div>
                        <p class="text-muted small mb-0">@lang('messages.ai_chat_description')</p>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="text-uppercase text-muted small mb-2 d-block">@lang('messages.groq_models')</label>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="ai-badge">Llama 3.3 70B</span>
                        <span class="ai-badge">GPT OSS 120B</span>
                        <span class="ai-badge">Groq Compound</span>
                        <span class="ai-badge">Qwen3-32B</span>
                    </div>
                </div>

                <div>
                    <label class="text-uppercase text-muted small mb-2 d-block">@lang('messages.catalog_status')</label>
                    <div class="ai-module-card p-3">
                        <div class="d-flex justify-content-between mb-2 text-muted small">
                            <span>@lang('messages.latency')</span>
                            <span>168 ms</span>
                        </div>
                        <div class="progress" style="height: 6px; background: rgba(148, 163, 184, 0.15);">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 82%"></div>
                        </div>
                        <small class="text-muted d-block mt-2">{{ count($models) }} @lang('messages.models')</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="ai-chat-header p-4">
                    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <h5 class="mb-1 text-white">@lang('messages.ai_chat_title')</h5>
                            <small class="text-muted">@lang('messages.ai_chat_hint')</small>
                        </div>
                        <div class="d-flex gap-2 align-items-center">
                            <select id="ai-chat-model" class="form-select form-select-sm text-bg-dark border border-white border-opacity-10">
                                @foreach($models as $modelId => $model)
                                    <option value="{{ $modelId }}" @selected($selectedModel === $modelId)>
                                        {{ $model['name'] ?? $modelId }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-light btn-sm ai-action">
                                <i class="bi bi-cloud-arrow-down me-1"></i>
                                @lang('messages.generate_zip')
                            </button>
                            <button class="btn btn-primary btn-sm ai-action">
                                <i class="bi bi-cpu-fill me-1"></i>
                                @lang('messages.deploy_now')
                            </button>
                        </div>
                    </div>
                </div>

                <div id="ai-chat-messages" class="ai-chat-area p-4 d-flex flex-column gap-4">
                    @forelse($messages as $message)
                        @if($message->role === 'assistant')
                            <div class="ai-message ai-assistant">
                                <div class="d-flex align-items-center gap-2 mb-2 text-primary">
                                    <i class="bi bi-robot"></i>
                                    <small class="fw-bold">@lang('messages.ai_assistant')</small>
                                </div>
                                <p class="mb-0">{{ $message->content }}</p>
                            </div>
                        @elseif($message->role === 'user')
                            <div class="ai-message ai-user align-self-end">
                                <div class="d-flex align-items-center gap-2 mb-2 text-info justify-content-end">
                                    <small class="fw-bold">@lang('messages.you')</small>
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <p class="mb-0">{{ $message->content }}</p>
                            </div>
                        @endif
                    @empty
                        <div class="ai-message ai-assistant">
                            <div class="d-flex align-items-center gap-2 mb-2 text-primary">
                                <i class="bi bi-robot"></i>
                                <small class="fw-bold">@lang('messages.ai_assistant')</small>
                            </div>
                            <p class="mb-0">@lang('messages.ai_chat_welcome')</p>
                        </div>
                    @endforelse
                </div>

                <div class="p-4 border-top border-white border-opacity-10">
                    <form id="ai-chat-form" class="input-group">
                        @csrf
                        <span class="input-group-text bg-transparent border border-end-0 border-white border-opacity-10">
                            <i class="bi bi-lightning-charge-fill text-info"></i>
                        </span>
                        <textarea id="ai-chat-input" class="form-control ai-input border-start-0"
                            rows="2" placeholder="@lang('messages.ai_chat_placeholder')"></textarea>
                        <button id="ai-chat-send" class="btn btn-primary ai-action px-4" type="submit">
                            <i class="bi bi-send-fill me-1"></i>
                            @lang('messages.send')
                        </button>
                    </form>
                    <small class="text-muted d-block mt-2">@lang('messages.ai_chat_footer')</small>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        (function () {
            const shell = document.querySelector('.ai-chat-shell');
            const form = document.getElementById('ai-chat-form');
            const input = document.getElementById('ai-chat-input');
            const messages = document.getElementById('ai-chat-messages');
            const sendButton = document.getElementById('ai-chat-send');
            const modelSelect = document.getElementById('ai-chat-model');
            const token = form.querySelector('input[name="_token"]').value;

            const appendMessage = (role, content) => {
                const wrapper = document.createElement('div');
                wrapper.className = role === 'assistant'
                    ? 'ai-message ai-assistant'
                    : 'ai-message ai-user align-self-end';

                const header = document.createElement('div');
                header.className = role === 'assistant'
                    ? 'd-flex align-items-center gap-2 mb-2 text-primary'
                    : 'd-flex align-items-center gap-2 mb-2 text-info justify-content-end';

                header.innerHTML = role === 'assistant'
                    ? '<i class="bi bi-robot"></i><small class="fw-bold">{{ __('messages.ai_assistant') }}</small>'
                    : '<small class="fw-bold">{{ __('messages.you') }}</small><i class="bi bi-person-circle"></i>';

                const body = document.createElement('p');
                body.className = 'mb-0';
                body.textContent = content;

                wrapper.appendChild(header);
                wrapper.appendChild(body);
                messages.appendChild(wrapper);
                messages.scrollTop = messages.scrollHeight;
            };

            form.addEventListener('submit', async (event) => {
                event.preventDefault();
                const message = input.value.trim();
                if (!message) {
                    return;
                }

                appendMessage('user', message);
                input.value = '';
                sendButton.disabled = true;
                sendButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>{{ __('messages.sending') }}';

                try {
                    const response = await fetch(shell.dataset.sendUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': token,
                        },
                        body: JSON.stringify({
                            message,
                            model: modelSelect.value,
                        }),
                    });

                    const data = await response.json();
                    if (!response.ok || !data.success) {
                        throw new Error(data.message || '{{ __('messages.ai_chat_error') }}');
                    }

                    appendMessage('assistant', data.message.content);
                } catch (error) {
                    appendMessage('assistant', `${error.message}`);
                } finally {
                    sendButton.disabled = false;
                    sendButton.innerHTML = '<i class="bi bi-send-fill me-1"></i>{{ __('messages.send') }}';
                }
            });
        })();
    </script>
@endsection
