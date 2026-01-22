<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
class ModelController extends Controller {
    public function index() { return view("admin.models.index"); }
}