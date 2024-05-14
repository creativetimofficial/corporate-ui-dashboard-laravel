<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Transaction extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function user() {

        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function country() {
        return $this->belongsTo(Country::class, 'id', 'country_id');
    }

    
}
