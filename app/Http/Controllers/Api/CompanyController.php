<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreUpdateCompanyFormRequest;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;

class CompanyController extends BaseController
{
    private $service;

    public function __construct(CompanyService $service)
    {
        parent::__construct($service);
    }

    protected function beforeStore(StoreUpdateCompanyFormRequest $request): JsonResponse
    {
        $request->validated();
        return $this->store($request);
    }

    protected function beforeUpdate(StoreUpdateCompanyFormRequest $request, int $id): JsonResponse
    {
        $request->validated();
        return $this->update($request, $id);
    }
}