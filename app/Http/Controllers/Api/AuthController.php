<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:100|unique:users',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tanggal_lahir' => 'required|date_format:d/m/Y',
        'telepon' => 'required|string|max:20',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6',
        'role' => 'required|string|in:user',
    ]);

    // Convert tanggal dari d/m/Y ke Y-m-d
    $tanggal_lahir = \Carbon\Carbon::createFromFormat('d/m/Y', $validated['tanggal_lahir'])->format('Y-m-d');

    $user = User::create([
        'name' => $validated['name'],
        'username' => $validated['username'],
        'jenis_kelamin' => $validated['jenis_kelamin'],
        'tanggal_lahir' => $tanggal_lahir,
        'telepon' => $validated['telepon'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'role' => 'user',
        'is_admin' => 0,
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Registrasi berhasil',
        'user' => $user,
    ], 200);
}


public function loginUser(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)
        ->where('is_admin', 0) 
        ->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Login gagal'], 401);
    }

    return response()->json([
        'user'  => $user,
        'token' => $user->createToken('flutter-token')->plainTextToken,
    ]);
}

    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}