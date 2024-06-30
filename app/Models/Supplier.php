<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';


    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_number',
        'description',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'supplier_id');
    }

    public function getIdAttribute($value)
{
    return str_pad($value, 5, '0', STR_PAD_LEFT);
}
}


