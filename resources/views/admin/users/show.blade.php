@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="ms-5">Il tuo profilo</h1>
        <div>
            <a class="d-flex justify-content-between align-items-center mod-btn" href="{{ route('admin.users.edit', ['user' => $user])}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffffff" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </a>
        </div>
    </div>
    <div class="container d-flex flex-column query_container">
        <div class="photo_container text-center">
            <img src="{{ asset('storage/' . $user->uploaded_photo) }}" alt="{{ $user->name }}" class="mod-img border border-dark border-5">
        </div>
        <div class="container doctor_container">
            <div class="text-capitalize mb-2"><strong class="text-uppercase">nome:</strong> {{ $user->name }}</div>
            <div class="text-capitalize mb-2"><strong class="text-uppercase">Cognome: </strong>{{$user->last_name}}</div>
            <div class="text-capitalize mb-2"><strong class="text-uppercase">indirizzo: </strong>{{ $user->address }}</div>
            <div class="text-capitalize mb-2"><strong class="text-uppercase">cellulare: </strong>{{ $user->phone}}</div>
            <div><strong class="text-uppercase">E-mail:  </strong>{{ $user->email}}</div>
            <div><strong class="text-uppercase mb-2">Servizi: </strong>{{ $user->services}}</strong></div>
            <div class="specialization_container mt-2 d-flex flex-wrap align-items-center">
                <div class="text-uppercase me-2"><strong>Specializzazioni: </strong></div>
                    @foreach ($user->specializations as $specialization)
                        <div class="me-1 mod_specialization mt-1">{{ $specialization->name }}</div>
                    @endforeach
            </div>
            <div><strong class="text-uppercase mb-2">Il tuo cv</strong></div>
            <div class="d-flex w-100 cv_container"><img src="{{ asset('storage/' . $user->curriculum_vitae) }}" alt="{{ $user->name }}" class="border border-dark border-5 rounded-2 mod-curriculum mt-2"></div>
        </div>
        <div class="text-end mt-2">
            <a class="btn btn-primary px-4 py-2 fw-bold" href="{{ route('admin.users.edit', ['user' => $user])}}">Modifica il profilo</a>
        </div>
    </div>
@endsection
