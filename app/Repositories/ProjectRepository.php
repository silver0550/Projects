<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends BaseRepository
{

    protected function determineModelClass(): string
    {
        return Project::class;
    }
}
