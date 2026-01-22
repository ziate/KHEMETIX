<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model {
    protected $fillable = ["user_id", "name", "slug", "description", "wp_version_target", "php_version_target", "plugin_namespace", "default_system_prompt"];
    public function user() { return $this->belongsTo(User::class); }
    public function conversations() { return $this->hasMany(Conversation::class); }
}