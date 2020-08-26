<?php

use Illuminate\Http\Request;
use App\LogEvent;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/eventjson', 'LogEventController@datatables');

Route::get('event', function() {
    return LogEvent::take(10)->get();
});

Route::get('event/{id}', function($id) {
    return LogEvent::find($id);
});
