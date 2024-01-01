<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reagen extends Model
{
    use HasFactory;

    protected $primaryKey = 'noCatalog';

    protected $fillable = [
        'noCatalog',
        'nameReagen',
        'merk',
        'packSize',
        'hazardOptions',
        'msds',
        'price'
    ];

    // Relasi dengan model StockReagen
    public function stockReagen()
    {
        return $this->hasMany(StockReagen::class, 'noCatalog', 'noCatalog');
    }

}
