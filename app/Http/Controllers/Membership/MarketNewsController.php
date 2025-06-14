<?php

namespace App\Http\Controllers\Membership;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class MarketNewsController extends Controller
{
    public function index()
    {
        $apiKey = config('services.alpha_vantage.key');

        $response = Http::get('https://www.alphavantage.co/query', [
            'function' => 'NEWS_SENTIMENT',
            'topics' => 'blockchain', // Fokus ke topik blockchain
            'apikey' => $apiKey ?? 'demo',
        ]);

        $news = $response->successful() ? $response->json()['feed'] ?? [] : [];

        return view('membership.blockchain_news', [
            'news' => $news,
        ]);
    }

    public function newsSentimentCrypto(Request $request)
    {
        $apiKey = env('ALPHA_VANTAGE_KEY', 'demo');
        $baseUrl = 'https://www.alphavantage.co/query';

        $params = [
            'function' => 'NEWS_SENTIMENT',
            'tickers' => 'COIN,CRYPTO:BTC',
            'apikey' => $apiKey,
        ];

        $response = Http::get($baseUrl, $params);
        $data = $response->json();
        $articles = $data['feed'] ?? [];

        $filter = $request->query('filter');
        if (!empty($filter)) {
            $articles = collect($articles)->filter(function ($item) use ($filter) {
                $sentiment = strtolower($item['overall_sentiment_label'] ?? 'neutral');

                return match ($filter) {
                    'bullish' => $sentiment === 'positive',
                    'bearish' => $sentiment === 'negative',
                    'neutral' => $sentiment === 'neutral',
                    'top' => ($item['relevance_score'] ?? 0) > 0.9,
                    default => true,
                };
            })->values()->all();
        }

        return view('membership.alphavantage.news_sentiment', [
            'title' => 'News Sentiment for COIN & BTC',
            'articles' => $articles,
            'filter' => $filter,
        ]);
    }

}
