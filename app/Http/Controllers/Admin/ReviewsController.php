<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = Review::all();

        return view('admin.reviews.index', [
            'reviews' => $reviews,
        ]);
    }
}
