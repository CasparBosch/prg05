<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','category_id','position_1', 'position_2', 'description', 'visibility'];

    protected static function booted()
    {
        static::creating(function ($positions) {
            $positions->user_id = Auth::id();
        });
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
