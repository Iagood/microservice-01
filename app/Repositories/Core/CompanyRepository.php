<?php

namespace App\Repositories\Core;

use App\Models\Company;

class CompanyRepository extends BaseRepository
{
    private $entity;

    public function __construct(Company $entity)
    {
        parent::__construct($entity);
    }

}
