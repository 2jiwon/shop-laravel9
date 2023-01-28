<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'products' => 'array',
        'quantities' => 'array',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
