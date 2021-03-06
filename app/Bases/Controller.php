<?php
namespace App\Bases;

use App\Builders\Breadcrumb\BreadcrumbBuilder;
use App\Builders\NavbarBuilder;
use App\Models\User;
use App\Traits\Responseable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use Responseable;

    /** @var NavbarBuilder */
    protected $navbarBuilder;

    /** @var BreadcrumbBuilder */
    protected $breadcrumbBuilder;

    public function __construct(NavbarBuilder $navbarBuilder, BreadcrumbBuilder $breadcrumbBuilder)
    {
        $this->navbarBuilder = $navbarBuilder;
        $this->breadcrumbBuilder = $breadcrumbBuilder;

        $this->initMiddlewares();
        $this->preInitPageInformation();
    }

    protected function preInitPageInformation()
    {
        $this->initPageInformation();
    }

    /**
     * Initializes middlewares
     */
    protected function initMiddlewares()
    {
        //
    }

    /**
     * Initializes basic information about current page
     */
    protected function initPageInformation()
    {
        //
    }

    protected function user() : User
    {
        return auth()->user();
    }
}
