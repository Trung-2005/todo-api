<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Http\Resources\TodoResource;

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

    public function index() {
        $todo = Todo::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Hiện thị dữ liệu trong bảng',
            'data' => TodoResource::collection($todo) // trả về dữ liệu sau khi đã được format bởi TodoResource
            // conllection() dùng để trả về nhiều dữ liệu, nếu chỉ trả về 1 dữ liệu thì dùng new TodoResource($todo)
        ], 201);
    }

    public function show($id) {
        $todo = Todo::find($id);

        return response()->json([
            'success' => true,
            'message' => "Lấy từng dữ liệu trong bảng",
            'data' => new TodoResource($todo) 
        ], 201);
    }

    public function update(TodoRequest $request, $id) {
        $todo = Todo::findOrFail($id); 
        // Model instal
        $todo->update($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật thông tin thành công',
            'data' => $todo
        ], 200);
    }

    public function destroy(Todo $todo) {
        // $todo = Todo::findOrFail($id); néu dùng thêm dòng này thì đối số truyền vào sẽ như này: destroy($id) và các cả dòng này: $todo->delete();
        // nếu viết mỗi $todo->delete(); thì đối số sẽ như trên và route cũng phải cùng tham số đó
        $todo->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xoá thành công',
            'data' => null
        ], 200);
    }
}
