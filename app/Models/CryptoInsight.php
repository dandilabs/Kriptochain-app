<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoInsight extends Model
{
    protected $fillable = ['title', 'date', 'file_path'];

    protected $casts = [
        'date' => 'date',
    ];

    // Untuk sorting berdasarkan tanggal terbaru
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('date', 'desc');
    }
}
