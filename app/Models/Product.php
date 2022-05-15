<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'price_old',
        'thumb',
        'active'
    ];
    public function menu()
    {
        return $this->hasOne(Menu::class, 'id', 'category_id')
            ->withDefault(['name' => '']);
    }
}
