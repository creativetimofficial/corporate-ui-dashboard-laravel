<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'usage',
        'expenses',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
