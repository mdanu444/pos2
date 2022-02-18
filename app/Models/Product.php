<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function admin(){
        return $this->belongsTo(Admin::class,'admin_id');
    }

    protected $fillable =
    [
        'admin',
        'title',
        'price',
        'cost_price',
        'category_id',
        'admin_id',
        'description'
    ];

    public function ArrayForSelect()
    {
        $array = [];

        foreach(Product::all() as $item){
            $array[$item->id] = $item->title;
        }
        return $array;
    }

    public function saleItem()
    {
        return $this->belongsTo(SaleItem::class);
    }
}
