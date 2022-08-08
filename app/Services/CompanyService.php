<?php

namespace App\Services;

use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Repositories\Contracts\CompanyInterface;
use App\Repositories\Core\CompanyRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService implements CompanyInterface
{
    private $repository;

    public function __construct(CompanyRepository $repository)
    {   
        $this->repository = $repository;
    }

    public function getAll(): CompanyCollection
    {
        return new CompanyCollection($this->repository->getAll());
    }

    public function paginate(int $totalPage): LengthAwarePaginator
    {
        return $this->repository->paginate($totalPage);
    }

    public function findById(int $id): CompanyResource
    {
        return new CompanyResource($this->repository->findById($id));
    }

    public function store(array $data): void
    {
        $this->repository->store($data);
    }

    public function update(array $data, int $id): void
    {
        $company = $this->findById($id);
        $this->repository->update($company, $data);
    }

    public function destroy(int $id): void
    {
        $company = $this->findById($id);
        $this->repository->destroy($company);
    }

}