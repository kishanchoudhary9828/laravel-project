<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'blog_id',
        'comment',
     
    ];
    public function post(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}
