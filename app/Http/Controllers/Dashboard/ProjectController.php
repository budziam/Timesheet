<?php
namespace App\Http\Controllers\Dashboard;

use App\Bases\BaseController;
use App\Models\Project;

class ProjectController extends BaseController
{
    protected function initPageInformation()
    {
        $this->breadcrumbBuilder->attachNewBreadcrumb(__('Projects'), route('dashboard.projects.index'));
    }

    public function index()
    {
        return view('dashboard.pages.projects.index');
    }

    public function edit(Project $project)
    {
        $this->breadcrumbBuilder
            ->attachNewBreadcrumb($project->id, route('dashboard.projects.edit', $project->getRouteKey()));

        return view('dashboard.pages.projects.edit', compact('project'));
    }
}
