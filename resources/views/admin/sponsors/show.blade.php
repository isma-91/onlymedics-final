@extends('layouts.app')

@section('content')
    <h1>Sponsorizza il tuo profilo così da avere innumerevoli vantaggi!!</h1>
    <h2>{{$sponsor->title}}</h2>
    <h3>DESCRIZIONE:</h3>
    <p>{{ $sponsor->description }}</p>
    <p>DURATA: {{ $sponsor->duration }} ore</p>

    <h2>Acquista adesso</h2>
    <a class="btn btn-primary text-light fw-bold" href="">{{ $sponsor->cost }}€</a>
@endsection
