<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;

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

        return view('home',compact('questions'));
    }
}
