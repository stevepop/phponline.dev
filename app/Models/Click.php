<?php declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Click extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'clickable_id',
        'clickable_type',
        'count',
    ];

    // Relationships
    public function clickable(): MorphTo
    {
        return $this->morphTo();
    }

    // Model Methods

    // New Builder

    // New Collection
}
