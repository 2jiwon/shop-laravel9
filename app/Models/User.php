<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\UserAddress;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'uid', 'email', 'password', 'nickname', 
    // ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    public function user_addresses()
    {
        return $this->hasOne(UserAddress::class, 'user_id', 'id');
    }

    public static function hasReview($userId, $productId)
    {
        $res = Review::where(function($qry) use ($userId, $productId) {
                $qry->where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->where('is_deleted', 'N');
            })->first();

        if (empty($res)) return false;
        return true;
    }

    public static function hasQuestion($userId, $productId)
    {
        $res = Question::where(function($qry) use ($userId, $productId) {
                $qry->where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->where('is_deleted', 'N');
            })->first();

        if (empty($res)) return false;
        return true;
    }
}
