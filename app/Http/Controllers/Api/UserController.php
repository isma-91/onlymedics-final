<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        //da paginare
        $users = User::all();

        return response()->json([
            'success' => true,
            'results' => $users,
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'success' => true,
            'results' => $user,
        ]);
    }
}
