<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    public function store(TodoRequest $request) {
        $todo = Todo::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Test insert thành công',
            'data' => $todo
        ], 201);
    }
}
