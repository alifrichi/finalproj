<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'title',
        'content',
        'featured_image',
        'genre',
        'category',
        'user_id',
        'price_per_month', // Add price_per_month to fillable
        'price_per_week', // Add price_per_week to fillable
    ];


    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
