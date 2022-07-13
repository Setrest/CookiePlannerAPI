<?php

namespace App\Infrastructure\Repositories;

use App\Infrastructure\Contracts\BaseRepository;

abstract class EloquentRepository implements BaseRepository
{
    public $primaryKeyName;
    public $entityName = null;

    // abstract protected function dao();

    // public function __construct(EntityManager $em) 
    // {
    //     parent::__construct($em, new ClassMetadata($this->entityClass));
    //     $this->primaryKeyName = $em->getClassMetadata($this->entityClass)->getSingleIdentifierFieldName();
    // }

    // public function __construct()
    // {
        
    // }
}