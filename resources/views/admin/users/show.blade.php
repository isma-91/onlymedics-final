@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center ">
        <h1 class="w-100 ms-4 mb-3 text-center text-md-start">Il tuo profilo</h1>
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
        <div class="photo_container text-center mb-4">
            @if ($user->uploaded_photo )
                <img src="{{ asset('storage/' . $user->uploaded_photo)}}" alt="{{ $user->name }}" class="mod-img border border-dark border-5">
            @else
                <img src="{{ asset('img/dottore.jpg')}}" alt="{{ $user->name }}" class="mod-img border border-dark border-5">
            @endif
        </div>
        <div class="container doctor_container">
            <div class="text-capitalize mb-2 d-flex flex-column align-items-center flex-md-row"><div class="text-uppercase fw-bold">nome:</div> {{ $user->name }}</div>
            <div class="text-capitalize mb-2 d-flex flex-column align-items-center flex-md-row"><div class="text-uppercase fw-bold">Cognome: </div>{{$user->last_name}}</div>
            <div class="text-capitalize mb-2 d-flex flex-column align-items-center flex-md-row"><div class="text-uppercase fw-bold">indirizzo: </div>{{ $user->address }}</div>
            <div class="text-capitalize mb-2 d-flex flex-column align-items-center flex-md-row"><div class="text-uppercase fw-bold">cellulare: </div>{{ $user->phone}}</div>
            <div class="text-capitalize mb-2 d-flex flex-column align-items-center flex-md-row"><div class="text-uppercase fw-bold">Email: </div>{{ $user->email}}</div>
            <div class="text-capitalize mb-2 d-flex flex-column align-items-center flex-md-row"><div class="text-uppercase fw-bold">Servizi: </div>{{ $user->services}}</strong></div>
            <div class="text-uppercase fw-bold me-2 text-center">Specializzazioni:</div>
                <div class="specialization_container mt-2 d-flex flex-wrap justify-content-center">
                    @foreach ($user->specializations as $specialization)
                        <div class="me-1 mod_specialization mt-1">{{ $specialization->name }}</div>
                    @endforeach
                </div>

            @if ($user->curriculum_vitae)
                <div><div class="text-uppercase fw-bold mb-2">Il tuo cv</div></div>
                <div class="d-flex w-100 cv_container"><img src="{{ asset('storage/' . $user->curriculum_vitae) }}" alt="{{ $user->name }}" class="border border-dark border-5 rounded-2 mod-curriculum mt-2"></div>
            @endif
        </div>
        <div class="text-end mt-5 ">
            <a class="btn btn-primary px-4 py-2 fw-bold" href="{{ route('admin.users.edit', ['user' => $user])}}">Modifica il profilo</a>
        </div>
    </div>
@endsection
