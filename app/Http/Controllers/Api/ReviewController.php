<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    public function store(Request $request)
    {
        //
    }

    //vedere se c'è la possibilità di implementare l'update per modificare una review
    public function update(Request $request, Review $review)
    {
        //
    }

}
