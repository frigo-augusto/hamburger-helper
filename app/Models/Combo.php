<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;

    protected $fillable =[
        "name"
    ];

    public function order()
    {
        return $this->morphToMany(Order::class, 'order_combo_item');
    }

    public function item(){
        return $this->belongsToMany(Item::class, 'combo_item');
    }

}
