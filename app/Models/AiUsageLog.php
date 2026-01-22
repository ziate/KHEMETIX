<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AiUsageLog extends Model {
    protected $fillable = ["user_id", "model_id", "conversation_id", "request_id", "prompt_tokens_est", "completion_tokens_est", "total_tokens_est", "credits_charged", "latency_ms", "status", "error_message"];
    public function user() { return $this->belongsTo(User::class); }
}