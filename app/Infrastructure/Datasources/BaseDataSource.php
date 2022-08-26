<?php

namespace App\Infrastructure\Datasources;

use App\Infrastructure\Contracts\BaseDataSourceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

abstract class BaseDataSource implements BaseDataSourceInterface
{
    protected Builder $source;

    public function __call($name, $arguments)
    {
        $this->source->$name(...$arguments);
        return $this;
    }

    public function setModel(string $modelClass): BaseDataSourceInterface
    {
        $this->source = (new $modelClass)->query();
        return $this;
    }

    public function get(): Collection
    {
        return $this->source->get();
    }

    public function first(): Model
    {
        return $this->source->first();
    }

    public function count(): int
    {
        return $this->source->count();
    }

    public function paginate(int $page, int $perPage):LengthAwarePaginator
    {
        return $this->source->paginate($perPage, page: $page);
    }

    public function byId(int $id) {
        $this->source->whereId($id);
        return $this;
    }
}