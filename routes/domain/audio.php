<?php

use App\Http\Controllers\AudioController;
use Illuminate\Support\Facades\Route;

Route::get('/audios', [AudioController::class, 'index'])
    ->name('audio_index');
