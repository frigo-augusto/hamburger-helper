<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable =[
        "name"
    ];

    public function order()
    {
        return $this->morphToMany(Order::class, 'order_combo_item');
    }

    public function combo(){
        return $this->belongsToMany(Combo::class, 'combo_item');
    }

    public function ingredient(){
        return $this->belongsToMany(Ingredient::class, 'item_ingredient');
    }

}
