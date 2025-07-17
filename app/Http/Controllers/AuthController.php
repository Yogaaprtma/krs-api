<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaDinus;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nim_dinus' => 'required|string',
            'pass_mhs' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Cek kredensial
        $credentials = $request->only('nim_dinus', 'pass_mhs');
        $user = MahasiswaDinus::where('nim_dinus', $credentials['nim_dinus'])
            ->where('pass_mhs', $credentials['pass_mhs'])
            ->first();

        if ($user) {
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
