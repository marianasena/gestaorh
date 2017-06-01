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

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::get('login_teste', function(){
    return view('auth.login2');
});

Route::get('/checkout', [
    'middleware' => 'auth',
    'uses' => 'Front@checkout'
]);

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();


Route::get('solicitacao/desligamento', function (){
    return view('unemployments.create');
}
);

/*
|--------------------------------------------------------------------------
| Filiais
|--------------------------------------------------------------------------
*/
Route::get('filiais', 'BranchesController@index')->name('filiais');
Route::get('filiais/cadastro', 'BranchesController@create')->name('filiais/cadastro');
Route::post('filiais', 'BranchesController@store');
Route::get('filiais/{branch}/editar/', 'BranchesController@edit');
Route::patch('filiais/{branch}/editar/', 'BranchesController@update');
Route::delete('filiais/{branch}/deletar/', 'BranchesController@destroy');

/*
|--------------------------------------------------------------------------
| Departamentos
|--------------------------------------------------------------------------
*/
Route::get('departamentos', 'DepartmentsController@index');
Route::post('departamentos', 'DepartmentsController@store');
Route::get('departamentos/cadastro', 'DepartmentsController@create');
Route::get('departamentos/{department}/editar/', 'DepartmentsController@edit');
Route::patch('departamentos/{department}/editar/', 'DepartmentsController@update');
Route::delete('departamentos/{department}/deletar/', 'DepartmentsController@destroy');

/*
|--------------------------------------------------------------------------
| Usuários
|--------------------------------------------------------------------------
*/
Route::get('usuarios', 'UsersController@index')->name('usuarios');
Route::post('usuarios', 'UsersController@store');
Route::get('usuarios/cadastro', 'UsersController@create');
Route::get('usuarios/{user}/editar/', 'UsersController@edit'); /*
Route::patch('departamentos/{department}/editar/', 'DepartmentsController@update');
Route::delete('departamentos/{department}/deletar/', 'DepartmentsController@destroy');

/*
|--------------------------------------------------------------------------
| Solicitação de Desligamento
|--------------------------------------------------------------------------
*/
Route::get('solicitacoes/desligamento/nova', 'UnemploymentRequestsController@create');
Route::get('solicitacoes/desligamento', 'UnemploymentRequestsController@index');
Route::post('solicitacoes/desligamento', 'UnemploymentRequestsController@store')->name('unemployment_request_store');

/*
|--------------------------------------------------------------------------
| Cargo
|--------------------------------------------------------------------------
*/
Route::get('cargos', 'RolesController@index');
Route::post('cargos', 'RolesController@store');
Route::get('cargos/cadastro', 'RolesController@create');
Route::get('cargos/{role}/editar/', 'RolesController@edit');
Route::patch('cargos/{role}/editar/', 'RolesController@update');
Route::delete('cargos/{role}/deletar/', 'RolesController@destroy');

/*
|--------------------------------------------------------------------------
| Funcionário
|--------------------------------------------------------------------------
*/
Route::get('getEmployees', 'EmployeesController@getAll')->name('getEmployees');
Route::get('funcionarios', 'EmployeesController@index');
Route::post('funcionarios', 'EmployeesController@store');
Route::get('funcionarios/cadastro', 'EmployeesController@create');
Route::get('funcionarios/{employee}/editar/', 'EmployeesController@edit');
Route::patch('funcionarios/{employee}/editar/', 'EmployeesController@update');
Route::delete('funcionarios/{employee}/deletar/', 'EmployeesController@destroy');


Route::group(['prefix' => 'configuracoes'], function () {

    /*
    |--------------------------------------------------------------------------
    | Razão de Desligamento
    |--------------------------------------------------------------------------
    */

    Route::get('motivosdesligamento', 'UnemploymentReasonsController@index')->name('unemployment_reasons');
    Route::get('motivosdesligamento/cadastro', 'UnemploymentReasonsController@create')->name('unemployment_reason_create');
    Route::post('motivosdesligamento', 'UnemploymentReasonsController@store')->name('unemployment_reason_store');
    Route::get('motivosdesligamento/{unemploymentReason}/editar/', 'UnemploymentReasonsController@edit')->name('unemployment_reason_edit');
    Route::patch('motivosdesligamento/{unemploymentReason}/editar/', 'UnemploymentReasonsController@update')->name('unemployment_reason_update');
    Route::delete('motivosdesligamento/{unemploymentReason}/deletar/', 'UnemploymentReasonsController@destroy')->name('unemployment_reason_destroy');


    //Aprovadores
    Route::get('aprovadores', 'ApproversController@index')->name('approvers');
    Route::get('aprovadores/cadastro', 'ApproversController@create')->name('approver_create');
    Route::post('aprovadores', 'ApproversController@store')->name('approver_store');
    Route::delete('aprovadores/{approver}/deletar/', 'ApproversController@destroy')->name('approver_destroy');

    //Gerentes
    Route::get('managers', 'ApproversController@index')->name('managers');

});

    /*
    |--------------------------------------------------------------------------
    | Validação de Desligamento
    |--------------------------------------------------------------------------
    */

    Route::get('validacoesdesligamento', 'UnemploymentVerificationsController@index')->name('unemployment_verifications');
    Route::get('validacoesdesligamento/cadastro', 'UnemploymentVerificationsController@create')->name('unemployment_verification_create');
    Route::post('validacoesdesligamento', 'UnemploymentVerificationsController@store')->name('unemployment_verification_store');
    Route::get('validacoesdesligamento/{unemploymentVerification}/editar/', 'UnemploymentVerificationsController@edit')->name('unemployment_verification_edit');
    Route::patch('validacoesdesligamento/{unemploymentVerification}/editar/', 'UnemploymentVerificationsController@update')->name('unemployment_verification_update');
    Route::delete('validacoesdesligamento/{unemploymentVerification}/deletar', 'UnemploymentVerificationsController@destroy')->name('unemployment_verification_destroy');
