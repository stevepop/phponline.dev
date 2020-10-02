<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model implements Sluggable
{
    use HasSlug;
    use HasFactory;

    protected $fillable = [
        'slug',
        'active',
        'user_id'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    /**
     * @return string
     */
    public function getSluggableValue(): string
    {
        return $this->user->name;
    }
}
