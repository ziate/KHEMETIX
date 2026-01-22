<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable {
    use HasApiTokens, Notifiable;
    protected $fillable = ["name", "email", "password", "locale", "role"];
    protected $hidden = ["password", "remember_token"];
    protected $casts = ["email_verified_at" => "datetime", "password" => "hashed"];
    public function isAdmin() { return $this->role === "admin"; }
    public function subscriptions() { return $this->hasMany(Subscription::class); }
    public function activeSubscription() { return $this->hasOne(Subscription::class)->where("status", "active"); }
    public function projects() { return $this->hasMany(Project::class); }
    public function conversations() { return $this->hasMany(Conversation::class); }
    public function creditTransactions() { return $this->hasMany(CreditTransaction::class); }
}