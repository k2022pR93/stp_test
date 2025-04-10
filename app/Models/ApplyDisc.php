<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplyDisc extends Model
{
    protected $table = 'appled_discount';
    protected $fillable = [
        'category',
        'qty',
        'purchase_date',
        'total_bill_amount',
        'matched_rules',
        'exclusive_rules',
        'discount_applied',
        'final_amount'
    ];
}
