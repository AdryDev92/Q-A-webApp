<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQuestionsRequest;
use App\Http\Requests\QuestionAjaxFormRequest;
use App\Questions;
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
        Questions::create([
            'title' => \request('title'),
            'user_id' => Auth::user()->id,
            'slug' => str_slug(\request('title')),
            'category' => \request('category'),
            'content' => \request('content'),
            'hashtag' => \request('hashtag')
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questions  $questions
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $questions = Questions::where('slug', $slug)->first();
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
     * @param  \App\Questions  $questions
     */


    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function obtenerDatosAjax()
    {
        $questions = Questions::all();
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
     * @param Questions $questions
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {

        $questions = Questions::where('id', $id)->first();
          $questions->delete();

          return 1;
    }
}
