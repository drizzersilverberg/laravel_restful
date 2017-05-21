<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = [
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ];

        $response = [
            'msg' => 'User created',
            'user' => $user
        ];

        return response()->json($response, 201);
    }

    public function signin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        return "It works!";
    }
}
