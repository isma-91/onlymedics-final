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
                <th scope="col">Visualizza</th>
                {{-- <th scope="col">Azioni</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                        <th scope="row">
                            <div class="righe">
                                {{ $review->id }}
                            </div>
                        </th>
                        <td>
                            <div class="righe">
                                {{ $review->guest_name }}
                            </div>
                        </td>
                        <td>
                            <div class="righe">
                                {{ $review->guest_last_name}}
                            </div>
                        </td>
                        <td class="text-truncate review-message">

                                {{ $review->text}}

                        </td>
                        <th>
                            <div class="review-vote d-flex align-items-center justify-content-center bg-dark text-warning">
                                {{ $review->vote}}
                            </div>
                        </th>
                        <td>
                            <div class="righe">
                                <a href="{{ route('admin.reviews.show', ['review' => $review]) }}" class="btn btn-primary">Visualizza</a>
                            </div>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

