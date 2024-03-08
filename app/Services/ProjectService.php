<?php

namespace App\Services;

use App\Models\Project;
use App\Repositories\ProjectRepository;
use Illuminate\Database\Eloquent\Collection;

class ProjectService
{

    public function __construct(private readonly ProjectRepository $projectRepository)
    {
    }

    public function getAll(): Collection
    {
        return $this->projectRepository->getAll();
    }

    public function create(array $data): Project
    {
        return $this->projectRepository->create($data);
    }

    public function update(int $projectId, array $data): Project
    {
        $this->projectRepository->update($projectId, $data);

        return $this->projectRepository->getById($projectId);
    }

    public function delete(int $projectId): void
    {
        $this->projectRepository->delete($projectId);
    }

    public function getFormattedProjects(): array
    {
        return $this->projectRepository->getFormattedProjects();
    }

    public function getById(int $id): Project
    {
        return $this->projectRepository->getById($id);
    }
}
