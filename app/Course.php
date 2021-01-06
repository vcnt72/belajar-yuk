<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    public $timestamps = false;


    protected $fillable = ["name", "price", "description","thumbnail_url"];
    //

    public function transactions()
    {
        return $this->belongsToMany('App\Transaction');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function course_category()
    {
        return $this->belongsTo('App\CourseCategory');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
