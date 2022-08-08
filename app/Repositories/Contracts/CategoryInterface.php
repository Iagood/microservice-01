<?php

namespace App\Repositories\Contracts;

interface CategoryInterface
{
    public function getAll();

    public function paginate(int $totalPage);

    public function findById(int $id);

    public function store(array $data);

    public function update(array $data, int $id);

    public function destroy(int $id);
}