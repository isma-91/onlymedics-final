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
        $reviews = Review::where('user_id', Auth::id())->get();


        return view('admin.reviews.index', [
            'reviews' => $reviews,
            'user' => $user,
        ]);
    }

    public function show(Review $review)
    {
        $user = Auth::user();
        if (Auth::id() !== $review->user_id) abort(401);
        return view('admin.reviews.show', [
            'review' => $review,
            'user' => $user,
        ]);
    }
}
