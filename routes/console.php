<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Log;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule::call(function() {
//     Log::info('Lên lịch chạy lúc này: '.now());
// })->everyMinute();

// Lên lịch chạy command
Schedule::command('app:todo-command')->everyMinute();