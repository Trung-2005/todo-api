<?php

use App\Http\Controllers\ApiAuthController;
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

// Route::post('/insert-todo', [TodoController::class, 'store']);

// // Bài 37:
// Route::get('/all-todo', [TodoController::class, 'index']);
// Route::get('show-one-todo/{id}', [TodoController::class, 'show']);
// Route::put('update-todo/{id}', [TodoController::class, 'update']);
// Route::delete('delete-todo/{todo}', [TodoController::class, 'destroy']); // {todo} -> phải giống tham số bên controller

// Bài 38: dùng resource route để tự động tạo ra các route cho các phương thức trong controller
// thay vì viết 5 route như trên thì chỉ cần viết 1 dòng này là đủ
// Route::apiResource('todos', TodoController::class);

// Bài 41: API Authentication với Laravel Sanctum
Route::post('/login', [ApiAuthController::class, 'login']);

// Nhóm các route cần xác thực bằng token
Route::middleware('auth:sanctum')->group(function() {
    Route::get('/all-todo', [TodoController::class, 'index']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});