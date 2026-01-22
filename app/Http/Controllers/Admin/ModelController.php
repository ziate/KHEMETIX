<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\GroqClientService;
use App\Services\GroqModelCatalogService;

class ModelController extends Controller
{
    public function index(GroqClientService $groq, GroqModelCatalogService $catalog)
    {
        $catalogModels = $catalog->models();
        $apiResponse = $groq->listModels();
        $apiModels = collect($apiResponse['data']['data'] ?? [])
            ->pluck('id')
            ->flip()
            ->toArray();

        $models = collect($catalogModels)->map(function (array $data, string $modelId) use ($apiModels) {
            return array_merge([
                'model_id' => $modelId,
                'is_available' => array_key_exists($modelId, $apiModels),
            ], $data);
        })->values();

        return view('admin.models.index', [
            'models' => $models,
            'apiStatus' => $apiResponse['success'] ?? false,
            'apiLatency' => $apiResponse['latency'] ?? null,
            'apiError' => $apiResponse['error'] ?? null,
        ]);
    }
}
