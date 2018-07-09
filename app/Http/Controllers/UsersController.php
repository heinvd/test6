<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function listUsers()
    {
        $userss = DB::table('users')->get();
        return view('adminUsers')->with('userss', $userss);
    }
}
