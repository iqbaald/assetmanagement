<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category'; 

    protected $fillable = [
        'categoryName',
    ];

    // Definisikan relasi jika ada
    public function items()
    {
        return $this->hasMany(Item::class, 'categoryId', 'categoryId');
    }
}
