<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the post that owns the image.
     */
    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }
}
