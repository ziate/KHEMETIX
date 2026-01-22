<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Subscription extends Model {
    protected $fillable = ["user_id", "plan_id", "status", "start_date", "end_date", "renew_at", "credits_granted", "credits_remaining"];
    protected $casts = ["start_date" => "datetime", "end_date" => "datetime", "renew_at" => "datetime"];
    public function user() { return $this->belongsTo(User::class); }
    public function plan() { return $this->belongsTo(Plan::class); }
}