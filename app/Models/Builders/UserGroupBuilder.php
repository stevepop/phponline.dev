<?php declare(strict_types=1);

namespace App\Models\Builders;

use App\Models\Concerns\CanBePublished;
use Illuminate\Database\Eloquent\Builder;

class UserGroupBuilder extends Builder
{
    use CanBePublished;
}
