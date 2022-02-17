<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $fillable = ['title'];

    public function arrayForSelect (){
        $array = [];
        foreach (Group::all() as  $group) {
            $array[$group->id] = $group->title;
        }
        return $array;
    }
}
