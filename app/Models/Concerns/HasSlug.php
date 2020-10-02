<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::saving(function (Sluggable $model) {
            $model->slug = Str::slug($model->getSluggableValue());
        });
    }

    /**
     * @return string
     */
    public function idSlug(): string
    {
        return "{$this->id}-{$this->slug}";
    }

    /**
     * @param string $idSlug
     * @return Model|null
     */
    public static function findByIdSlug(string $idSlug): ?Model
    {
        [$id] = explode('-', $idSlug);

        return static::find($id);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
