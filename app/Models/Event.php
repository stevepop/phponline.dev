<?php

namespace App\Models;

use App\Models\Builders\EventBuilder;
use App\Models\Concerns\CanBeClicked;
use App\Models\Concerns\HasEvents;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model implements Sluggable
{
    use HasSlug;
    use HasEvents;
    use HasFactory;
    use CanBeClicked;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'external_url',
        'published',
        'publish_date',
        'eventable_type',
        'eventable_id',
        'timezone',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
        'published' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getSluggableValue(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getClickableValue(): string
    {
        return $this->external_url;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return EventBuilder
     */
    public function newEloquentBuilder($query): EventBuilder
    {
        return new EventBuilder($query);
    }
}
