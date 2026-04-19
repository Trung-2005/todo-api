<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\Auth; // Không dùng được vì nó là namespace của container, không phải facade Auth
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ApiAuthController extends Controller
{
    public function login(Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Kiểm tra thông tin đăng nhập
        // Thử xác thực với guard web
        if (!Auth::attempt($data)) {
            return response()->json([
                'success' => false,
                'message' => 'Thông tin đăng nhập không chính xác'
             ], 401);
        }

        // Nếu đăng nhập thành công, tạo token cho user
        /** @var \App\Models\User $user */ // Thêm type hint để IDE hiểu $user là instance của User model
        $user = Auth::user();

        return response()->json([
            'success' => true,
            'message' => 'Đăng nhập thành công',
            'user' => $user,
            'token' => $user->createToken('api-token')->plainTextToken
         ], 200);
    }

    public function logout(Request $request) {
        // Xóa token hiện tại của user
        $request->user()->currentAccessToken()->delete(); // từ user lấy token hiện tại và xóa nó đi

        return response()->json([
            'success' => true,
            'message' => 'Đăng xuất thành công'
        ], 200);
    }
}
