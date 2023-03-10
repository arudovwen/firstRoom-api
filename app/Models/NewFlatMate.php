<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewFlatMate extends Model
{
    use HasFactory;

    protected $casts = [
        'interests' => 'array',

    ];
    
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
