@extends('layouts.app')

@section('content')
    <div class="sponsor-show text-center p-3 sponsor-container
        @if($sponsor->title == 'Pacchetto Silver')
            title-silver
        @elseif($sponsor->title == 'Pacchetto Gold')
            title-gold
        @elseif($sponsor->title == 'Pacchetto Platinum')
            title-platinum
        @endif">
        <h1 class="mb-5">Sponsorizza il tuo profilo così da avere innumerevoli vantaggi!!</h1>
        <h2 class="mb-5">{{$sponsor->title}}</h2>
        <p class="mb-5"><strong>{{ $sponsor->description }}</strong></p>
        <p class="mb-5 text-light fs-1 fw-bold">{{ $sponsor->duration }} ORE DI SPONSORIZZAZIONE</p>

        <h2>Acquista adesso</h2>
        <a class="btn btn-primary text-light fw-bold" href="{{ route('admin.sponsors.payment', ['value' => $sponsor->title]) }}">{{ $sponsor->cost }}€</a>
    </div>
@endsection
