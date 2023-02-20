@extends('layouts.app')

@section('content')
    <h1>Recensione di {{$review->guest_name}}</h1>
    <p>{{$review->text}}</p>
    <h2>VOTO</h2>
    <p>{{$review->vote}}</p>
@endsection
