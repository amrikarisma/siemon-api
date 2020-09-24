<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Kenotariatan\Notaris;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function show ()
    {
        $data = [];
        $id = Auth::id();
        $data = User::selectRaw('notaris.*, mst_kota_kab.*')
        ->leftJoin('notaris', 'notaris.id_notaris', '=', 'users.id_notaris')
        ->leftJoin('mst_kota_kab', 'notaris.id_kota_kab', '=', 'mst_kota_kab.id_kota_kab')
        ->where('users.id', $id)
        ->first();
        $data['foto_notaris'] =  url('foto/'.$data['foto_notaris']);
        return $data;
    }
    public function register (Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        $this->guard()->login($user);
        return response()->json([
            'user' => $user,
            'message' => 'Registrasi Berhasil'
        ], 200);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      =>  ['required', 'string', 'max:255'],
            'email'     =>  ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  =>  ['required', 'string', 'min:4']
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function guard()
    {
        return Auth::guard();
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $authuser = auth()->user();
            $token = $authuser->createToken('login');
            return response()->json([
                'message' => 'Login Berhasil',
                'token' => $token->plainTextToken
            ], 200);
        } else {
            return response()->json([
                'message' => 'Email atau Password Salah'
            ], 401);
        }
    }
    public function logout()
    {
        Auth::logout();
        // $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged Out'], 200);
    }
}
