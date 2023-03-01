<?php

use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('guest.home');
// })->name('guest.home');

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'PageController@dashboard')->name('dashboard');
        Route::get('/messages', 'MessageController@index')->name('messages.index');
        Route::get('/messages/{message}', 'MessageController@show')->name('messages.show');
        Route::delete('/messages/{message}', 'MessageController@destroy')->name('messages.destroy');
        Route::get('/reviews', 'ReviewController@index')->name('reviews.index');
        Route::get('/reviews/{review}', 'ReviewController@show')->name('reviews.show');
        Route::get('/users/{user}', 'UserController@show')->name('users.show');
        Route::put('/users/{user}', 'UserController@update')->name('users.update');
        Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
        Route::get('/sponsors', 'SponsorController@index')->name('sponsors.index');
        Route::get('/sponsors/{sponsor}', 'SponsorController@show')->name('sponsors.show');
        //Rotte pagamento
        Route::get('/sponsors/payment/{value}', function (Request $request) {
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
        })->name('sponsors.payment');

        //TODO: da verificare
        Route::post( '/checkout', function (Request $request) {
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
                // if ($transaction->amount == '2.99') {
                //     $user = User::find(Auth::user()->id);
                // }
                return back()->with('success_message', 'Transazione eseguita');
            }else {
                $errorString = '';
                foreach ($result->errors->deepAll() as  $error) {
                    $errorString .= 'Error: ' . $error->code . ': ' . $error->message . '\n';
                }
                return back()->withErrors('C\'è stato un errore: ' .$result->message );
            }

        })->name('sponsors.checkout');
});

Route::get('{any?}', function () {
    return view('guest.home');
})->where("any", ".*")->name('guest.home');
