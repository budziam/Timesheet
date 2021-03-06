<?php
namespace App\Http\Controllers\Dashboard;

use App\Bases\DashboardController;
use App\Models\User;

class UserController extends DashboardController
{
    protected function initPageInformation()
    {
        $this->breadcrumbBuilder->attachNewBreadcrumb(__('Users'), route('dashboard.users.index'));
        $this->navbarBuilder->setActive('users');
    }

    public function index()
    {
        return view('dashboard.pages.users.index');
    }

    public function edit(User $user)
    {
        $this->breadcrumbBuilder
            ->attachNewBreadcrumb($user->fullname, route('dashboard.users.edit', $user->getRouteKey()));

        return view('dashboard.pages.users.edit', compact('user'));
    }

    public function create()
    {
        $this->breadcrumbBuilder
            ->attachNewBreadcrumb(__('Create'), route('dashboard.users.create'));

        return view('dashboard.pages.users.create');
    }

    public function changePassword(User $user)
    {
        $this->breadcrumbBuilder
            ->attachNewBreadcrumb($user->fullname, route('dashboard.users.edit', $user->getRouteKey()))
            ->attachNewBreadcrumb(__('Change password'), route('dashboard.users.change-password', $user->id));

        return view('dashboard.pages.users.change-password', compact('user'));
    }
}