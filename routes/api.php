<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// HOME (PageHome)
Route::get('/users', 'Api\UserController@index')->name('users.index');
// PAGINA RICERCA AVANZATA COI RISULTATI (PageSearchDoctors)
Route::get('/users/search', 'Api\UserController@search')->name('users.search');
// PAGINA SHOW DEL SINGOLO DOTTORE (PageDoctor)
Route::get('/users/{user}', 'Api\UserController@show')->name('users.show');
// PAGINA PER INVIARE MESSAGGIO A DOTTORE SPECIFICO (PageMessage)
Route::post('/users/{user}/message', 'Api\MessageController@store')->name('messages.store');
// PAGINA SCRIVERE RECENSIONE A DOTTORE SPECIFICO (PageReview)
Route::post('/users/{user}/review', 'Api\ReviewController@store')->name('reviews.store');
