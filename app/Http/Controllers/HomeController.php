<?php

namespace App\Http\Controllers;

use App\Models\UserRecored;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $users_records=UserRecored::count();
        return view('dashboard',compact('users_records'));
    }
}
