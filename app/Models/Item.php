<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemName',
        'itemPhoto',
        'conditionPercentage',
        'purchaseDate',
        'purchasePrice',
        'categoryId',
        'categoryId',
    ];

    protected $cats = [
        'purchaseDate' => 'datetime',
        'conditionPercentage' => 'float',
        'purchasePrice' => 'decimal:2',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'locationId', 'locationId');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId', 'categoryId');
    }
}
