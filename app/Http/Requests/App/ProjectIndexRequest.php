<?php
namespace App\Http\Requests\App;

use App\Bases\BaseRequest;

class ProjectIndexRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'search' => 'string',
            'groups' => 'array',
        ];
    }
}