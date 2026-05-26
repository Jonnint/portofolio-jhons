<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Middleware\VisitorLogger;

Route::get('/', [PortfolioController::class, 'index'])->middleware(VisitorLogger::class);
Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('contact.submit');
Route::post('/guestbook', [PortfolioController::class, 'submitGuestbook'])->name('guestbook.submit');

Route::get('/query-db-rows', function () {
    try {
        return response()->json([
            'guestbooks' => DB::table('guestbooks')->get(),
            'messages' => DB::table('messages')->get()
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});
