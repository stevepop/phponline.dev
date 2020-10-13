<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'bookmarkable_id',
        'bookmarkable_type',
        'user_id'
    ];

    // Relationships
    public function bookmarkable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    // Model Methods

    /**
     * @return string
     */
    public function displayName(): string
    {
        $parts = explode('\\', $this->bookmarkable_type);

        return array_pop($parts);
    }

    // New Builder

    // New Collection
}
