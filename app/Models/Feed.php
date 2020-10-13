<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feed extends Model
{
    use HasFactory;

    protected $fillable = [
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

    // Model Methods

    // New Builder

    // New Collection
}
