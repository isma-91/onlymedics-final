<?php

namespace App\Http\Controllers\Admin;

use App\Sponsor;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $sponsors = Sponsor::all();

        return view('admin.sponsors.index', [
            'sponsors' => $sponsors,
            'user' => $user,
        ]);
    }


    public function show(Sponsor $sponsor)
    {
        $user = Auth::user();
        return view('admin.sponsors.show', [
            'sponsor' => $sponsor,
            'user' => $user,
        ]);
    }

    public function payment(Request $request) {
        $user = Auth::user();
        $value = $request->value;
        $gateway = new Gateway([
            'environment' => config('services.braintree.enviroment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        $token = $gateway->ClientToken()->generate();
        return view('admin.sponsors.payment', [
            'token' =>  $token,
            'value' =>  $value,
            'user'  =>  $user,
        ]);
    }

    public function checkout(Request $request) {

    }
}
