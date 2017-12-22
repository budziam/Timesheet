<?php
namespace App\Models;

use App\Bases\Model;

/**
 * App\Models\Customer
 *
 * @property int                                                                 $id
 * @property string                                                              $name
 * @property string                                                              $color
 * @property \Carbon\Carbon                                                      $created_at
 * @property \Carbon\Carbon                                                      $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Project[] $projects
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Customer extends Model
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
