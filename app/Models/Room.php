<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public $timestamps = false;
    
    public function room(): HasOne {
        return $this->hasOne(Order::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
