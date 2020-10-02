<?php declare(strict_types=1);

namespace App\Models\Builders;

use App\Models\Link;
use Illuminate\Database\Eloquent\Builder;

class LinkBuilder extends Builder
{
    /**
     * @return self
     */
    public function approved(): self
    {
        $this->where('status', Link::STATUS_APPROVED);

        return $this;
    }
}
