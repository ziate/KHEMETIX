<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class GroqClientService {
    protected $apiKey;
    protected $baseUrl;
    public function __construct() {
        $this->apiKey = config("groq.api_key");
        $this->baseUrl = config("groq.base_url", "https://api.groq.com/openai/v1");
    }
    public function chat($model, $messages, $options = []) {
        $start = microtime(true);
        try {
            $response = Http::withToken($this->apiKey)
                ->timeout(60)
                ->post($this->baseUrl . "/chat/completions", array_merge([
                    "model" => $model,
                    "messages" => $messages,
                ], $options));
            $latency = (int)((microtime(true) - $start) * 1000);
            if ($response->successful()) {
                return ["success" => true, "data" => $response->json(), "latency" => $latency];
            }
            return ["success" => false, "error" => $response->body(), "latency" => $latency];
        } catch (\Exception $e) {
            return ["success" => false, "error" => $e->getMessage(), "latency" => (int)((microtime(true) - $start) * 1000)];
        }
    }
}