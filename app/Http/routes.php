<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('grupo', ['as' => 'grupo', 'uses' => 'GruposController@index']);
Route::get('articulo', ['as' => 'articulo', 'uses' => 'ArticulosController@index']);
Route::get('tag', ['as' => 'tag', 'uses' => 'TagsController@index']);
Route::get('asignartag', ['as' => 'asignartag', 'uses' => 'TagsController@asignarTag']);
Route::post('guardatag', ['as' => 'guardatag', 'uses' => 'TagsController@guardaTag']);
Route::post('buscar', ['as' => 'articulo.buscar', 'uses' => 'ArticulosController@buscar']);
Route::get('buscar', ['as' => 'articulo.buscar', 'uses' => 'ArticulosController@buscar']);


Route::model('articulo', 'Samira\Articulos\Articulo');
Route::resource('articulo', 'ArticulosController');

Route::model('grupo', 'Samira\Grupos\Grupo');
Route::resource('grupo', 'GruposController');

Route::model('tag', 'Samira\Tags\Tag');
Route::resource('tag', 'TagsController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('ajaxislemi', function()
{
    $articulo_id=\Input::get('category_id');
    $datos=DB::table('grupos')->where('id', '=', $articulo_id)->get();
    return Response::json($datos);

});

Route::get('selecgrupos', function()
{
    $grupo_id=\Input::get('category_id');
    $datos=DB::table('articulos')->where('grupos_id', '=', $grupo_id)->get();
    return Response::json($datos);

});
Route::get('prueba', function()
{
    $grupo= new \Samira\Grupos\Grupo();
    $grupo->id='1';
    dd($grupo->articulos);
});