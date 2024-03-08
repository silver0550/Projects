<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends BaseRepository
{

    protected function determineModelClass(): string
    {
        return Project::class;
    }

    public function getFormattedProjects(): array
    {
        $formattedProject = [];

        $this->getAll()->each(function($project) use (&$formattedProject){
            $formattedProject[] = [
                'id' => $project->id,
                'name' => $project->name,
                'status' => $project->status->getReadableText(),
                'contactNumber' => $project->contacts?->count() ?? 0,
            ];
        });

        return $formattedProject;
    }
}
