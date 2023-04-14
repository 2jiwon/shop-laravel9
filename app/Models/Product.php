<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $trends;
    public static $news;
    public static $bests;

    public static function boot()
    {
        parent::boot();
        // 트렌드 상품
        self::$trends = self::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('view_cnt', 'desc')->paginate(20);
        // 신상품
        self::$news = self::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('created_at', 'desc')->paginate(20);
        // 베스트
        self::$bests = self::where('is_selling', 'Y')->where('is_displaying', 'Y')->orderBy('order_cnt', 'desc')->paginate(20);
    }
    /**
     *  Product Image
     */
    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    /**
     *  Category를 type에 따라서 상위 Category까지 이름만 배열로 반환
     */
    public static function getCategories($categoryId) {
        // return $this->hasMany(Category::class, 'id', 'category');
        $category = [];
        $data = Category::find($categoryId);

        foreach (Category::all() as $cate) {
            if ($data->type == 'main') {
                array_push($category, $data->name);
                break;
            } else if ($data->type == 'sub1') {
                if ($cate->id == $data->parent1) {
                    array_push($category, $cate->name);
                    array_push($category, $data->name);
                    break;
                }
                continue;
                
            } else if ($data->type == 'sub2') {
                if ($cate->id == $data->parent1) {
                    array_push($category, $cate->name);
                    continue;
                }
                if ($cate->id == $data->parent2) {
                    array_push($category, $cate->name);
                    array_push($category, $data->name);
                    break;
                }
                continue;
            }
        }

        return $category;
    }

    /**
     *  Orders
     */
    public function orders() {
        return Order::all()->filter(function($order) {
            return in_array($this->id, $order->products) ? $order : null;
        });
    }
}
