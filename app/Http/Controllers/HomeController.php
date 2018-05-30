<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Questions::latest()->paginate(10);
        $user = Auth::user();

        return view('home',compact('questions','user'));
    }
}
