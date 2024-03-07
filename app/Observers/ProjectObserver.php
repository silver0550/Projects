<?php

namespace App\Observers;

use App\Mail\ProjectHasChangedMail;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;

class ProjectObserver
{
    public function updated(Project $project): void
    {
        $changes = $project->getChanges();

        $detailedChanges = [];

        foreach ($changes as $key => $newValue) {
            $originalValue = $project->getOriginal($key);
            if ($key == 'updated_at') {
                continue;
            }
            $detailedChanges[] = [
                'key' => $key,
                'from' => $originalValue,
                'to' => $newValue,
            ];
        }

        Mail::to($project->contacts)->send(new ProjectHasChangedMail($project->name, $detailedChanges));

    }
}
