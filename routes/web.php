<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Mail\ProjectHasChangedMail;
use App\Repositories\ProjectRepository;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/project',[ProjectController::class, 'indexPage']);
Route::get('/project/create', [ProjectController::class, 'createPage']);
Route::get('/project/edit/{id}', [ProjectController::class, 'updatePage']);

