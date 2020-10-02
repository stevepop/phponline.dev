<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait CreatesPreviewSecret
{
    public static function bootCreatesPreviewSecret()
    {
        static::saving(function (Model $model) {
            $model->preview_secret = Str::random(10);
        });
    }
}
