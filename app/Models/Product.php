<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'supplier_id',
        'description',
        'low_limit'
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplierID');
    }
}
