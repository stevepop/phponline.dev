<?php declare(strict_types=1);

namespace App\Models\Builders;

use App\Models\Concerns\CanBePublished;
use App\Models\Concerns\CanBeScheduled;
use Illuminate\Database\Eloquent\Builder;

class PodcastBuilder extends Builder
{
    use CanBePublished;
    use CanBeScheduled;
}
