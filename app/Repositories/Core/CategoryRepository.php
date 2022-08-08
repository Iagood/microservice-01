<?php

namespace App\Repositories\Core;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    private $entity;

    public function __construct(Category $entity)
    {
        parent::__construct($entity);
    }

}
