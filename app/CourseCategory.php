<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CourseCategory
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Course[] $courses
 * @property-read int|null $courses_count
 * @method static \Illuminate\Database\Eloquent\Builder|CourseCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseCategory whereName($value)
 * @mixin \Eloquent
 */
class CourseCategory extends Model
{

    public $timestamps = false;

    //
    protected $fillable = ['name'];

    public function courses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Course::class);
    }
}
