<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{	
	public function getAllUsers()
    {
        return User::all();
    }
}
