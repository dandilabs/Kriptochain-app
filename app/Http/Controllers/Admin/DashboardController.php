<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\InvoiceMembership;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPosts = Post::count();
        $newUsers = User::where('created_at', '>=', now()->subDays(30))->count();

        // Total revenue dari pembayaran membership yang statusnya 'paid'
        $totalRevenue = InvoiceMembership::where('status', 'paid')->sum('amount');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPosts',
            'newUsers',
            'totalRevenue'
        ));
    }
}
