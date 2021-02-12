<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PI extends Model
{
    use HasFactory;

    protected $fillable = [
        'next_starter',
        'value',
    ];
}
