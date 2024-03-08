<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class ProjectController extends Controller
{

    public function __construct(private readonly ProjectService $projectService)
    {
    }

    public function indexPage(): Response
    {
        return Inertia::render('Project/index', [
            'projects' => $this->projectService->getFormattedProjects()
        ]);
    }

    public function createPage(): Response
    {
        return Inertia::render('Project/create');
    }

    public function editPage(int $id): Response
    {
        return Inertia::render('Project/create', [
            'project' => $this->projectService->getById($id),
        ]);
    }

    public function index(): JsonResponse
    {
        return response()->json(ProjectResource::collection($this->projectService->getAll()), ResponseCode::HTTP_OK);
    }

    public function store(ProjectRequest $request): JsonResponse
    {
        $created = $this->projectService->create($request->validated());

        return response()->json(new ProjectResource($created), ResponseCode::HTTP_CREATED);
    }

    public function update(ProjectRequest $request, int $projectId): JsonResponse
    {
        $updated = $this->projectService->update($projectId, $request->validated());

        return response()->json(new ProjectResource($updated), ResponseCode::HTTP_OK);
    }

    public function destroy(int $projectId): JsonResponse
    {
        $this->projectService->delete($projectId);

        return response()->json(null, ResponseCode::HTTP_NO_CONTENT);
    }
}
