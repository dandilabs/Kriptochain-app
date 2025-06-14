<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceMembership extends Model
{
    protected $fillable = [
        'user_id',
        'membership_plan_id',
        'invoice_number',
        'amount',
        'proof',
        'status',
        'expired_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function membershipPlan()
    {
        return $this->belongsTo(MembershipPlan::class);
    }
}
