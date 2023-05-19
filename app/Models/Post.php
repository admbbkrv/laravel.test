<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $title
 * @property string $content
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id',
       'title', 'content',
       'published', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'published' => 'boolean',
    ];
}
