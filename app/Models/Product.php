<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id_distributor',
        'name',
        'price',
        'discount_price',
        'stock',
        'category',
        'description',
        'image',
        'is_flash_sale',
    ];

    protected function casts(): array
    {
        return [
            'is_flash_sale' => 'boolean',
        ];
    }

    public function distributor()
    {
        return $this->belongsTo(
            Distributor::class,
            'id_distributor'
        );
    }
}
