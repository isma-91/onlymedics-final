@extends('layouts.app')

@section('content')
    <h1>Il tuo profilo</h1>
    <ul>
        <li>nome: {{ $user->name}}</li>
        <li>cognome: {{ $user->last_name}}</li>
        <li>cell: {{ $user->phone}}</li>
    </ul>

    <a class="btn btn-primary" href="{{ route('admin.users.edit', ['user' => $user])}}">Modifica il profilo</a>
@endsection
