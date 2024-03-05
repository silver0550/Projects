<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class ProjectController extends Controller
{

    public function __construct(private readonly ProjectService $projectService)
    {
    }

    public function index(): JsonResponse
    {
        return response()->json(ProjectResource::collection($this->projectService::getAll()), ResponseCode::HTTP_OK);
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $created = $this->projectService->create($validated);

        return response()->json($created, ResponseCode::HTTP_OK);
    }

    public function update(ProjectRequest $request, int $projectId): JsonResponse
    {
        $updated = $this->projectService->update($projectId, $request->validated());

        return response()->json($updated, ResponseCode::HTTP_OK);
    }

    public function destroy(int $projectId): JsonResponse
    {
        $this->projectService->delete($projectId);

        return response()->json();
    }
}
