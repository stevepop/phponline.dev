<?php

namespace App\Models;

use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class UserGroup extends Model implements Sluggable
{
    use HasSlug;
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'url',
        'city',
        'country',
        'published',
        'submitted_by_user_id'
    ];

    protected $casts = [
        'published' => 'boolean'
    ];

    /**
     * @return BelongsTo
     */
    public function submittedByUser(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'submitted_by_user_id'
        );
    }

    /**
     * @return MorphMany
     */
    public function events(): MorphMany
    {
        return $this->morphMany(
            Event::class,
            'eventable',
        );
    }

    /**
     * @return string
     */
    public function getSluggableValue(): string
    {
        return $this->title;
    }
}
