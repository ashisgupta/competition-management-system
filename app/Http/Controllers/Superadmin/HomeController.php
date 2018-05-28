<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Paper;
use App\Review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.check');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //dd(Auth::User()->role->name);
        $judges = User::whereIn("role_id",[3,2])->get();
        $students = User::where("role_id",4)->get();
        $papercount = Paper::count();
        $reviewcount = Review::count();
        $page_title = "Dashboard";
        return view('home', compact("page_title","judges","students","papercount","reviewcount"));
    }
}
