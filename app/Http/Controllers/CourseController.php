<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{

    public function my_course(Request $req) {
        $user = $req->user();
        $courses = Course::whereHas('transactions.user', function(Builder $query) use ($user){
            $query->where('id' , '=', $user->id);
        })->get();

        return view('course.my', [
            'courses' => $courses
        ]);
    }

    public function get() {
        $courses = Course::paginate(10);
        return view('course.get',[
            'courses' => $courses,
        ]);
    }

    public function get_one($id) {
        $course = Course::find($id);
        return view('course.get_details', [
            'course' => $course
        ]);
    }

    public function create_view() {
        $categories = CourseCategory::get();
        return view('course.create', [
            'categories' => $categories
        ]);
    }

    public function create(Request $req) {

        if($req->has('thumbnail_img')) {
            if($req->file('thumbnail_img')->isValid()) {
                $input = $req->validate([
                    'name' => 'required|string|min:1',
                    'description' => 'required|string|min:5',
                    'price' => 'required|numeric|min:1000',
                    'course_category_id' => 'required|numeric|filled',
                    "thumbnail_img" => "mimes:png,jpg|max:16000"
                ]);
        
                $category = CourseCategory::find($input['course_category_id']);
        
                $extension = $req->file('thumbnail_img')->extension();
                $req->file('thumbnail_img')->storeAs('public/images',$input['name'] . "." . $extension);
                $url = Storage::url('images/') . $input['name'] . "." . $extension;

                $course = Course::create([
                    'name' => $input['name'],
                    'description' => $input['description'],
                    'price' => $input['price'],
                    'thumbnail_url' => $url
                ]);

                $course->course_category()->associate($category);
                $course->save();
            }
        }

        return back()->with('success','Course telah berhasil ditambahkan');
    }


    public function delete($id){
        $course = Course::find($id);
        $course->delete();
        return back()->with('success','Course ' . $course->name . ' telah berhasil di delete');
    }


    public function update_view($id) {
        $course = Course::find($id);
        $categories = CourseCategory::get();
        return view('course.update', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    public function update(Request $req, $id) {
        if($req->has('thumbnail_img')) {
            if($req->file('thumbnail_img')->isValid()) {
                $input = $req->validate([
                    'name' => 'required|string|min:1',
                    'description' => 'required|string|min:20',
                    'price' => 'required|numeric|min:1000',
                    'course_category_id' => 'required|numeric',
                    "thumbnail_img" => "mimes:png,jpg|max:16000"
                ]);
                $extension = $req->thumbnail_img->extension();
                $req->file('thumbnail_img')->storeAs('public/images',$input['name'] . "." . $extension);
                $url = Storage::url('images/') . $input['name'] . "." . $extension;

                $course = Course::find($id);
                $category = CourseCategory::find($id);

                $course->name = $input['name'];
                $course->description = $input['description'];
                $course->price = $input['price'];
                $course->thumbnail_url = $url;
                $course->course_category()->associate($category);
                $course->save();
                return back()->with('success','Course ' . $course->id . ' berhasil di update');
            }
        }
    }
}
