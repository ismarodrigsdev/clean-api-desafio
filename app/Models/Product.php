<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price'];

    protected $casts = [
        'price' => 'decimal:2'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function getPriceAttribute($value)
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}
