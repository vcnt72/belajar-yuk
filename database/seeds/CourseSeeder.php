<?php

use App\Course;
use App\CourseCategory;
use App\Video;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course();
        $course_category = CourseCategory::where('name' ,'=', 'technology')->first();

        $course->name = 'Gin Gonic Golang';
        $course->description = 'test test';
        $course->price = 200000;
        $course->thumbnail_url = 'gin.png';
        $course->save();

        $course->course_category()->associate($course_category);
        $course->videos()->saveMany([
            new Video(
                [
                    'title' => 'Golang / Go Gin Framework Crash Course 01 | Getting Started',
                    'url' => 'https://www.youtube.com/embed/qR0WnWL2o1Q?list=PL3eAkoh7fypr8zrkiygiY1e9osoqjoV9w',
                    'order' => 1
                ] 
            ),
            new Video(
                [
                    'title' => 'Golang / Go Gin Framework Crash Course 02 | Middlewares 101: Authorization, Logging and Debugging',
                    'url' => 'https://www.youtube.com/embed/Ypwv1mFZ5vU?list=PL3eAkoh7fypr8zrkiygiY1e9osoqjoV9w',
                    'order' => 2
                ]
            ),
            new Video(
                [
                    'title' => 'Golang Gin Framework Crash Course 03 | Data Binding and Validation',
                    'url' => 'https://www.youtube.com/embed/lZsbPtGfGIs?list=PL3eAkoh7fypr8zrkiygiY1e9osoqjoV9w',
                    'order' => 3
                ]
            )
        ]);
    }
}
