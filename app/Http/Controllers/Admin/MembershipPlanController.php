<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Models\MembershipPlan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMembershipPlanRequest;

class MembershipPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = MembershipPlan::with('promos')->latest()->paginate(10);
        return view('admin.membership_plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $promos = Promo::all();
        return view('admin.membership_plans.create', compact('promos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'period_month' => 'nullable|integer|min:1',
            'features' => 'required|string',
            'highlight' => 'nullable|string',
            'badge' => 'nullable|string',
            'promos' => 'nullable|array',
        ]);

        $plan = MembershipPlan::create($validated);
        if ($request->has('promos')) {
            $plan->promos()->sync($request->promos);
        }

        return redirect()->route('admin.membership-plans.index')->with('success', 'Membership plan created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MembershipPlan $membership_plan)
    {
        $promos = Promo::all();
        return view('admin.membership_plans.edit', [
            'membershipPlan' => $membership_plan,
            'promos' => $promos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MembershipPlan $membership_plan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'period_month' => 'nullable|integer|min:1',
            'features' => 'required|string',
            'highlight' => 'nullable|string',
            'badge' => 'nullable|string',
            'promos' => 'nullable|array',
        ]);

        $membership_plan->update($validated);
        $membership_plan->promos()->sync($request->promos ?? []);

        return redirect()->route('admin.membership-plans.index')->with('success', 'Membership plan updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembershipPlan $membership_plan)
    {
        $membership_plan->promos()->detach();
        $membership_plan->delete();
        return redirect()->route('admin.membership_plans.index')->with('success', 'Plan deleted!');
    }
}
