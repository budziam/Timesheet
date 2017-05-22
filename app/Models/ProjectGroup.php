<?php

namespace App\Models;

use App\Bases\BaseModel;

/**
 * App\Models\ProjectGroup
 *
 * @property int                                                                 $id
 * @property string                                                              $name
 * @property string                                                              $color
 * @property \Carbon\Carbon                                                      $created_at
 * @property \Carbon\Carbon                                                      $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProjectGroup whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProjectGroup whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProjectGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ProjectGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bases\BaseModel firstOrFail()
 * @mixin \Eloquent
 */
class ProjectGroup extends BaseModel
{
    protected $fillable = [
        'name',
        'color',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
