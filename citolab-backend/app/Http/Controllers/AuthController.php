<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Jobs\LoginToFilemaker;

class AuthController extends Controller
{
    // public function register(Request $request)
    // {
    //     // Validar los datos de entrada
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|unique:users|max:255',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $user = User::create([
    //         'name' => $validatedData['name'],
    //         'email' => $validatedData['email'],
    //         'password' => Hash::make($validatedData['password']),
    //     ]);

    //     $accessToken = $user->createToken('authToken')->accessToken;

    //     return response(['user' => $user, 'access_token' => $accessToken]);
    // }

    public function login(Request $request)
{
    // Validar los datos de entrada
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Intentar autenticar al usuario
    if (Auth::attempt($credentials)) {
        // Autenticación exitosa
        $user = Auth::user();
        $accessToken = $user->createToken('authToken')->accessToken;

        // Retornar una respuesta con el token
        return response(['user' => $user, 'access_token' => $accessToken]);
    } else {
        // Autenticación fallida
        return response(['message' => 'Credenciales inválidas'], 401);
    }
}



    // public function logout(Request $request)
    // {
    //     $request->user()->token()->revoke();
    //     return response(['message' => 'Sesión cerrada exitosamente']);
    // }
}