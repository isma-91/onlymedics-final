@extends('layouts.app')

@section('content')
    <h1>Questa è la pagina dei messaggi ai dottori (di tutti i dottori)</h1>
    <ul>
        @foreach ($reviews as $review)
            <li>{{ $review->text }}</li>
        @endforeach
    </ul>
@endsection
