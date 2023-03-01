<?php

namespace App\Http\Controllers\Admin;

use App\User;
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
}
