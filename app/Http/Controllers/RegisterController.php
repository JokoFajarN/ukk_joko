<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    public function index()
    {
        return view('login.register');
    }

    public function post(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'namaLengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'namaLengkap' => $request->namaLengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
        }

        return redirect()->route('register')->with('error', 'Gagal melakukan registrasi. Silakan coba lagi.');
    }
}
