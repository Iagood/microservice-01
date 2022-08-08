<?php

namespace App\Repositories\Core;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository
{
    private $entity;

    public function __construct(object $entity)
    {
        $this->entity = $entity;
    }

    public function getAll(): Collection
    {
        return $this->entity->get();
    }

    public function paginate(int $totalPage): LengthAwarePaginator
    {
        return $this->entity->paginate($totalPage);
    }

    public function findById(int $id): object
    {
        return $this->entity->findOrFail($id);
    }

    public function findWhere(string $column, string $value): Collection
    {
        return $this->entity->where($column, $value)->get();
    }

    public function findWhereFirst(string $column, string $value): object
    {
        return $this->entity->where($column, $value)->first();
    }

    public function store(array $data): void
    {
        $this->entity->firstOrCreate($data);
    }

    public function update(object $entity, array $data): void
    {
        $entity->update($data);
    }

    public function destroy(object $entity): void
    {
        $entity->delete();
    }

}
