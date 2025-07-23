<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuranController;
// Route::get('/', function () {
//     return view('welcome');
// });
route::get("/", [QuranController::class,"getsurahdata"]);
route::get('/read/{num}',[QuranController::class,"getsurahtext"]);

