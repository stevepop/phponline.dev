<?php declare(strict_types=1);

namespace App\Models\Concerns;

trait CanBeScheduled
{
    public function scheduled(): self
    {
        $this->where('published', false)
            ->whereNotNull('publish_date');

        return $this;
    }
}
