<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use App\Models\productTyp;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $types = ProductTyp::all();
        $categories = Category::all();
        return view('users.index',[
            'users' =>$users,
            'types' => $types,
            'categories' => $categories,
        ]);
    }
}
