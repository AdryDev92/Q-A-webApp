<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

//Rutas que se ven cuando estas logeado
Route::group(['middleware' => 'auth'], function(){

    //Create
    Route::get('/questions/create','QuestionsController@create')->name("crearPregunta"); //completado
    Route::post('/questions/create', 'QuestionsController@store'); //completado
    Route::post('/questions/{slug}/comments', 'CommentsController@store');

    //Read
    Route::get('/questions/load_data','QuestionsController@cargarDatos');
    Route::get('/questions/obtenerDatos', 'QuestionsController@obtenerDatosAjax');
    Route::post('/questions/obtenerCadaDato', 'QuestionsController@obtenerDatosAjaxCadaUno');
    Route::post('/questions/vistaPregunta','QuestionsController@cargarVista');
    Route::get('/questions/{question}', 'QuestionsController@show');

    //Update
    /*Route::get('/questions/edit/{slug}', 'QuestionsController@edit');
    Route::get('/questions/update/{slug}', 'QuestionsController@update');*/

    Route::get('/questions/{slug}/edit/info', 'QuestionsController@edit')->name('question.edit');
    Route::patch('/questions/{slug}/edit/info', 'QuestionsController@update');

    //Delete
    Route::delete('/questions/destroy/{id}', 'QuestionsController@destroy')->name("deleteElement"); //completado

    //Profile
    Route::get('/user/{user}', 'UserController@show')->name("profile");
    Route::get ('/user/edit/{user}', 'UserController@edit')->name("settings");

    //Admin routes
    Route::get('/admin', 'AdminController@index')->name('admin.panel'); //funciona
    Route::get('/admin/questions', 'QuestionsController@adminIndex')->name('admin.questions');
    Route::get('/admin/questions/create', 'QuestionsController@create'); //funciona
    Route::post('/admin/questions', 'QuestionsController@store');
    Route::get('/admin/questions/{slug}/edit', 'QuestionsController@edit')->name('questions.edit');
    Route::patch('/admin/questions/{slug}', 'QuestionsController@patch')->name('questions.patch');

});

    Route::post('/questions/validate','QuestionsController@validarAjax');
    Route::get('/questions','QuestionsController@show');


