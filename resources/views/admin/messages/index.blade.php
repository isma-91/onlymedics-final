@extends('layouts.app')

@section('content')
    <h1>Questa è la pagina dei messaggi ai dottori (di tutti i dottori)</h1>
    <ul>
        @foreach ($messages as $message)
            <li>{{ $message->title }}</li>
        @endforeach
    </ul>
@endsection
