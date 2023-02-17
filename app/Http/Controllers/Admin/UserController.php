<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //TODO: da ricontrollare.
    private $validations = [
        'name'                => 'required|string|max:50',
        'last_name'           => 'required|string|max:50',
        'address'             => 'required|string|max:100',
        'specializations'     => 'array',
        //TODO:migliorare l'errore
        'specializations.*'   => 'integer|exists:specializations,id',
        'curriculum_vitae'    => 'nullable|image|max:1024',
        'photo'               => 'nullable|image|max:1024',
        'phone'               => 'required|regex:/^[0-9]+$/|max:20',
        'services'            => 'nullable|string',
    ];

    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }
    public function edit(User $user)
    {
        $specializations = Specialization::all();
        return view('admin.users.edit', [
            'user'            => $user,
            'specializations' => $specializations,
        ]);
    }
    public function update(Request $request, User $user)
    {
        //validare
        $this->validations['phone'] = Rule::unique('users')->ignore($user);
        $request->validate($this->validations);
        //salvare i dati
        $data = $request->all();
        $cv =  $data['curriculum_vitae'] ?? null;
        $image =  $data['photo'] ?? null;

        //
        $user->name             = $data['name'];
        $user->last_name        = $data['last_name'];
        $user->address          = $data['address'];
        $user->curriculum_vitae = $cv;
        $user->photo            = $image;
        $user->phone            = $data['phone'];
        $user->services         = $data['services'];
        $user->update();

        $user->specializations()->sync($data['specializations']);

        //ridirezionare
        return redirect()->route('admin.users.show', ['user' => $user]);
    }
}
