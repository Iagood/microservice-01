<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

abstract class BaseController extends Controller
{
    private $service;

    protected function __construct(object $service)
    {
        $this->service = $service;
    }
    
    /**
     * Function responsible for returning records from the database.
     * Whether these are paged or not, or the result of a filter.
     *
     * @param mixed $request
     * @return Response
     */
    protected function index(): Response
    {
        $response = $this->service->getAll();
        return response($response,200);
    }
    
    /**
     * Function responsible for saving records in the database.
     *
     * @param mixed $request
     * @return JsonResponse
     */
    protected function store(Request $request): JsonResponse
    {
        $this->service->store($request->all());
        return response()->json(['message' =>'Registro inserido com sucesso.'], 201);
    }

    /**
     * Function responsible for detail record from the database.
     *
     * @param int $id
     * @return Response
     */
    protected function show(int $id): Response
    {
        $response = (object) $this->service->findById($id);
        return response($response, 200);
    }

    /**
     * update
     *
     * @param mixed $request
     * @param int $id
     * @return JsonResponse
     */
    protected function update(Request $request, int $id): JsonResponse
    {
        $this->service->update($request->all(), $id);
        return response()->json(['message' =>'Registro atualizado com sucesso.'], 200);
    }

    protected function destroy(int $id): JsonResponse
    {
        $this->service->destroy($id);
        return response()->json(['message' =>'Registro deletado com sucesso.'], 200);
    }
}
