<?php

namespace App\Models;

use App\Models\Builders\PackageBuilder;
use App\Models\Concerns\CanBeClicked;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model implements Sluggable
{
    use HasSlug;
    use HasFactory;
    use CanBeClicked;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'external_url',
        'published',
        'json',
        'submitted_by_user_id',
        'publish_date',
    ];

    protected $casts = [
        'published' => 'boolean',
        'publish_date' => 'datetime',
        'json' => 'json',
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
     * @return PackageBuilder
     */
    public function newEloquentBuilder($query): PackageBuilder
    {
        return new PackageBuilder($query);
    }
}
