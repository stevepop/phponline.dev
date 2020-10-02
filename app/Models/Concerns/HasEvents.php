<?php declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphTo;

trait HasEvents
{
    /**
     * @return MorphTo
     */
    public function eventable(): MorphTo
    {
        return $this->morphTo();
    }
}
