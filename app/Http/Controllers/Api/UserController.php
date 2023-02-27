<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Review;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        $user = User::where('id', $user)->with(['specializations'])->findOrFail($user);
        $users = User::paginate(6);

        return response()->json([
            'success' => true,
            'results' => $users,
        ]);
    }

    public function search(Request $request)
    {
        $query = User::query();
            // Verifica se è stata fornita una specializzazione
        if ($request->has('specialization')) {
            $specialization = $request->input('specialization');
            // Filtra i dottori in base alla specializzazione
            $query->whereHas('specializations', function($q) use ($specialization) {
                $q->where('name','like', "%{$specialization}%");
            });
        }
        // Recupera tutti i dottori con le rispettive specializzazioni
        $doctors = $query->with('specializations')->get();
        // Restituisci i dati in formato JSON
        return response()->json([
            'success' => true,
            'results' => $doctors
        ]);
    }

    public function show($user)
    {
        //perchè così funziona, ma come ha fatto Henri (molto più semplice e comprensibile), non funziona?
        $user = User::where('id', $user)->with(['specializations'])->findOrFail($user);
        $reviews = Review::where('user_id', $user->id)->with('user')->get();

        if ($user) {
            return response()->json([
                'success' => true,
                'results' => [
                    'user' => $user,
                    'reviews' => $reviews
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }
}
