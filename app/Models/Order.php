<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\{HasManyJson, Product, User, UserAddress};

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'products' => 'array',
        'quantities' => 'array',
    ];

    public static $status = [
        '취소',
        '진행중',
        '주문완료',
        '상품준비중',
        '배송시작',
        '배송중',
        '배송완료',
        '구매확정'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function user_address()
    {
        return $this->hasOne(UserAddress::class, 'id', 'user_address_id');
    }

    public function product()
    {
        $foreignKey = 'id';
        $instance = new Product();
        $localKey = 'products';

        return new HasManyJson($instance->newQuery(), $this, $instance->getTable().'.'.$foreignKey, $localKey);
    }
}
