<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-cache', function () {
    // demo
    // Cache::put('demo', 'Value demo', 60); // Lưu trữ giá trị 'Value demo' với khóa 'demo' trong cache tồn tại trong 60 giây
    // // Cache::forget('demo'); // Xóa giá trị cache với khóa 'demo'
    // $checkDemo = Cache::has('demo');
    // $valueDemo = Cache::get('demo');

    // dùng remember để lưu trữ giá trị trong cache lâu hơn, nếu đã tồn tại thì sẽ trả về giá trị cũ, nếu chưa tồn tại thì sẽ lưu trữ giá trị mới
    // Nếu ở trên đã tồn tại giá trị 'demo' trong cache thì sẽ trả về giá trị cũ, nếu chưa tồn tại thì sẽ lưu trữ giá trị mới 'Value demo 2' trong cache tồn tại trong 120 giây
    Cache::remember('demo', 120, function () {
        return 'Value demo 2';
    });
    $valueDemo = Cache::get('demo');
    return response()->json([
        // 'checkDemo' =>$checkDemo,
        'valueDemo' => $valueDemo
    ]);
});
