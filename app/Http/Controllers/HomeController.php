<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_issues;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user= User::all();
        $issues = User_issues::select('user_issue.*', 'users.name')
        ->join('users' , 'users.id', 'user_issue.created_by')
        ->get();
        return view('home', with(['user' => $user , 'issues' => $issues]));
    }
}
