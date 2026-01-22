<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::query()
            ->orderBy('price')
            ->get();

        $planCount = $plans->count();
        $subscriberCount = Subscription::count();
        $monthlyMrr = Subscription::with('plan')
            ->get()
            ->sum(fn ($subscription) => $subscription->plan->price ?? 0);
        $overageRevenue = $plans->sum('overage_price_per_1k_tokens');

        return view('admin.plans.index', [
            'plans' => $plans,
            'planCount' => $planCount,
            'subscriberCount' => $subscriberCount,
            'monthlyMrr' => $monthlyMrr,
            'overageRevenue' => $overageRevenue,
        ]);
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validatePlan($request);

        Plan::create($validated);

        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Plan created successfully.');
    }

    public function edit(Plan $plan)
    {
        return view('admin.plans.edit', ['plan' => $plan]);
    }

    public function update(Request $request, Plan $plan)
    {
        $validated = $this->validatePlan($request);

        $plan->update($validated);

        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Plan updated successfully.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()
            ->route('admin.plans.index')
            ->with('success', 'Plan deleted successfully.');
    }

    private function validatePlan(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'billing_cycle' => ['required', 'string', 'max:50'],
            'price' => ['required', 'numeric', 'min:0'],
            'included_credits' => ['required', 'integer', 'min:0'],
            'overage_enabled' => ['nullable', 'boolean'],
            'overage_price_per_1k_tokens' => ['nullable', 'numeric', 'min:0'],
            'model_multipliers' => ['nullable', 'string'],
            'max_requests_per_day' => ['nullable', 'integer', 'min:0'],
            'max_tokens_per_day' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['overage_enabled'] = $request->boolean('overage_enabled');

        if (!empty($validated['model_multipliers'])) {
            $decoded = json_decode($validated['model_multipliers'], true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw ValidationException::withMessages([
                    'model_multipliers' => 'Model multipliers must be valid JSON.',
                ]);
            }
            $validated['model_multipliers'] = $decoded;
        } else {
            $validated['model_multipliers'] = [];
        }

        return $validated;
    }
}
