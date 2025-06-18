<?php

use App\Http\Middleware\AdminOnly;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Membership\CpiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Membership\FredController;
use App\Http\Controllers\Membership\NewsController;
use App\Http\Controllers\Membership\WhaleController;
use App\Http\Controllers\MembershipPaymentController;
use App\Http\Controllers\Admin\MembershipPlanController;
use App\Http\Controllers\Membership\InflationController;
use App\Http\Controllers\Membership\MarketNewsController;
use App\Http\Controllers\Admin\InvoiceMembershipController;
use App\Http\Controllers\Membership\AlphaVantageController;

// Welcome Page
// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', PricingController::class)->name('membership.pricing');
Route::get('/tentang-kami', [PricingController::class,'tentang'])->name('tentang.index');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/tag/{slug}', [BlogController::class, 'tag'])->name('blog.tag');

// Dashboard Route (Redirect by Role)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'Admin') {
            return redirect('/admin/dashboard');
        }
        return view('dashboard');
    })->name('dashboard');

    Route::get('/membership/notifications', [\App\Http\Controllers\MembershipPaymentController::class, 'notifications'])->name('membership.notifications');
    Route::get('/membership/history', [\App\Http\Controllers\MembershipPaymentController::class, 'history'])->name('membership.history');
    Route::get('/inflation', [InflationController::class, 'index'])->name('inflation');
    Route::get('/economic/cpi', [CpiController::class, 'index'])->name('economic.cpi');
    Route::get('/whale-transactions', [WhaleController::class, 'index'])->name('whale.index');

    Route::get('/news/crypto-news', [NewsController::class, 'index'])->name('crypto.news');
    Route::get('/news/bitcoin', [NewsController::class, 'bitcoin']);
    Route::get('/crypto-macro', [FredController::class, 'dashboard'])->name('crypto.macro');
    Route::get('/news/blockchain-news', [MarketNewsController::class, 'index'])->name('blockchain.news');



    Route::get('/alpha-vantage', [AlphaVantageController::class, 'dashboard'])->name('alphavantage.dashboard');

    // API endpoints
    Route::get('/api/alpha-vantage/gdp', [AlphaVantageController::class, 'gdpApi']);
    Route::get('/api/alpha-vantage/stock/{symbol}', [AlphaVantageController::class, 'stockApi']);
    Route::get('/news-sentiment', [MarketNewsController::class, 'newsSentimentCrypto'])->name('alphavantage.news_sentiment_economy_macro');
    Route::get('/crypto-insights', [\App\Http\Controllers\Membership\CryptoInsightController::class, 'index'])->name('crypto.insights');
});

// Admin Routes (Dashboard & CRUD)
Route::middleware(['auth', AdminOnly::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        // Dashboard admin
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard');
        // })->name('dashboard');



        // CRUD Category
        Route::resource('category', CategoryController::class);

        // CRUD Tag
        Route::resource('tag', TagController::class);

        // Post routes
        Route::get('post/trashed', [PostController::class, 'trashed'])->name('post.trashed');
        Route::post('post/restore/{id}', [PostController::class, 'restore'])->name('post.restore');
        Route::delete('post/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
        Route::resource('post', PostController::class);

        // User management
        Route::resource('users', UserController::class);

        // Membership management
        Route::resource('membership-plans', \App\Http\Controllers\Admin\MembershipPlanController::class);
        Route::resource('promos', \App\Http\Controllers\Admin\PromoController::class);

        // Payment verification routes
        Route::resource('membership-plans', \App\Http\Controllers\Admin\MembershipPlanController::class)->except(['show']);

        Route::resource('promos', \App\Http\Controllers\Admin\PromoController::class)->except(['show']);

        Route::post('promos/{promo}/toggle-status', [\App\Http\Controllers\Admin\PromoController::class, 'toggleStatus'])->name('promos.toggle-status');

        Route::get('invoice-memberships', [App\Http\Controllers\Admin\InvoiceMembershipController::class, 'index'])->name('invoice-memberships.index');
        Route::post('invoice-memberships/{invoice}/verify', [App\Http\Controllers\Admin\InvoiceMembershipController::class, 'verify'])->name('invoice-memberships.verify');
        Route::post('invoice-memberships/{invoice}/reject', [App\Http\Controllers\Admin\InvoiceMembershipController::class, 'reject'])->name('invoice-memberships.reject');

        Route::get('admin/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
        Route::post('admin/payments/{id}/approve', [AdminPaymentController::class, 'approve'])->name('admin.payments.approve');
        Route::post('admin/payments/{id}/reject', [AdminPaymentController::class, 'reject'])->name('admin.payments.reject');

        Route::resource('crypto-insights', \App\Http\Controllers\Admin\CryptoInsightController::class)->except(['show', 'edit', 'update']);
    });

// Profile Routes (untuk user yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Form konfirmasi pembayaran membership plan (GET)
    Route::get('/membership/payment/confirm/{plan}', [MembershipPaymentController::class, 'confirm'])->name('membership.payment.confirm');
    // Proses konfirmasi pembayaran (POST)
    Route::post('/membership/payment/confirm/{plan}', [MembershipPaymentController::class, 'process'])->name('membership.payment.process');
});

// Membership
Route::get('/membership', function () {
    return view('membership');
})->middleware(['auth']);

// Auth routes (login, register, dll)
require __DIR__ . '/auth.php';
