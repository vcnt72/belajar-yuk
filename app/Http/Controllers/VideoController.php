<?php

namespace App\Http\Controllers;

use App\Course;
use App\Video;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class VideoController extends Controller
{


    public function get_details($course_id, $order) {
        $video = Video::where('order' , '=', $order)->whereHas('course', function (Builder $query) use ($course_id) {
            $query->where('id','=',$course_id);
        })->first();
        $course = Course::find($course_id);
        return view('video.get', [
           'video' => $video,
           'course' => $course
        ]);
    }
   public function add_view($course_id) {
        $course = Course::find($course_id);
        
        if($course == null) {
            abort(404);
        }
        $videos = Video::get();
        return view('video.create',[
            'course_id' => $course_id,
            'videos' => $videos
        ]);
    }
    public function addVideo(Request $req, $course_id) {
        $input = $req->validate([
            'title' => 'required|string|min:1',
            'url' => 'required|url'
        ]);

        $course = Course::find($course_id);
    
        $video = new Video([
            'title' => $input['title'],
            'url' => $input['url']
        ]);
        $video->order = $course->videos()->count() + 1;
        $video->course()->associate($course);
        $video->save();

        return back()->with('success','Berhasil menambahkan video ke ' . $course->name);
    }

    public function update_view($id) {
        $video = Video::find($id);

        if($video == null) {
            abort(404);
        }

        return view('video.update', [
            'video' => $video
        ]);
    }

    public function update(Request $req, $id) {
        $input = $req->validate([
            'url' => 'required|url'
        ]);

        $video = Video::find($id);
        $video->url = $input['url'];
        $video->save();

        return back()->with('success','Berhasil mengupdate video dari ' . $video->course->name);
    }

    public function delete($id) {
        $video = Video::find($id);
        $video->delete();
        
        return back()->with('success','Berhasil melakukan delete video dari ' . $video->url);
    }
}
