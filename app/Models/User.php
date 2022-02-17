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
}
