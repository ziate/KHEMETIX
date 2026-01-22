<?php
namespace App\Services;
use App\Models\Plan;
use App\Models\Subscription;
class PlanService {
    public function subscribe($user, $planId) {
        $plan = Plan::find($planId);
        return Subscription::create([
            "user_id" => $user->id,
            "plan_id" => $plan->id,
            "status" => "pending_payment",
            "credits_granted" => $plan->included_credits,
            "credits_remaining" => $plan->included_credits,
        ]);
    }
}