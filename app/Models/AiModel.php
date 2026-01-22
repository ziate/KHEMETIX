<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class AiModel extends Model {
    protected $fillable = ["model_id", "name", "type", "context_window", "max_completion", "input_price_per_1m", "output_price_per_1m", "is_active"];
}