<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUsageHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity_used',
        'used_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
