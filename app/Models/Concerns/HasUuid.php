<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

trait HasUuid
{
    /**
     * @return void
     */
    public static function bootHasUuid()
    {
        static::saving(function (Model $model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
