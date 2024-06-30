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
        return $this->belongsTo(Supplier::class);
    }
    // public function getIdAttribute($value)
    // {
    //     return str_pad($value, 5, '0', STR_PAD_LEFT);
    // }

    // For aalytic tables and inventory records

    public static function boot()
    {
        parent::boot();

        static::updating(function ($product) {
            if ($product->isDirty('quantity')) {
                $oldQuantity = $product->getOriginal('quantity');
                $newQuantity = $product->quantity;
                $difference = $newQuantity - $oldQuantity;

                if ($difference < 0) {
                    $usage = abs($difference);
                    $expenses = 0;
                } else {
                    $usage = 0;
                    $expenses = $product->price * $difference;
                }

                InventoryRecord::create([
                    'product_id' => $product->id,
                    'quantity' => $newQuantity,
                    'usage' => $usage,
                    'expenses' => $expenses,
                ]);
            }
        });
    }

    public function inventoryRecords()
    {
        return $this->hasMany(InventoryRecord::class);
    }
}
