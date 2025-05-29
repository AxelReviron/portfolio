<?php

namespace App\Utils;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

trait HandlesCrudOperations
{
    protected function getModelClass(): string
    {
        if (!isset($this->model)) {
            throw new Exception('Model class not set');
        }

        return $this->model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $modelClass = $this->getModelClass();
        $response = Gate::inspect('viewAny', $modelClass);

        if ($response->allowed()) {
            $data = $modelClass::all();
            return response()->json($data);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string|int $id): JsonResponse
    {
        $model = $this->findModel($id);
        $response = Gate::inspect('view', $model);

        if ($response->allowed()) {
            return response()->json($model);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormRequest $request): JsonResponse
    {
        $modelClass = $this->getModelClass();
        $response = Gate::inspect('create', $modelClass);

        if ($response->allowed()) {
            $data = $request->validated();
            $model = $modelClass::create($data);

            return response()->json($model, 201);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormRequest $request, string|int $id): JsonResponse
    {
        $model = $this->findModel($id);
        $response = Gate::inspect('update', $model);

        if ($response->allowed()) {
            $data = $request->validated();
            $model->update($data);

            return response()->json($model);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string|int $id): JsonResponse
    {
        $model = $this->findModel($id);
        $response = Gate::inspect('delete', $model);

        if ($response->allowed()) {
            $model->delete();

            return response()->json(null, 204);
        } else {
            return response()->json(null, 404);
        }
    }

    private function findModel(string|int $id): Model
    {
        return $this->getModelClass()::findOrFail($id);
    }
}
