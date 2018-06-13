<?php

namespace App\Http\Controllers;

use App\Hashtag;
use App\Http\Requests\CreateQuestionsRequest;
use App\Http\Requests\QuestionAjaxFormRequest;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::latest()->paginate(10);

        return view('home',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }


    /**
     * @param QuestionAjaxFormRequest $request
     * @return array
     */
    public function validarAjax(QuestionAjaxFormRequest $request){
        return array();
    }


    /**
     * @param CreateQuestionsRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateQuestionsRequest $request)
    {
        $hashtags = explode(", ",\request('hashtag'));

        $question = Question::create([
            'title' => \request('title'),
            'user_id' => Auth::user()->id,
            'slug' => str_slug(\request('title')),
            'category' => \request('category'),
            'content' => \request('content'),
            'hashtag' => \request('hashtag')
        ]);


        foreach ($hashtags as $hashtag){
            $hashtag = Hashtag::firstOrCreate([
                'name' => $hashtag,
                'slug' => str_slug($hashtag)
            ]);
            $question->hashtags()->attach($hashtag);
        }
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $questions
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $questions = Question::where('slug', $slug)->first();
        return view('questions.question', ['question' => $questions]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question $questions
     * @return void
     */
    public function edit(Question $questions)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cargarDatos()
    {
        return view('questions.load_data');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $questions
     */


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function obtenerDatosAjax()
    {
        $questions = Question::all();
        return $questions;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Support\Collection
     */
    public function obtenerDatosAjaxCadaUno(Request $request)
    {
        $posicionInicial = $request->get("posicionInicial");
        $numElementos = $request->get("numeroElementos");
        $questions = DB::table("questions")
            ->offset($posicionInicial)
            ->limit($numElementos)
            ->get();
        return $questions;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function cargarVista(Request $request){
        $posicionInicial = $request->get("posicionInicial");
        $numElementos = $request->get("numeroElementos");
        $questions = DB::table("questions")
            ->offset($posicionInicial)
            ->limit($numElementos)
            ->get();

        $vista = view('questions.viewQuestion', ['questions' => $questions]);

        return $vista;

    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {

        $questions = Question::where('id', $id)->first();
          $questions->delete();

          return 1;
    }
}
