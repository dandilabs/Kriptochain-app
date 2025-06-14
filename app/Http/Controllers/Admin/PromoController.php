<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Models\MembershipPlan;
use App\Http\Controllers\Controller;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promos = Promo::with('plans')->latest()->get();
        return view('admin.promos.index', compact('promos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $plans = MembershipPlan::all();
        return view('admin.promos.create', compact('plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percentage,nominal',
            'discount_value' => 'required|integer|min:1',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'is_active' => 'boolean',
            'plans' => 'nullable|array'
        ]);

        $promo = Promo::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'discount_type' => $validated['discount_type'],
            'discount_value' => $validated['discount_value'],
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'],
            'is_active' => $request->has('is_active'),
        ]);
        $promo->plans()->sync($validated['plans'] ?? []);
        return redirect()->route('admin.promos.index')->with('success', 'Promo created!');
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
    public function edit(Promo $promo)
    {
        $plans = MembershipPlan::all();
        return view('admin.promos.edit', compact('promo', 'plans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promo $promo)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'discount_type' => 'required|in:percentage,nominal',
            'discount_value' => 'required|integer|min:1',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'is_active' => 'boolean',
            'plans' => 'nullable|array'
        ]);
        $promo->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'discount_type' => $validated['discount_type'],
            'discount_value' => $validated['discount_value'],
            'start_at' => $validated['start_at'],
            'end_at' => $validated['end_at'],
            'is_active' => $request->has('is_active'),
        ]);
        $promo->plans()->sync($validated['plans'] ?? []);
        return redirect()->route('admin.promos.index')->with('success', 'Promo updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();
        return back()->with('success', 'Promo deleted!');
    }

    public function toggleStatus(Promo $promo)
    {
        $promo->update(['is_active' => !$promo->is_active]);
        return back()->with('success', 'Promo status updated');
    }
}
