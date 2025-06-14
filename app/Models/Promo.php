<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['name', 'description', 'discount_type', 'discount_value', 'start_at', 'end_at', 'is_active'];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    public function plans()
    {
        return $this->belongsToMany(MembershipPlan::class, 'membership_plan_promo');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeValid($query)
    {
        return $query->where('start_at', '<=', now())->where('end_at', '>=', now());
    }
}
