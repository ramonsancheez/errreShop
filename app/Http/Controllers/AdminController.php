<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $users = User::all();
        return view('admin.index',  ['transactions' => $transactions, 'users' => $users]);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        Transaction::where('buyer_id', $user->id)->delete();

        $user->delete();

        return redirect()->route('admin.index')->with('status', 'Usuario eliminado correctamente');
    }


}