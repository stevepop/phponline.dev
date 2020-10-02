<?php

namespace App\Models\Concerns;

interface Sluggable
{
    /**
     * @return string
     */
    public function getSluggableValue(): string;
}
