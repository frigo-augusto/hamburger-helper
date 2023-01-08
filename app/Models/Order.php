<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    public function combo()
    {
        return $this->morphedByMany(Combo::class, 'order_combo_items')
            ->withPivot('amount');
    }

    public function item()
    {
        return $this->morphedByMany(Item::class, 'order_combo_items')
            ->withPivot('amount');
    }
}
