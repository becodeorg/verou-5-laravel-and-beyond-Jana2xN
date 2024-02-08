<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::all();
        
        return view("users", [
            "users" => $users,
        ]);   
    }

    // the $id is comming from the value that is in the users/{id}
    public function show ($id) 
    {
        $user = User::find($id);
        
        return view ("user", [
            "user" => $user,
        ]);
    }
}