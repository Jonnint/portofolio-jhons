<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Middleware\VisitorLogger;

Route::get('/', [PortfolioController::class, 'index'])->middleware(VisitorLogger::class);
Route::post('/contact', [PortfolioController::class, 'submitContact'])->name('contact.submit');
Route::post('/guestbook', [PortfolioController::class, 'submitGuestbook'])->name('guestbook.submit');

Route::get('/debug-db', function () {
    $results = [];
    
    // 1. Connection check
    try {
        $db = DB::connection()->getDatabaseName();
        $results['database'] = $db;
    } catch (\Exception $e) {
        $results['database_error'] = $e->getMessage();
    }
    
    // 2. Tables list
    try {
        $tables = Schema::getTableListing();
        $results['tables'] = $tables;
        
        foreach (['messages', 'guestbooks', 'comments'] as $table) {
            if (Schema::hasTable($table)) {
                $results['schema'][$table] = Schema::getColumnListing($table);
            } else {
                $results['schema'][$table] = 'NOT FOUND';
            }
        }
    } catch (\Exception $e) {
        $results['schema_error'] = $e->getMessage();
    }

    // 3. Log file check
    try {
        $logPath = storage_path('logs/laravel.log');
        if (file_exists($logPath)) {
            $logContent = file_get_contents($logPath);
            $lines = explode("\n", $logContent);
            $results['logs'] = array_slice($lines, -50);
        } else {
            $results['logs'] = 'Log file not found';
        }
    } catch (\Exception $e) {
        $results['log_error'] = $e->getMessage();
    }
    
    return response()->json($results);
});
