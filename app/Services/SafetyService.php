<?php
namespace App\Services;
class SafetyService {
    protected $groq;
    public function __construct(GroqClientService $groq) { $this->groq = $groq; }
    public function check($content) {
        // Simple implementation for now, in real case would call llama-guard
        return ["safe" => true];
    }
}