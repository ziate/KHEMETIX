<?php

namespace App\Services;

class GroqModelCatalogService
{
    public function models(): array
    {
        return config('groq_models.models', []);
    }

    public function get(string $modelId): array
    {
        return $this->models()[$modelId] ?? [];
    }
}
