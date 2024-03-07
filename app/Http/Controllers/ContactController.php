<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class ContactController extends Controller
{
    public function __construct(private readonly ContactService $contactService)
    {
    }

    public function index(): JsonResponse
    {
        return response()
            ->json(ContactResource::collection($this->contactService->getAll()), ResponseCode::HTTP_OK);
    }

    public function store(ContactRequest $request): JsonResponse
    {
        $created = $this->contactService->create($request->validated());

        return response()->json(new ContactResource($created), ResponseCode::HTTP_CREATED);
    }

    public function update(ContactRequest $request, int $projectId): JsonResponse
    {
        $updated = $this->contactService->update($projectId, $request->validated());

        return response()->json(new ContactResource($updated), ResponseCode::HTTP_OK);
    }

    public function destroy(int $contactId)
    {
        $this->contactService->delete($contactId);

        return response()->json(null, ResponseCode::HTTP_NO_CONTENT);
    }
}
