<?php

namespace App\Http\Controllers\Api;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{


    public function store(Request $request)
    {
        //validations
        $validations = [
            'user_id'         => 'required|integer|max:16777215|exists:users,id',
            'guest_name'      => 'required|string|max:20',
            'guest_last_name' => 'required|string|max:20',
            'vote'            => ['required', 'numeric', 'between:1,5'],
            'text'            => 'required|string',
        ];

        $data = $request->all();
        $validator = Validator::make($data, $validations);

        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'errors'    => $validator->errors(),
            ]);
        }
        //salvare nel DB
        $message = new Review;
        $message->user_id         = $data['user_id'];
        $message->guest_name      = $data['guest_name'];
        $message->guest_last_name = $data['guest_last_name'];
        $message->vote            = $data['vote'];
        $message->text            = $data['text'];
        $message->save();

        //rispondere con un JSON
        return response()->json([
            'success'  => true,
            'redirect' => '/success' //per ridirezionare avendo usato JSON anche per gli errori
        ]);
    }

    //vedere se c'è la possibilità di implementare l'update per modificare una review
    public function update(Request $request, Review $review)
    {
        //
    }

}
