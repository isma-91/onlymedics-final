<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reviews = Review::all();

        return view('admin.reviews.index', [
            'reviews' => $reviews,
            'user' => $user,
        ]);
    }
}
