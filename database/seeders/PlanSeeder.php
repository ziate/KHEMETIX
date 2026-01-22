<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Plan;
class PlanSeeder extends Seeder {
    public function run(): void {
        $plans = [
            ["name" => "Starter", "billing_cycle" => "monthly", "price" => 10.00, "included_credits" => 1000, "model_multipliers" => ["llama-3.1-8b-instant" => 1.0, "llama-3.3-70b-versatile" => 2.0]],
            ["name" => "Pro", "billing_cycle" => "monthly", "price" => 29.00, "included_credits" => 5000, "model_multipliers" => ["llama-3.1-8b-instant" => 1.0, "llama-3.3-70b-versatile" => 1.5]],
        ];
        foreach ($plans as $plan) Plan::create($plan);
    }
}