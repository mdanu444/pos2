<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'sale_invocie_id', 'quantity', 'price', 'total'];

    public function product()
    {
       return $this->belongsTo(Product::class);
    }
}
