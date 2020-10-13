<?php declare(strict_types=1);

namespace App\Models\Concerns;

use App\Models\Bookmark;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait CanBeBookmarked
{
    public function bookmark(): MorphOne
    {
        return $this->morphOne(
            Bookmark::class,
            'bookmarkable',
        );
    }
}
