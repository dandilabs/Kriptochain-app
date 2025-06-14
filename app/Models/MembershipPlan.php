<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    protected $fillable = ['name', 'price', 'period_month', 'features', 'highlight', 'badge'];

    protected $casts = [
        'features' => 'array',
    ];

    public function setFeaturesAttribute($value)
    {
        if (is_string($value)) {
            $value = array_filter(array_map('trim', explode("\n", $value)));
        }
        $this->attributes['features'] = json_encode($value);
    }

    public function promos()
    {
        return $this->belongsToMany(Promo::class, 'membership_plan_promo');
    }

    // Helper: harga promo aktif (jika ada)
    public function getActivePromoAttribute()
    {
        return $this->promos()->where('is_active', true)->where('start_at', '<=', now())->where('end_at', '>=', now())->first();
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }


    public function getDiscountedPriceAttribute()
    {
        $promo = $this->activePromo;
        if (!$promo) return $this->price;

        if ($promo->discount_type === 'percentage') {
            return round($this->price * (1 - $promo->discount_value/100));
        }
        return max($this->price - $promo->discount_value, 0);
    }
}
