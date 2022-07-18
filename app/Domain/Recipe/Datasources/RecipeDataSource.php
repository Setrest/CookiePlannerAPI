<?php

namespace App\Domain\Recipe\Datasources;

use App\Infrastructure\Datasources\BaseDataSource;
use App\Models\Recipe;

class RecipeDataSource extends BaseDataSource
{
    public function __construct()
    {
        $this->setModel(Recipe::class);
    }

    public function ccalRange(int $min, int $max)
    {
        $this->source->where('ccal', '>=', $min)
            ->where('ccal', '<=', $max);

        return $this;
    }
}