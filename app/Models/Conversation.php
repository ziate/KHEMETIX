<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Conversation extends Model {
    protected $fillable = ["user_id", "project_id", "title"];
    public function user() { return $this->belongsTo(User::class); }
    public function project() { return $this->belongsTo(Project::class); }
    public function messages() { return $this->hasMany(Message::class); }
    public function artifacts() { return $this->hasMany(GeneratedArtifact::class); }
}