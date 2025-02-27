<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * get all user
     */

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    
    /**
     * get single user
     */

    public function getUser(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return response()->json($users);
    }

    /**
     * create single user
     */
    
    public function createUser(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5',
        ]);

        $user = User::create($request->all());
        return response()->json(['message' => 'insert success', 'data' => $user]);
    }
    /**
     * update single user
     */
    
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);

        $user->update($request->all());

        return response()->json(['message' => 'update success', 'data' => $user]);
    }
    /**
     * delete single user
     */
    
    public function deleteUser($id)
    {
        User::destroy($id);

        return response()->json(['message' => 'delete success', 'data' => '']);
    }
}
