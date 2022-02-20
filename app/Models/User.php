<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name', 'email', 'phone', 'address', 'group_id', 'admin_id'
    ];

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function admin()
    {
        return $this->BelongsTo(Admin::class);
    }

    public function receipt()
    {
        return $this->hasMany(Receipt::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function sales()
    {
        return $this->hasManyThrough(SaleItem::class, SaleInvoice::class, 'user_id', 'sale_invocie_id', 'id','id');
    }
    public function purchases()
    {
        return $this->hasManyThrough(PurchaseItem::class, PurchaseInvoice::class, 'user_id', 'purchase_invocie_id', 'id','id');
    }
}
