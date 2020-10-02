<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements Sluggable
{
    use HasSlug;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
    ];

    public function getSluggableValue(): string
    {
        return $this->title;
    }

    public function articles(): HasMany
    {
        return $this->belongsToMany(
            Article::class,
            'category_id',
        );
    }
}
