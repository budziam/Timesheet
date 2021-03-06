<?php
namespace App\Http\Controllers\Dashboard\Api;

use App\Bases\Controller;
use App\Datatables\WorkLogDatatable;
use App\Http\Requests\Dashboard\WorkLogStoreUpdateRequest;
use App\Models\WorkLog;
use App\Transformers\Dashboard\WorkLogTransformer;
use App\ModelShaper\Datatable\DatatableFormRequest;
use App\ModelShaper\Datatable\DatatableShaper;

class WorkLogController extends Controller
{
    public function datatable(DatatableFormRequest $request)
    {
        $shaper = new DatatableShaper(app(WorkLogDatatable::class));

        return $shaper->shape($request);
    }

    public function show(WorkLog $workLog)
    {
        return fractal()
            ->item($workLog, new WorkLogTransformer())
            ->toArray();
    }

    public function store(WorkLogStoreUpdateRequest $request)
    {
        $workLog = WorkLog::create($request->all());

        return fractal()
            ->item($workLog, new WorkLogTransformer())
            ->toArray();
    }

    public function update(WorkLog $workLog, WorkLogStoreUpdateRequest $request)
    {
        $workLog->update($request->all());

        return $this->responseSuccess();
    }

    public function destroy(WorkLog $workLog)
    {
        $workLog->delete();

        return $this->responseSuccess();
    }
}
