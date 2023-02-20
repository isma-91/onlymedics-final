@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Recensione</th>
                <th scope="col">Voto</th>
                {{-- <th scope="col">Azioni</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                    <th scope="row">{{ $review->id }}</th>
                    <td>{{ $review->guest_name }}</td>
                    <td>{{ $review->guest_last_name}}</td>
                    <td>{{ $review->text}}</td>
                    <th class="bg-dark text-warning vertical-align-center">{{ $review->vote}}</th>
                    {{-- <td>
                        <a href="{{ route('admin.reviews.show', ['review' => $review]) }}" class="btn btn-primary">Visualizza</a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

