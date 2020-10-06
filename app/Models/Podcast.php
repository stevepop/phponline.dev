<?php declare(strict_types=1);

namespace App\Models;

use App\Models\Builders\PodcastBuilder;
use App\Models\Concerns\CanBeClicked;
use App\Models\Concerns\HasSlug;
use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Podcast extends Model implements Sluggable
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

    // Relationships
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

    // Model Methods
    /**
     * @return string
     */
    public function getSluggableValue(): string
    {
        return $this->title;
    }

    // New Builder
    /**
     * @param \Illuminate\Database\Query\Builder $query
     * @return PodcastBuilder
     */
    public function newEloquentBuilder($query): PodcastBuilder
    {
        return new PodcastBuilder($query);
    }

    // New Collection
}
