<?php declare(strict_types=1);

namespace App\Models\Concerns;

trait CanBePublished
{
    /**
     * @return self
     */
    public function published(): self
    {
        $this->where('published', true);

        return $this;
    }
}
