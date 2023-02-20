@extends('layouts.app')

@section('content')
    <h1>Messaggio di {{ $message->guest_name . ' ' . $message->guest_last_name }}</h1>
    <h2>Oggetto: {{$message->title}}</h2>
    <p>{{$message->message}}</p>
    <p>E-mail: {{$message->guest_email}}</p>

@endsection
