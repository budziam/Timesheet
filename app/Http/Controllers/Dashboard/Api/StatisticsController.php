<?php
namespace App\Http\Controllers\Dashboard\Api;

use App\Bases\Controller;
use App\Models\Project;
use App\Models\User;
use App\Models\WorkLog;
use App\Statistics\CustomersStatistic;
use App\Statistics\ProjectGroupsStatistic;
use App\Statistics\ProjectWorkLogsStatistic;
use DB;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function projectWorkLogs(Project $project, ProjectWorkLogsStatistic $statistic)
    {
        return $statistic->get($project);
    }

    public function projectGroups(Request $request, ProjectGroupsStatistic $statistic)
    {
        return $statistic->get($request->all());
    }

    public function customers(Request $request, CustomersStatistic $statistic)
    {
        return $statistic->get($request->all());
    }
}
