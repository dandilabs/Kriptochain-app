<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Models\MembershipPlan;

class PricingController extends Controller
{
    public function __invoke()
    {
        $membershipPlans = MembershipPlan::with([
            'promos' => function ($query) {
                $query->where('is_active', true);
            },
        ])->get();

        foreach ($membershipPlans as $plan) {
            $plan->duration = $plan->period_month ? $plan->period_month . ' Bulan' : 'Lifetime';
            $plan->is_popular = $plan->badge === 'BEST VALUE';
            $plan->original_price = $plan->price;

            if ($plan->promos->isNotEmpty()) {
                $promo = $plan->promos->first();
                $plan->promo_type = $promo->discount_type;
                $plan->promo_value = $promo->discount_value;
                if ($promo->discount_type === 'nominal') {
                    $plan->discounted_price = max(0, $plan->price - $promo->discount_value);
                } else {
                    $plan->discounted_price = max(0, $plan->price * (1 - $promo->discount_value / 100));
                }
            } else {
                $plan->discounted_price = $plan->price;
                $plan->promo_type = null;
                $plan->promo_value = null;
            }
        }

        $activeGlobalPromos = Promo::where('is_active', true)->where('start_at', '<=', now())->where('end_at', '>=', now())->get();
        //cek membership aktif user yang sedang login
        $activeMembership = null;
        if (auth()->check()) {
            $activeMembership = \App\Models\InvoiceMembership::where('user_id', auth()->id())
                ->where('status', 'paid')
                ->where(function ($q) {
                    $q->whereNull('expired_at')->orWhere('expired_at', '>', now());
                })
                ->with('membershipPlan')
                ->latest('expired_at')
                ->first();
        }

        return view('home', compact('membershipPlans', 'activeGlobalPromos','activeMembership'));
    }

    private function getBestPromo($plan)
    {
        return $plan->promos
            ->sortByDesc(function ($promo) use ($plan) {
                return $this->calculateDiscountAmount($plan->original_price, $promo);
            })
            ->first();
    }

    private function applyPromo($price, $promo)
    {
        if ($promo->discount_type === 'percentage') {
            return $price * (1 - $promo->discount_value / 100);
        }
        return max(0, $price - $promo->discount_value);
    }

    private function calculateDiscountAmount($price, $promo)
    {
        if ($promo->discount_type === 'percentage') {
            return $price * ($promo->discount_value / 100);
        }
        return $promo->discount_value;
    }

    public function tentang()
    {
        return view('tentang');
    }
}
