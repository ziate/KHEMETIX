<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\AiModel;
class AiModelSeeder extends Seeder {
    public function run(): void {
        $models = [
            ["model_id" => "llama-3.1-8b-instant", "name" => "Llama 3.1 8B", "type" => "production", "context_window" => 128000, "max_completion" => 4096, "input_price_per_1m" => 0.05, "output_price_per_1m" => 0.10],
            ["model_id" => "llama-3.3-70b-versatile", "name" => "Llama 3.3 70B", "type" => "production", "context_window" => 128000, "max_completion" => 4096, "input_price_per_1m" => 0.59, "output_price_per_1m" => 0.79],
        ];
        foreach ($models as $model) AiModel::create($model);
    }
}