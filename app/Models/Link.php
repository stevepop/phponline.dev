<?php

namespace App\Models;

use App\Models\Builders\LinkBuilder;
use App\Models\Concerns\CanBeClicked;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model implements Sluggable
{
    use HasSlug;
    use HasFactory;
    use CanBeClicked;

    public const STATUS_SUBMITTED = 'PENDING';
    public const STATUS_APPROVED = 'APPROVED';
    public const STATUS_REJECTED = 'REJECTED';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'url',
        'status',
        'approved',
        'publish_date',
    ];

    protected $casts = [
        'approved' => 'boolean',
        'publish_date' => 'datetime'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    /**
     * @return bool
     */
    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    /**
     * @return bool
     */
    public function isRejected(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    /**
     * @return string
     */
    public function getHostUrlAttribute(): string
    {
        return parse_url($this->url)['host'] ?? '';
    }

    /**
     * @return string
     */
    public function getSluggableValue(): string
    {
        return $this->title;
    }

    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return LinkBuilder
     */
    public function newEloquentBuilder($query): LinkBuilder
    {
        return new LinkBuilder($query);
    }
}
