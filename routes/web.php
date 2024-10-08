<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextSummarizationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.text-summarization.main');
});
Route::get('/connection', [TextSummarizationController::class, 'connection'])->name('connection');

Route::get('/text-summarization', [TextSummarizationController::class, 'index'])->name('text-summarization');

//show summary
Route::get('/summary/{id}', [TextSummarizationController::class, 'show'])->name('summary.show');

Route::post('/text-summarization/summarize', [TextSummarizationController::class, 'summarize'])->name('text.summarize');


//get summary

// config
Route::get('/config', [TextSummarizationController::class, 'config'])->name('config');
Route::post('/config', [TextSummarizationController::class, 'configUpdate'])->name('config.update');

// summary
Route::get('/device', [TextSummarizationController::class, 'device'])->name('device');
Route::post('/device', [TextSummarizationController::class, 'deviceStore'])->name('device.store');

