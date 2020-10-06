<?php declare(strict_types=1);

namespace App\Models\Concerns;

use App\Models\Click;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Ramsey\Uuid\Uuid;

trait CanBeClicked
{
    public static function bootCanBeClicked()
    {
        static::created(function (Model $model) {
            if (method_exists($model, 'clicks')) {
                $model->clicks()->create([
                    'uuid' => Uuid::uuid4()->toString()
                ]);
            }
        });
    }

    public function clicks(): MorphOne
    {
        return $this->morphOne(
            Click::class,
            'clickable',
        );
    }
}
