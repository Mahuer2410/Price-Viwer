<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'description',
        'price',
        'direction',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
