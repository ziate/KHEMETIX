<?php
namespace App\Services;
class ModelRouterService {
    public function route($type) {
        switch ($type) {
            case "complex_coding": return "llama-3.3-70b-versatile";
            case "fast_cheap": return "llama-3.1-8b-instant";
            case "safety": return "meta-llama/llama-guard-4-12b";
            default: return "llama-3.1-8b-instant";
        }
    }
}