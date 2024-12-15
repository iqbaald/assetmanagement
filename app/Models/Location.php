<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table = 'location'; 

    
    protected $fillable = [
        'locationName', 
    ];

    // Definisikan relasi jika ada
    public function items()
    {
        return $this->hasMany(Item::class, 'locationId', 'locationId');
    }
}
