<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function create(Request $req) {
        $user = $req->user();
        $course = $user->courses;
        $transaction = new Transaction([
            'transaction_no' => 'ORD' . now()->unix()
        ]);
        $course_ids = $course->pluck('id');
        $transaction->user()->associate($user);
        $transaction->save();
        $transaction->courses()->attach($course_ids);
        $transaction->save();
        $user->courses()->detach();
        $user->save();
        return back()->with('success','Sukses membuat transaksi');
    }

    public function get(Request $req) {
        $user = $req->user();


        $transactions = $user->transactions;
        return view('transaction.get', [
            'transactions' => $transactions
        ]);
    }

    public function get_details($id) {
        $transaction = Transaction::find($id);

        return view('transaction.get_detail', [
            'transaction' => $transaction
        ]);
    }
}
