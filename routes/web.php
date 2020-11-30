<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();



Route::group(['middleware' => 'auth'], function () {
		Route::resource('index', 'IndexController');
		Route::resource('tipoambiente', 'TipoAmbienteController');
		Route::resource('tipousuario', 'TipoUsuarioController');
		Route::resource('ambiente', 'AmbienteController')->except(['status']);
		Route::resource('selecaoambiente', 'SelecaoAmbienteController')->except(['create', 'update', 'edit', 'show', 'delete']);
		Route::resource('meusagendamentos', 'MeusAgendamentosController');
		Route::resource('novoagendamento', 'NovoAgendamentoController')->except(['index']);
		Route::resource('motivoutilizacao', 'MotivoUtilizacaoController')->except(['status']);
		Route::resource('perfil', 'ClientePerfilController');
		Route::resource('disciplina', 'DisciplinaController')->except(['status']);
		Route::resource('curso', 'CursoController')->except(['status']);
		Route::resource('noticia', 'NoticiaController');
		Route::resource('user', 'UserController')->except(['status']);
		Route::resource('confirmaragendamento', 'ConfirmarAgendamentoController');
		Route::get('novoagendamento/{id}/calendario','NovoAgendamentoController@index')->name('novoagendamento.index');
		Route::get('novoagendamento/{id}/termosdeuso', 'NovoAgendamentoController@termosdeuso')->name('novoagendamento.termosdeuso');
		Route::get('/relatorio/geral', 'GeralController@index')->name('relatorio.geral');
		Route::get('/relatorio/professor', 'ProfessorController@index')->name('relatorio.professor');
		Route::get('/relatorio/operacional', 'RelatorioOperacionalController@index')->name('relatorio.operacional');
		Route::get('/relatorio/pdf/geral', 'AgendamentoController@gerarRelatorioGeral')->name('relatorio.gerarRelatorioGeral');
		Route::get('/relatorio/pdf/professor', 'AgendamentoController@gerarRelatorioProf')->name('relatorio.gerarRelatorioProf');
		Route::get('/relatorio/pdf/operacional', 'AgendamentoController@gerarRelatorioOperacional')->name('relatorio.gerarRelatorioOperacional');
		Route::post('/ambiente/{id}/status', 'AmbienteController@status')->name('ambiente.status');
		Route::post('/disciplina/{id}/status', 'DisciplinaController@status')->name('disciplina.status');
		Route::post('/confirmaragendamento/{id}/confirma', 'AgendamentoController@confirma')->name('agendamentos.confirma');
		Route::post('/confirmaragendamento/{id}/rejeita', 'AgendamentoController@rejeita')->name('agendamentos.rejeita');
		Route::post('/curso/{id}/status', 'CursoController@status')->name('curso.status');
		Route::post('/user/{id}/status', 'UserController@status')->name('user.status');
		Route::post('/motivo/{id}/status', 'MotivoUtilizacaoController@status')->name('motivo.status');
		Route::post('/tipoambiente/{id}/status', 'TipoAmbienteController@status')->name('tipoambiente.status');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});


