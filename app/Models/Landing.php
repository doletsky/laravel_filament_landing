<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $table = 'landings';

    protected $fillable = [
        'section_key',
        'content_type',
        'title',
        'description',
        'image_url',
        'price',
        'order',
        'is_active',
        'meta_data',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'meta_data' => 'json',
    ];
}
