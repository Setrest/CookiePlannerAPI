<?php

namespace App\Domain\Recipe\Query;

use App\Domain\Recipe\Datasources\RecipeDataSource;

class GetRecipiesQuery
{
    const PER_PAGE = 20;

    public function __construct(private RecipeDataSource $datasource)
    {}

    public function get(int $page = 1, ?int $minCcal = null, ?int $maxCcal = null)
    {
        $ds = $this->datasource;

        if ($minCcal && $maxCcal) {
            $ds->ccalRange($minCcal, $maxCcal);
        }

        return $ds->paginate($page, self::PER_PAGE);
    }
}