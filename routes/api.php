<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

// Mặc định Laravel sẽ thêm prefix '\api'
Route::get('/test', function() {
    return response()->json([
        'success' => true,
        'message' => 'Test API thành công',
        'status code' => 200
    ], 200); 
});

Route::post('/insert-todo', [TodoController::class, 'store']);