<?php

use Illuminate\Support\Facades\Route;
use App\Events\TaskEvent;
use App\Events\TaskEventTwo;

use Illuminate\Http\Request;


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

Route::get('userOne', function () {
    return view('userOne');
});

Route::get('userTwo', function () {
    return view('userTwo');
});

Route::get('eventOne', function (Request $request) {
    $messageOne = $request->messageOne;
    event(new TaskEvent($messageOne));
});

Route::get('eventTwo', function (Request $request) {
    $messageTwo = $request->messageTwo;
    event(new TaskEventTwo($messageTwo));
});

Route::get('listen', function () {
    return view('listenBroadcast');
});