<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'nama_distributor',
        'kota',
        'provinsi',
        'kontak',
        'email',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_distributor');
    }
}
