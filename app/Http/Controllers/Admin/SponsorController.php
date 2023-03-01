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
        $gateway = new Gateway([
            'environment'  => config('services.braintree.enviroment'),
            'merchantId'   => config('services.braintree.merchantId'),
            'publicKey'    => config('services.braintree.publicKey'),
            'privateKey'   => config('services.braintree.privateKey')
        ]);
        $amount = $request->amount;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            $user = User::find(Auth::user()->id);
            if (count($user->sponsors) > 0 ) {
                if($transaction->amount == '2.99'){
                    $user = User::find(Auth::user()->id);
                    if ($user->sponsors[0]->title != null) {
                        $datatotale= date('Y-m-d',strtotime("+1 day",strtotime($user->sponsors[0]['pivot']['expiring_date'])));
                        $user->sponsors()->sync([1=>['expiring_date'=>date('Y-m-d', strtotime($datatotale))]]);
                    }else{
                        $user->sponsors()->sync([1=>['expiring_date'=>date('Y-m-d', strtotime('tomorrow'))]]);
                    }
                }
                if($transaction->amount == '5.99'){
                    $user = User::find(Auth::user()->id);
                    if ($user->sponsors[0]->title != null) {
                        $datatotale= date('Y-m-d',strtotime("+3 day",strtotime($user->sponsors[0]['pivot']['expiring_date'])));
                        $user->sponsors()->sync([2=>['expiring_date'=>date('Y-m-d', strtotime($datatotale))]]);
                    }else{
                        $user->sponsors()->sync([2=>['expiring_date'=>date('Y-m-d', strtotime('+3 day'))]]);
                    }
                }
                if($transaction->amount == '9.99'){
                    $user = User::find(Auth::user()->id);
                    if ($user->sponsors[0]->title != null) {
                        $datatotale= date('Y-m-d',strtotime("+6 day",strtotime($user->sponsors[0]['pivot']['expiring_date'])));
                        $user->sponsors()->sync([3=>['expiring_date'=>date('Y-m-d', strtotime($datatotale))]]);
                    }else{
                        $user->sponsors()->sync([3=>['expiring_date'=>date('Y-m-d', strtotime('+6 day'))]]);
                    }
                }
                return back()->with('success_message', 'Transazione eseguita con successo. ID transazione: ' .$transaction->id);
            }else {
                if($transaction->amount == '2.99'){
                    $user = User::find(Auth::user()->id);
                    $user->sponsors()->sync([1=>['expiring_date'=>date('Y-m-d', strtotime('tomorrow'))]]);
                }
                if($transaction->amount == '5.99'){
                    $user = User::find(Auth::user()->id);
                    $user->sponsors()->sync([2=>['expiring_date'=>date('Y-m-d', strtotime('+3 day'))]]);
                }
                if($transaction->amount == '9.99'){
                    $user = User::find(Auth::user()->id);
                    $user->sponsors()->sync([3=>['expiring_date'=>date('Y-m-d', strtotime('+6 day'))]]);
                }
                return back()->with('success_message', 'Transazione eseguita con successo. ID transazione: ' .$transaction->id);
            }
        }else {
            $errorString = '';
            foreach ($result->errors->deepAll() as  $error) {
                $errorString .= 'Error: ' . $error->code . ': ' . $error->message . '\n';
            }
            return back()->withErrors('C\'è stato un errore: ' .$result->message );
        }

    }
}
