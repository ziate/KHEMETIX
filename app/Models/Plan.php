<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Plan extends Model {
    protected $fillable = ["name", "billing_cycle", "price", "included_credits", "overage_enabled", "overage_price_per_1k_tokens", "model_multipliers", "max_requests_per_day", "max_tokens_per_day"];
    protected $casts = ["model_multipliers" => "json"];
}