<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdateCategoryFormRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends BaseController
{
    private $service;

    public function __construct(CategoryService $service)
    {
        parent::__construct($service);
    }

    protected function beforeStore(StoreUpdateCategoryFormRequest $request): JsonResponse
    {
        $request->validated();
        return $this->store($request);
    }

    protected function beforeUpdate(StoreUpdateCategoryFormRequest $request, int $id): JsonResponse
    {
        $request->validated();
        return $this->update($request, $id);
    }
}