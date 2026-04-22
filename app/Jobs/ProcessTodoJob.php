<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;

class ProcessTodoJob implements ShouldQueue
{
    use Queueable;

    public $todo;
    /**
     * Create a new job instance.
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // trước khi xử lý job, log ra id của todo để kiểm tra
        Log::info("Trước khi xử lý { $this->todo->id }");

        // logic xử lý job ở đây
        sleep(15); // giả lập thời gian xử lý lâu

        // sau khi xử lý xong, log ra id của todo để kiểm tra
        Log::info("Sau khi xử lý { $this->todo->id }");
    }
}
