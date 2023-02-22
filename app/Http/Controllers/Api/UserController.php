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

    public function show($user)
    {
        //perchè così funziona, ma come ha fatto Henri (molto più semplice e comprensibile), non funziona?
        $user = User::where('id', $user)->with(['specializations'])->findOrFail($user);

        if ($user) {
            return response()->json([
                'success' => true,
                'results' => $user,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
