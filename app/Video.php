<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Video
 *
 * @property int $id
 * @property string $url
 * @property int $course_id
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUrl($value)
 * @mixin \Eloquent
 * @property-read \App\Course $course
 */
class Video extends Model
{

    public $timestamps = false;

    protected $fillable = ['title','url'];
    public function course() {
        return $this->belongsTo('App\Course');
    }
}
