<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'model',
        'description',
        'price',
        'condition',
        'category',
        'type',
        'image_1',
        'image_2',
        'image_3',
        'user_id',
        'city',

    ];

}
