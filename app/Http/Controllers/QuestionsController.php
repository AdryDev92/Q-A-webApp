<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionsRequest;
use App\Http\Requests\QuestionAjaxFormRequest;
use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Question\Question;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Questions::latest()->paginate(10);

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validarAjax(QuestionAjaxFormRequest $request){
        return array();
    }

    public function store(CreateQuestionsRequest $request)
    {
        Questions::create([
            'title' => \request('title'),
            'slug' => str_slug(\request('title')),
            'category' => \request('category'),
            'content' => \request('content'),
            'hashtag' => \request('hashtag')
        ]);

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show(Questions $questions)
    {
        return view('questions.question', ['question' => $questions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questions $questions
     * @return void
     */
    public function edit(Questions $questions)
    {
        //
    }

    public function cargarDatos()
    {
        return view('questions.load_data');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questions $questions)
    {
        //
    }


    public function obtenerDatosAjax()
    {
        $questions = Questions::all();
        return $questions;
    }

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
     * Remove the specified resource from storage.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questions $questions)
    {
        //
    }
}
