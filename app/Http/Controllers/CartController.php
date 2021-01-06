<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function get(Request $req) {
        $user = $req->user();

        $courses = $user->courses;
        return view('cart.get',[
            'courses' => $courses
        ]);
    }
    public function add(Request $req, $course_id) {
        $user = $req->user();
        $user->courses()->attach($course_id);
        $user->save();
        return back()->with('success', 'Berhasil menambahkan cart');
    }

    public function delete(Request $req,$course_id) {
        $user = $req->user();
        $user->courses()->detach($course_id);
        $user->save();
        return back()->with('success', 'Berhasil menghapus cart');
    }
}
