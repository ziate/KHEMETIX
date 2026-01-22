<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PluginSpec extends Model {
    protected $fillable = ["project_id", "features"];
    protected $casts = ["features" => "json"];
    public function project() { return $this->belongsTo(Project::class); }
}