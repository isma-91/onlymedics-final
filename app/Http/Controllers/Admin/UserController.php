<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Specialization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        'uploaded_photo'      => 'nullable|image|max:1024',
        'phone'               => 'nullable|regex:/^[0-9]+$/|max:20',
        'services'            => 'nullable|string',
    ];

    public function show(User $user)
    {
        if (Auth::id() !== $user->id) abort(401);
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
        $this->validations['phone'] = Rule::unique('users')->where('phone', '<>', '')->ignore($user);
        $request->validate($this->validations);
        //salvare i dati
        $data = $request->all();



        // $image = isset($data['uploaded_photo']) ? Storage::put('public/uploads', $data['uploaded_photo']) : null;
        // $image = isset($image) ? str_replace('public/', '', $image) : null;
        // // $image = str_replace('public/', '', $image);

        // $cv = isset($data['curriculum_vitae']) ? Storage::put('public/uploads', $data['curriculum_vitae']) : null;
        // $cv = isset($cv) ? str_replace('public/', '', $cv) : null;

        // $cv = str_replace('public/', '', $cv);
        // $cv =  $data['curriculum_vitae'] ?? null;
        // $image =  $data['uploaded_photo'] ?? null;

        // Verificare se l'utente ha caricato un'immagine
        if (isset($data['uploaded_photo'])) {
            // Salvare l'immagine e ottenere il percorso relativo
            $image = Storage::put('public/uploads', $data['uploaded_photo']);
            $image = isset($image) ? str_replace('public/', '', $image) : null;

            // Aggiornare il percorso dell'immagine dell'utente con quello appena salvato
            $user->uploaded_photo = $image;
        }

        // Verificare se l'utente ha caricato un curriculum vitae
        if (isset($data['curriculum_vitae'])) {
            // Salvare il curriculum vitae e ottenere il percorso relativo
            $cv = Storage::put('public/uploads', $data['curriculum_vitae']);
            $cv = isset($cv) ? str_replace('public/', '', $cv) : null;
            // Aggiornare il percorso del curriculum vitae dell'utente con quello appena salvato
            $user->curriculum_vitae = $cv;
        }

        $user->name             = $data['name'];
        $user->last_name        = $data['last_name'];
        $user->address          = $data['address'];
        $user->phone            = $data['phone'];
        $user->services         = $data['services'];
        $user->update();

        $user->specializations()->sync($data['specializations']);

        //ridirezionare
        return redirect()->route('admin.users.show', ['user' => $user]);
    }
}
