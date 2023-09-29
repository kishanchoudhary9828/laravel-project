<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'slug',
        'sub_heading',
        'short_description',
        'description',
        'status',
        'image',
    ];
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }       
  

}
