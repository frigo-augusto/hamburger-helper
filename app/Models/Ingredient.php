<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable =[
        "name"
    ];

    public function item(){
        return $this->belongsToMany(Item::class, 'item_ingredient');
    }

}
