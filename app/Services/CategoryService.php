<?php

namespace App\Services;

use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Core\CategoryRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService implements CategoryInterface
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {   
        $this->repository = $repository;
    }

    public function getAll(): CategoryCollection
    {
        return new CategoryCollection($this->repository->getAll());
    }

    public function paginate(int $totalPage): LengthAwarePaginator
    {
        return $this->repository->paginate($totalPage);
    }

    public function findById(int $id): CategoryResource
    {
        return new CategoryResource($this->repository->findById($id));
    }

    public function store(array $data): void
    {
        $this->repository->store($data);
    }

    public function update(array $data, int $id): void
    {
        $category = $this->findById($id);
        $this->repository->update($category, $data);
    }

    public function destroy(int $id): void
    {
        $category = $this->findById($id);
        $this->repository->destroy($category);
    }

}