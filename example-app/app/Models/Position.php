<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','category_id','position', 'move_1', 'description_1', 'move_2', 'description_2', 'visibility'];

    protected static function booted()
    {
        static::creating(function ($positions) {
            $positions->user_id = Auth::id();
        });
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
