<?php

namespace App\Http\Controllers;

use App\CourseCategory;
use Illuminate\Http\Request;

class CourseCategoryController extends Controller
{


    public function get() {
        $course_categories = CourseCategory::paginate(5);
        return view('course-category.get',[
            'course_categories' => $course_categories
        ]);
    }

    public function create_view() {
        return view('course-category.create');
    }


    public function create(Request $req) {
        $input = $req->validate([
            'name' => 'required|string|min:1'
        ]);

        $course_category = CourseCategory::create([
            'name' => $input['name']
        ]);

        $course_category->save();

        return back()->with('success', 'Success menambah kategori course');
    }

    public function update_view($id) {
        $course_category = CourseCategory::find($id);
        return view('course-category.update', [
            'course_category' => $course_category
        ]);
    }

   public function update(Request $req, $id) {
        $input = $req->validate([
            'name' => 'required|string|min:1'
        ]);

        $course_category = CourseCategory::find($id);
        $course_category->name = $input['name'];
        $course_category->save();

        return back()->with('success','Berhasil melakukan update pada ' . $course_category->id);
    }

    public function delete($id) {
        $course_category = CourseCategory::find($id);

        $course_category->delete();

        return back()->with('success','Berhasil melakukan delete pada ' . $course_category->name);
    }
}
