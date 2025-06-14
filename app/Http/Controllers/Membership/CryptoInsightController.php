<?php

namespace App\Http\Controllers\Membership;

use Illuminate\Http\Request;
use App\Models\CryptoInsight;
use App\Http\Controllers\Controller;

class CryptoInsightController extends Controller
{
    public function index()
    {
        $insights = CryptoInsight::latestFirst()->get();
        return view('membership.crypto-insights.index', compact('insights'));
    }
}
