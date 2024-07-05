<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'image',
        'title',
        'description',
        'price',
        'stock',
    ];

    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }
}