<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Link; 
class Social extends Model
{
    use HasFactory;

    protected $guarded = []; 


    public function urls() {
        $this->belongsTo(Link::class, 'social_id', 'id');
    }
}
