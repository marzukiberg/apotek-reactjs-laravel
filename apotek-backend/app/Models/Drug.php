<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'unit', 'stock', 'purchases_price', 'selling_price'];
    protected $hidden = ['created_at', 'updated_at'];
}
