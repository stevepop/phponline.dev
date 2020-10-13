<?php declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\CanBeClicked;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeedItem extends Model
{
    use HasFactory;
    use CanBeClicked;

    protected $fillable = [
        'title',
        'url',
        'website',
        'data',
        'published_at',
        'feed_id',
    ];

    protected $casts = [
        'json' => 'json',
        'published_at' => 'datetime',
    ];

    // Relationships
    public function feed(): BelongsTo
    {
        return $this->belongsTo(
            Feed::class,
            'feed_id',
        );
    }

    // Model Methods
    /**
     * @return string
     */
    public function getClickableValue(): string
    {
        return $this->website;
    }

    // New Builder

    // New Collection
}
