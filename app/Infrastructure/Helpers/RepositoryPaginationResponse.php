<?php

namespace App\Infrastructure\Helpers;

use Illuminate\Contracts\Support\Arrayable;

class RepositoryPaginationResponse implements Arrayable
{
    private mixed $data;

    private int $total;

    private int $perPage;

    public function __construct(mixed $data, int $total, int $perPage)
    {
        $this->data = $data;
        $this->total = $total;
        $this->perPage = $perPage;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'paginator' => [
                'total' => $this->total,
                'per_page' => $this->perPage,
            ]
        ];
    }
}
