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

Route::get('/', function () {
    return view('welcome');
});


// Authentication routes...
Route::get('auth/login', 'Front@login');
Route::post('auth/login', 'Front@authenticate');
Route::get('auth/logout', 'Front@logout');

Route::get('/checkout', [
    'middleware' => 'auth',
    'uses' => 'Front@checkout'
]);

// route to show the login form
Route::get('login', 'UserController@showLogin');



//Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('solicitacao/desligamento', function (){
    return view('unemployments.create');
}
);

//Filiais
Route::get('filiais', 'BranchesController@index');
Route::get('filiais/cadastro', 'BranchesController@create');
Route::post('filiais', 'BranchesController@store');
Route::get('filiais/{branch}/editar/', 'BranchesController@edit');
Route::patch('filiais/{branch}/editar/', 'BranchesController@update');
Route::delete('filiais/{branch}/deletar/', 'BranchesController@destroy');

//Departamentos
Route::get('departamentos', 'DepartmentsController@index');
Route::post('departamentos', 'DepartmentsController@store');
Route::get('departamentos/cadastro', 'DepartmentsController@create');
Route::get('departamentos/{department}/editar/', 'DepartmentsController@edit');
Route::patch('departamentos/{department}/editar/', 'DepartmentsController@update');
Route::delete('departamentos/{department}/deletar/', 'DepartmentsController@destroy');

//Solicitação de Desligamento
Route::get('solicitar/desligamento', function(){
    return view('solicitacao');
});

//Cargo
Route::get('cargos', 'RolesController@index');
Route::post('cargos', 'RolesController@store');
Route::get('cargos/cadastro', 'RolesController@create');
Route::get('cargos/{role}/editar/', 'RolesController@edit');
Route::patch('cargos/{role}/editar/', 'RolesController@update');
Route::delete('cargos/{role}/deletar/', 'RolesController@destroy');

//Funcionário
Route::get('funcionarios', 'EmployeesController@index');
Route::post('funcionarios', 'EmployeesController@store');
Route::get('funcionarios/cadastro', 'EmployeesController@create');
Route::get('funcionarios/{employee}/editar/', 'EmployeesController@edit');
Route::patch('funcionarios/{employee}/editar/', 'EmployeesController@update');
Route::delete('funcionarios/{employee}/deletar/', 'EmployeesController@destroy');