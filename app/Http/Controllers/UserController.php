<?php

namespace App\Http\Controllers;

use App\Questions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function search($nick)
    {
        $user = User::with('nick',
            $nick)->first();
        $questions = $user->hasManyQuestions()
            ->latest();

        return view('users.postList',
            [
                'questions' => $questions,
                'user' => $user
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        #first() devuelve el primer resultado. get() te devuelve una coleccion
        $user = User::where('slug', $slug)->first();

        #comprobamos que el user_id del question coincide con el id del user
        $questions = Questions::where('user_id', $user->id)->get();

        return view('users.profile',
            [
                'profile' => $user,
                'questions' => $questions
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        $user = User::where('id', $id)->first();

        return view('users.settings',
            [
                'user' => $user
            ]);
    }*/

    public function edit()
    {
//        $user = User::find($id)->first();
        return view('users.settings',
            array('user' => Auth::user())
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
