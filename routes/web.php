<?php

use App\Http\Controllers\QuestaoController;
use Illuminate\Support\Facades\Route;

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


//Login
Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('/home', 'Auth\LoginController@autenticacao')->name('login.autenticacao');
Route::post('/logout', 'Auth\LogoutController@logout')->name('logout');

//Cadastrar novo usuário
Route::get('/cadastrar', 'UserController@index')->name('registrar_usuario');
Route::post('/store', 'UserController@store')->name('salvar_usuario');

//perfil
Route::get('/perfil', ['middleware' => 'auth', 'uses' => 'PerfilController@index'])->name('perfil');

//Dashboard
Route::get('/dashboard', ['middleware' => 'auth', 'uses' => 'DashboardController@index'])->name('dashboard');

//Usuário
Route::group(['prefix' => '/usuario', 'as' => 'usuario.', 'middleware' => 'auth'], function(){
    Route::get('', 'UserController@index')->name('index');
    Route::get('/usuarios-ativos', 'UserController@listagemUsuarios')->name('listagem_usuarios');
});

//Acesso ADM
Route::group(['prefix' => '/adm', 'as' => 'adm.', 'middleware' => 'auth'], function(){

        //Disciplinas
    Route::group(['prefix' => '/disciplinas', 'as' => 'disciplinas.', 'middleware' => 'auth'], function(){
        Route::get('', 'DisciplinaController@index')->name('index');
        Route::post('/destroy/{id}', 'DisciplinaController@destroy')->name('destroy');
        Route::post('/update/{id}', 'DisciplinaController@update')->name('update');
        Route::get('/create', 'DisciplinaController@create')->name('create');
        Route::post('/store', 'DisciplinaController@store')->name('store');
    });

    //Questão
    Route::group(['prefix' => '/questoes', 'as' => 'questoes.', 'middleware' => 'auth'], function(){
        Route::get('', 'QuestaoController@index')->name('index');
        Route::get('/cadastrar-questao', 'QuestaoController@create')->name('create');
        Route::get('/busca-topicos/{id}', 'QuestaoController@buscaTopico')->name('busca_topico');
        Route::post('/store', 'QuestaoController@store')->name('store');
        Route::post('/destroy/{id}', 'QuestaoController@destroy')->name('destroy');
        Route::post('/update/{id}', 'QuestaoController@update')->name('update');
        Route::get('/edit/{id}', 'QuestaoController@edit')->name('edit');
        Route::get('/selecionar-questoes', 'QuestaoController@selectQuestao')->name('select_questao');
    });

    //Tópicos
    Route::group(['perfix' => '/topicos', 'as' => 'topicos.', 'middleware' => 'auth'], function(){
        Route::get('/topicos', 'TopicoController@index')->name('index');
        Route::post('/destroy/{id}', 'TopicoController@destroy')->name('destroy');
        Route::post('/update/{id}', 'TopicoController@update')->name('update');
        Route::post('/store/{id}', 'TopicoController@store')->name('store');
    });

    //Atividade
    Route::group(['prefix' => '/atividades', 'as' => 'atividades.', 'middleware' => 'auth'], function(){
        Route::get('', 'AtividadeController@index')->name('index');
        Route::get('/cadastrar-atividade', 'AtividadeController@create')->name('create');
        Route::post('/store', 'AtividadeController@storeAtividade')->name('store_atividade');
        Route::post('/destroy/{id}', 'AtividadeController@destroy')->name('destroy');
        Route::post('/edit/{id}', 'AtividadeController@edit')->name('edit');
        Route::get('/busca-questao/{id}', 'AtividadeController@buscaQuestao')->name('busca_questao');
    });

});

