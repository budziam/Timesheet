<?php
namespace App\Http\Requests\App;

use App\Bases\FormRequest;
use App\Models\WorkLog;

class WorkLogUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'time_fieldwork' => 'required|integer',
            'time_office'    => 'required|integer',
            'comment'        => 'string',
        ];
    }

    public function beforeValidation()
    {
        /** @var WorkLog $workLog */
        $workLog = $this->workLog;

        WorkLog::where([
            'id'      => $workLog->id,
            'user_id' => $this->user()->id,
        ])
            ->firstOrFail();
    }
}