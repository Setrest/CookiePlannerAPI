<?php

namespace App\Infrastructure\Contracts;

interface BaseDataSourceInterface
{
    public function setModel(string $modelClass): self;
}