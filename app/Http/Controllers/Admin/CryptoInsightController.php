<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\CryptoInsight;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CryptoInsightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insights = CryptoInsight::latestFirst()->get();
        return view('admin.crypto-insights.index', compact('insights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crypto-insights.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'file' => 'required|file|mimes:pdf|max:20480',
        ]);

        $filePath = $request->file('file')->store('crypto-insights', 'public');

        CryptoInsight::create([
            'title' => $request->title,
            'date' => $request->date,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.crypto-insights.index')
            ->with('success', 'Crypto Insight berhasil ditambahkan');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CryptoInsight $cryptoInsight)
    {
        Storage::disk('public')->delete($cryptoInsight->file_path);
        $cryptoInsight->delete();

        return back()->with('success', 'Crypto Insight berhasil dihapus');
    }
}
