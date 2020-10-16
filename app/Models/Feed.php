<?php declare(strict_types=1);

namespace App\Models;

use App\Models\Concerns\CanBeBookmarked;
use App\Models\Concerns\CanBeClicked;
use App\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feed extends Model
{
    use HasUuid;
    use HasFactory;
    use CanBeClicked;
    use CanBeBookmarked;

    protected $fillable = [
        'uuid',
        'url',
        'approved',
        'profile_id',
    ];

    protected $casts = [
        'approved' => 'boolean',
    ];

    // Relationships
    public function profile(): BelongsTo
    {
        return $this->belongsTo(
            Profile::class,
            'profile_id',
        );
    }

    public function items(): HasMany
    {
        return $this->hasMany(
            FeedItem::class,
            'feed_id',
        );
    }

    /**
     * @return string
     */
    public function getClickableValue(): string
    {
        return route('users:feed',[$this->profile->slug, $this->uuid]);
    }

    // New Builder

    // New Collection
}
