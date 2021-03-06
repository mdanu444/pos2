<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    public function user()
    {
       return $this->belongsTo(User::class);
    }
    protected $fillable = ['user_id', 'admin_id', 'amount', 'note','date', 'sale_invocie_id'];
}
