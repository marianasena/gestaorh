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
Route::get('filiais/{branch}/editar/', 'BranchesController@show');
Route::patch('filiais/{branch}/editar/', 'BranchesController@update');
Route::delete('filiais/{branch}/deletar/', 'BranchesController@delete');

//Departamentos
Route::get('departamentos', 'DepartmentsController@index');
Route::get('departamentos/cadastro', 'DepartmentsController@create');