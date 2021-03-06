<?php
namespace App\Repositories;

use App\Models\ProjectGroup;

class ProjectGroupRepository
{
    public function getLink(ProjectGroup $projectGroup, string $title = null) : string
    {
        $title = $title ?? $projectGroup->name;

        return link_to_route('dashboard.project-groups.edit', $title, $projectGroup->getRouteKey());
    }
}