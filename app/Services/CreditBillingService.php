<?php
namespace App\Services;
use App\Models\User;
use App\Models\CreditTransaction;
use App\Models\AiUsageLog;
class CreditBillingService {
    public function estimateTokens($text) { return ceil(mb_strlen($text) / 4); }
    public function deductCredits(User $user, $tokens, $modelMultiplier, $planMultiplier) {
        $cost = ceil(($tokens / 1000) * $modelMultiplier * $planMultiplier);
        if ($user->activeSubscription && $user->activeSubscription->credits_remaining >= $cost) {
            $user->activeSubscription->decrement("credits_remaining", $cost);
            CreditTransaction::create([
                "user_id" => $user->id,
                "type" => "deduct",
                "amount" => $cost,
                "reason" => "AI Usage",
            ]);
            return $cost;
        }
        return false;
    }
}