<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }

    public function add(Request $request){

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => Hash::make($request->input('password')),
            'address' => $request->input('address'),
            'date_of_birth' => date('Y-m-d',strtotime($request->input('date_of_birth'))),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email',
            'mobile' => 'sometimes|required|string|max:15',
            'password' => 'sometimes|required|string|min:8',
            'address' => 'sometimes|required|string|max:255',
            'date_of_birth' => 'sometimes|required|date',
        ]);

        $user = User::findOrFail($id);
        
        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }
        if ($request->has('mobile')) {
            $user->mobile = $request->input('mobile');
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        if ($request->has('address')) {
            $user->address = $request->input('address');
        }
        if ($request->has('date_of_birth')) {
            $user->date_of_birth = date('Y-m-d',strtotime($request->input('date_of_birth')));
        }

        $user->save();

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ], 200);
    }

}
